<?php

namespace App\Livewire\Secretary;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Shop\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
// use Livewire\Component;

class Records extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Patient::query())->headerActions([
                CreateAction::make('patient')->label('Add Patient')->action(
                    function($data){
                        $user = User::create([
                            'name' => $data['first_name']. ' '. $data['last_name'],
                            'email' => $data['email'],
                            'password' => bcrypt('password'),
                            'user_type' => 'patient',
                        ]);

                        Patient::create([
                            'patient_number' => $this->generateCode('P-', Patient::count() + 1),
                            'first_name' => $data['first_name'],
                            'last_name' => $data['last_name'],
                            'age' => $data['age'],
                            'gender' => $data['gender'],
                            'address' => $data['address'],
                            'contact_number' => $data['contact_number'],
                            'user_id' => $user->id,
                        ]);

                    }
                )->form([
                    Fieldset::make('PATIENT INFORMATION')->schema([
                        TextInput::make('first_name')->label('Firstname')->required(),
                        TextInput::make('last_name')->label('Lastname')->required(),
                        TextInput::make('age')->required()->numeric(),
                        Select::make('gender')->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ])->required(),
                        TextInput::make('address')->required()->columnSpan(2),
                        TextInput::make('contact_number')->required(),
                        TextInput::make('email')->required(),
                    ])
                ])->modalWidth('2xl')
            ])
            ->columns([
                TextColumn::make('patient_number')->label('PATIENT ID')->searchable(),
                TextColumn::make('first_name')->label('FIRSTNAME')->searchable(),
                TextColumn::make('last_name')->label('LASTNAME')->searchable(),
                TextColumn::make('age')->label('AGE')->searchable(),
                TextColumn::make('gender')->label('GENDER')->searchable(),
                TextColumn::make('address')->label('ADDRESS')->searchable(),
                TextColumn::make('contact_number')->label('CONTACT NO.')->searchable(),
                ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->action(
                    function($record,$data){
                        $record->update([
                            'first_name' => $data['first_name'],
                            'last_name' => $data['last_name'],
                            'age' => $data['age'],
                            'gender' => $data['gender'],
                            'address' => $data['address'],
                            'contact_number' => $data['contact_number'],
                            // 'user_id' => $record->user->id,
                        ]);

                        $record->user->update([
                            'name' => $data['first_name']. ' '. $data['last_name'],
                            'email' => $data['email'],
                        ]);
                    }
                )->form(
                    function($record) {
                        return [
                            Fieldset::make('PATIENT INFORMATION')->schema([
                                TextInput::make('first_name')->label('Firstname')->required(),
                                TextInput::make('last_name')->label('Lastname')->required(),
                                TextInput::make('age')->required()->numeric(),
                                Select::make('gender')->options([
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                ])->required(),
                                TextInput::make('address')->required()->columnSpan(2),
                                TextInput::make('contact_number')->required(),
                                TextInput::make('email')->required()->afterStateHydrated(function ($state, callable $set) use ($record) {
                                    $set('email', $record->user->email);
                                }),
                            ])
                            ];
                    }
                )->modalWidth('xl'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Patient yet')->emptyStateDescription('Once you write your first patient, it will appear here.');
    }

    function generateCode($prefix, $number) {
        // Ensure the number is zero-padded to 4 digits
        $formattedNumber = str_pad($number, 4, '0', STR_PAD_LEFT);

        // Concatenate the prefix and the formatted number
        return $prefix . $formattedNumber;
    }


    public function render()
    {

        // $appointments = Appointment::where('status', 'approved')->paginate(10);

        return view('livewire.secretary.records');
    }
}
