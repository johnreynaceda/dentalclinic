<?php

namespace App\Livewire\Secretary;
use App\Models\appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\service_selected;
use App\Models\Shop\Product;
use App\Models\User;
use App\Notifications\AppointmentNotification;
use App\Notifications\DeclineAppointment;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Appointments extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(appointment::query()->orderByDesc('created_at'))->headerActions([
                CreateAction::make('new')->label('New Appointment')->icon('heroicon-o-plus')->action(
                    function($data){
                        
                        DB::beginTransaction();
                        if ($data['new_patient']) {

                            $user = User::create([
                                'name' => $data['firstname']. ' '. $data['lastname'],
                                'email' => $data['email'],
                                'password' => bcrypt('password'),
                                'user_type' => 'patient',
                            ]);
                            $patient = Patient::create([
                                'patient_number' => $this->generateCode('P-', Patient::count() + 1),
                                'first_name' => $data['firstname'],
                                'last_name' => $data['lastname'],
                                'age' => $data['age'],
                                'gender' => $data['gender'],
                                'address' => $data['address'],
                                'contact_number' => $data['contact_number'],
                                'user_id' => $user->id
                            ]);

                           
                            $total_fee = Service::whereIn('id', $data['services'])->get()->sum('price');

                            $appointment = appointment::create([
                                'user_id' => $user->id,
                                'patient_id' => $patient->id,
                                'appointment_date' => $data['date'],
                                'appointment_time' => $data['time'],
                                'total_fee' => $total_fee,
                                'branch' => $data['branch'],
                                'status' => 'approved',
                            ]);

                            foreach ($data['services'] as $key => $value) {
                                service_selected::create([
                                 'appointment_id' => $appointment->id,
                                 'service_id' => $value,
                                ]);
                             }
 

                        }else{

                             $patient = Patient::where('id', $data['patient_id'])->first();
                            $total_fee = Service::whereIn('id', $data['services'])->get()->sum('price');

                            $appointment = appointment::create([
                                'user_id' => $patient->user->id,
                                'patient_id' => $patient->id,
                                'appointment_date' => $data['date'],
                                'appointment_time' => $data['time'],
                                'total_fee' => $total_fee,
                                'branch' => $data['branch'],
                                'status' => 'approved',
                            ]);

                            foreach ($data['services'] as $key => $value) {
                                service_selected::create([
                                 'appointment_id' => $appointment->id,
                                 'service_id' => $value,
                                ]);
                             }

                        }
                        DB::commit();
                    }
                )->form([
                    Checkbox::make('new_patient')
                        ->label('No Record')
                        ->reactive(),
                    Fieldset::make('PATIENT INFORMATION')
                        ->schema([
                            TextInput::make('firstname')->required(),
                            TextInput::make('lastname')->required(),
                            TextInput::make('age')->numeric()->required(),
                            Select::make('gender')->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ]),
                            TextInput::make('address')->required(),
                            TextInput::make('contact_number')->required(),
                            TextInput::make('email')->required(),
                        ])
                        ->visible(fn ($get) => $get('new_patient')),
                        Select::make('patient_id')->label('Patient')->options(
                            Patient::all()->mapWithKeys(function($record){
                                return [$record->id => $record->first_name. ' '. $record->last_name];
                            })
                        )->hidden(fn ($get) => $get('new_patient')),
                        Fieldset::make('APPOINTMENT INFORMATION')->schema([
                            Select::make('services')-> label('Services')->options(
                                Service::all()->pluck('name', 'id')
                            )->multiple(),
                            Select::make('branch')->label('Branch')->options([
                                'Tayuman' => 'Tayuman',
                                'Laong Laan' => 'Laong Laan',
                                'Gilmore' => 'Gilmore',
                                'Marikina' => 'Marikina',
                                'Makati' => 'Makati',
                                'Antipolo' => 'Antipolo',
                                'Las Piñas' => 'Las Piñas',
                            ])->required(),
                            DatePicker::make('date')->required(),
                            TimePicker::make('time')->required(),
                        ])
                        ]),
                       
            ])
            ->columns([
                TextColumn::make('user.patient.patient_number')->label('PATIENT ID')->searchable(),
                TextColumn::make('user_id')->label('FULLNAME')->formatStateUsing(
                    fn($record) => optional(optional($record->user)->patient)->first_name . ' ' . optional(optional($record->user)->patient)->last_name
                ),
                TextColumn::make('appointment_date')->label('DATE & TIME')->formatStateUsing(
                    fn($record) => Carbon::parse($record->appointment_date)->format('F d, Y'). ' ' . Carbon::parse($record->appointment_time)->format('h:i A')
                ),
                ViewColumn::make('service_id')->view('filament.tables.services')->label('SERVICES'),
                TextColumn::make('total_fee')->label('TOTAL FEE')->formatStateUsing(
                    fn($record) => '₱'.number_format($record->total_fee,2)
                ),
                TextColumn::make('status')->label('STATUS')->badge()->color(fn (string $state): string => match ($state) {
                    '' => 'warning',
                    'approved' => 'success',
                    'declined' => 'danger',
                    'cancelled' => 'danger',
                })
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('approved')->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                        function($record){
                          $record->update([
                            'status' => 'approved'
                          ]);
                          $record->user->notify(new AppointmentNotification($record));

                        }
                    ),
                    Action::make('declined')->color('danger')->icon('heroicon-s-hand-thumb-down')->action(
                        function($record){
                          $record->update([
                            'status' => 'declined'
                          ]);
                          
                          $record->user->notify(new DeclineAppointment($record));
                        }
                    ),
                ])->visible(fn($record) => $record->status == null)
            ])
            ->bulkActions([
                // ...
            ]);
    }

    function generateCode($prefix, $number) {
        // Ensure the number is zero-padded to 4 digits
        $formattedNumber = str_pad($number, 4, '0', STR_PAD_LEFT);

        // Concatenate the prefix and the formatted number
        return $prefix . $formattedNumber;
    }


    public $appointments;

    public function mount()
    {

        // $this->appointments = Appointment::all();
    }

    public function approve($id)
    {

        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'approved';
            $appointment->save();
        }
    }

    public function decline($id)
    {

        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'declined';
            $appointment->save();
        }
    }

    public function render()
    {
        return view('livewire.secretary.appointments');
    }
}
