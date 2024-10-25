<?php

namespace App\Livewire\Secretary;

use App\Models\appointment;
use App\Models\AppointmentPayment;
use App\Models\Shop\Product;
use Carbon\Carbon;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Billing extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
        ->query(Appointment::query()->where('status', 'approved'))
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
            TextColumn::make('patient_id')->label('PAYMENT STATUS')->searchable()->badge()->formatStateUsing(
                function($record){
                    if ($record->is_fully_paid == true ) {
                       return'PAID';
                    }elseif ($record->appointmentPayments->sum('paid_amount') == 0) {
                       return 'UNPAID';
                    }else{
                       return 'PARTIALLY PAID';
                    }
                }
            ),
            TextColumn::make('id')->label('PAID AMOUNT')->searchable()->formatStateUsing(
                fn($record) => '₱'. number_format($record->appointmentPayments->sum('paid_amount'),2)
            ),
            
        ])
        ->filters([
            // ...
        ])
        ->actions([
            ActionGroup::make([
                Action::make('add')->label('Add Payment')->color('success')->icon('heroicon-o-banknotes')->action(
                    function($record, $data){
                        if ($record->total_fee == ($record->appointmentPayments->sum('paid_amount') + $data['payment_amount'])) {
                            $record->update([
                                'is_fully_paid' => true,
                            ]);
                            AppointmentPayment::create([
                                'appointment_id' => $record->id,
                                'paid_amount' => $data['payment_amount'],
                            ]);
                        }else{
                            AppointmentPayment::create([
                                'appointment_id' => $record->id,
                                'paid_amount' => $data['payment_amount'],
                            ]);
                        }
                    }
                )->form([
                    ViewField::make('rating')
                    ->view('filament.forms.total'),
                    TextInput::make('payment_amount')->label('Payment Amount')->prefix('₱')->numeric(),
                ])->modalWidth('xl')->modalSubmitActionLabel('Submit Payment')->visible(fn($record) => $record->is_fully_paid == false),
                ViewAction::make('view')->label('View Payments')->color('warning')->icon('heroicon-o-eye')->form([
                    ViewField::make('rating')
                    ->view('filament.forms.payment-record'),
                ])->modalWidth('xl')->modalHeading('View Payment Records'),
            ])
        ])
        ->bulkActions([
            // ...
        ]);
    }

    public function render()
    {
        return view('livewire.secretary.billing');
    }
}
