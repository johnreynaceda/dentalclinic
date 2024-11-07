<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Shop\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TreatmentPlan extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $patient_id;

    public function mount(){
        $this->patient_id = request('id');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\TreatmentPlan::query())->headerActions([
                CreateAction::make('treatment_plan')->label('Add Treatment Plan')->action(
                    function($data){
                        
                        \App\Models\TreatmentPlan::create([
                            'patient_id' => $this->patient_id,
                            'patient_concern' => $data['patient_concern'],
                           'short_term_goals' => $data['short_term_goals'],
                            'long_term_goals' => $data['long_term_goals'],
                            'current_sleeping_patterns' => $data['current_sleeping_patterns'],
                            'current_exercise_patterns' => $data['current_exercise_patterns'],
                           'medications' => $data['medications'],
                            'interventions' => $data['interventions'],
                            'doctor_id' => $data['doctor_id'],
                        ]);
                    }
                )->form([
                    Textarea::make('patient_concern')->placeholder('Enter message here...'),
                    Textarea::make('short_term_goals')->placeholder('Enter message here...'),
                    Textarea::make('long_term_goals')->placeholder('Enter message here...'),
                    Textarea::make('current_sleeping_patterns')->placeholder('Enter message here...'),
                    Textarea::make('current_exercise_patterns')->placeholder('Enter message here...'),
                    Textarea::make('medications')->placeholder('Enter message here...'),
                    Textarea::make('interventions')->placeholder('Enter message here...'),
                    Select::make('doctor_id')->label('Doctor')->options(Doctor::all()->mapWithKeys(function($record){
                        return [$record->id => $record->firstname.' '. $record->lastname];
                    }))
                ]),
            ])
            ->columns([
                TextColumn::make('doctor_id')->label('DOCTOR')->formatStateUsing(
                    fn($record) => $record->doctor->firstname. ' ' . $record->doctor->lastname
                ),
                TextColumn::make('is_done')->label('STATUS')->badge()->formatStateUsing(
                    fn($record) => $record->is_done? 'Done' : 'Pending'
                )->color(fn (string $state): string => match ($state) {
                    '0' => 'warning',
                    '1' => 'success',
                    
                })
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make('view_plan')->label('View Plan')->button()->color('primary')->form([
                    ViewField::make('form')
                    ->view('filament.forms.treatment_plan')
                ]),
                ActionGroup::make([
                    Action::make('done_plan')->color('success')->icon('heroicon-c-check-badge')->action(
                        fn($record) => $record->update(['is_done' => true])
                    )
                ])->hidden(fn($record) => $record->is_done)
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Treatment Plan yet')->emptyStateDescription('Once you write your first treatment plan, it will appear here.');
    }

    public function render()
    {
        return view('livewire.treatment-plan');
    }
}
