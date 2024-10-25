<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\TextInput;
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

class UserList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.admin.user-list');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())->headerActions([
                CreateAction::make('service')->label('Add Users')->action(
                    function($data){
                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                            'user_type' => 'secretary',
                        ]);
                    }
                )->form([
                    TextInput::make('name'),
                    TextInput::make('email'),
                    TextInput::make('password'),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('id')->label('NAME')->searchable()->formatStateUsing(
                    fn($record) => $record->name
                ),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('user_type')->label('USER TYPE')->searchable(),

                
                ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name'),
                    TextInput::make('email'),
                ])->modalWidth('xl'),
                // DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Services yet')->emptyStateDescription('Once you write your first services, it will appear here.');
    }
}
