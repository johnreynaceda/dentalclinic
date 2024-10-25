<?php

namespace App\Livewire\Admin;

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
use Livewire\Component;

class ServiceList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Service::query())->headerActions([
                Action::make('category')->label('Categories')->color('gray')->url(fn() => route('secretary.category')),
                CreateAction::make('service')->label('Add Services')->form([
                    TextInput::make('name'),
                    TextInput::make('price')->numeric(),
                Select::make('service_category_id')->label('Category')->options(ServiceCategory::all()->pluck('name', 'id'))

                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('TYPE OF SERVICE')->searchable(),
                TextColumn::make('price')->label('PRICE')->searchable()->formatStateUsing(fn($record) => '₱'.number_format($record->price,2)),
                TextColumn::make('serviceCategory.name')->label('CATEGORY')->searchable(),
                ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name'),
                    TextInput::make('price')->numeric(),
                    Select::make('service_category_id')->label('Category')->options(ServiceCategory::all()->pluck('name', 'id'))
                ])->modalWidth('xl'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Services yet')->emptyStateDescription('Once you write your first services, it will appear here.');
    }


    public function render()
    {
        return view('livewire.admin.service-list');
    }
}
