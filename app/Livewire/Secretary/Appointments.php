<?php

namespace App\Livewire\Secretary;
use App\Models\Appointment;
use App\Models\Shop\Product;
use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Appointments extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Appointment::query())
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
                    'approved' => 'success',
                    'declined' => 'danger',
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
                        }
                    ),
                    Action::make('declined')->color('danger')->icon('heroicon-s-hand-thumb-down')->action(
                        function($record){
                          $record->update([
                            'status' => 'declined'
                          ]);
                        }
                    ),
                ])->visible(fn($record) => $record->status == null)
            ])
            ->bulkActions([
                // ...
            ]);
    }


    public $appointments;

    public function mount()
    {

        $this->appointments = Appointment::all();
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
