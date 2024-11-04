<?php

namespace App\Livewire\Admin;

use App\Models\Doctor;
use App\Models\Shop\Product;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DoctorList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Doctor::query())->headerActions([
                CreateAction::make('doctor')->label('Add Doctor')->action(
                    function($data){
                        

                        Doctor::create([
                            'firstname' => $data['firstname'],
                            'middlename' => $data['middlename'],
                            'lastname' => $data['lastname'],
                            'branch' => $data['branch'],
                           'specialization' => $data['specialization'],
                            'start_time' => $data['start_time'],
                            'end_time' => $data['end_time'],
                        ]);
                    }
                )->form([
                    Fieldset::make('INFORMATION')->schema([
                        TextInput::make('firstname')->required()->alpha(),
                        TextInput::make('middlename')->alpha(),
                        TextInput::make('lastname')->alpha(),
                        Select::make('branch')->options([
                            'Tayuman' => 'Tayuman',
                            'Laong Laan' => 'Laong Laan',
                            'Gilmore' => 'Gilmore',
                            'Marikina' => 'Marikina',
                            'Makati' => 'Makati',
                            'Antipolo' => 'Antipolo',
                            'Las Piñas' => 'Las Piñas',
                        ]),
                        Select::make('specialization')->options([
                            'Orthodontics' => 'Orthodontics',
                            'Periodontics' => 'Periodontics',
                            'Endodontics' => 'Endodontics',
                            'Prosthodontics' => 'Prosthodontics',
                            'Pediatric Dentistry' => 'Pediatric Dentistry',
                            'Oral and Maxillofacial Surgery' => 'Oral and Maxillofacial Surgery',
                            'Oral Pathology' => 'Oral Pathology',
                            'Dental Public Health' => 'Dental Public Health',
                            'Oral Radiology' => 'Oral Radiology',
                            'Cosmetic Dentistry' => 'Cosmetic Dentistry',
                            'Implant Dentistry' => 'Implant Dentistry',
                        ]),
                        TimePicker::make('start_time')->required(),
                        TimePicker::make('end_time')->required(),
                    ]),
                    
                ])->hidden(auth()->user()->user_type == 'admin')
            ])
            ->columns([
                TextColumn::make('id')->label('FULLNAME')->formatStateUsing(fn($record) => 'DR. '. $record->firstname. ' '. $record->lastname)->searchable(['firstname', 'lastname']),
                TextColumn::make('specialization')->label('SPECIALIZATION'),
                TextColumn::make('start_time')->label('AVAILABLE TIME')->formatStateUsing(
                    fn($record) => Carbon::parse($record->start_time)->format('h:i A').' - '. Carbon::parse($record->end_time)->format('h:i A')
                ),
                TextColumn::make('branch')->label('BRANCH'),
                ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    Fieldset::make('INFORMATION')->schema([
                        TextInput::make('firstname')->required()->alpha(),
                        TextInput::make('middlename')->alpha(),
                        TextInput::make('lastname')->alpha(),
                        TextInput::make('branch'),
                        Select::make('specialization')->options([
                            'Orthodontics' => 'Orthodontics',
                            'Periodontics' => 'Periodontics',
                            'Endodontics' => 'Endodontics',
                            'Prosthodontics' => 'Prosthodontics',
                            'Pediatric Dentistry' => 'Pediatric Dentistry',
                            'Oral and Maxillofacial Surgery' => 'Oral and Maxillofacial Surgery',
                            'Oral Pathology' => 'Oral Pathology',
                            'Dental Public Health' => 'Dental Public Health',
                            'Oral Radiology' => 'Oral Radiology',
                            'Cosmetic Dentistry' => 'Cosmetic Dentistry',
                            'Implant Dentistry' => 'Implant Dentistry',
                        ]),
                        TimePicker::make('start_time')->required(),
                        TimePicker::make('end_time')->required(),
                    ]),
                ]),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.doctor-list');
    }
}
