<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->searchable()->sortable()->copyable(),
                TextColumn::make('customer_name')
                    ->label('Customer')
                    ->getStateUsing(fn($record) => $record->address?->name ?? $record->user?->name ?? $record->guest_email ?? 'Guest')
                    ->searchable(query: fn($query, $search) => $query
                        ->whereHas('address', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhere('guest_email', 'like', "%{$search}%")
                    ),
                TextColumn::make('contact')
                    ->label('Contact')
                    ->getStateUsing(fn($record) => $record->address?->phone ?? $record->guest_email ?? '—')
                    ->color('gray'),
                TextColumn::make('address.city')->label('City')->default('—'),
                TextColumn::make('total')->money('PKR')->sortable(),
                TextColumn::make('status')->badge()->colors([
                    'warning' => 'pending',
                    'primary' => 'processing',
                    'info'    => 'dispatched',
                    'success' => 'delivered',
                    'danger'  => 'cancelled',
                ]),
                TextColumn::make('payment_method')->label('Payment'),
                TextColumn::make('payment_status')->label('Paid?')->badge()->colors([
                    'danger'  => 'unpaid',
                    'warning' => 'awaiting_verification',
                    'success' => 'paid',
                ]),
                TextColumn::make('created_at')->label('Date')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options([
                    'pending'    => 'Pending',
                    'processing' => 'Processing',
                    'dispatched' => 'Dispatched',
                    'delivered'  => 'Delivered',
                    'cancelled'  => 'Cancelled',
                ]),
                SelectFilter::make('payment_method')->options([
                    'cod'           => 'COD',
                    'jazzcash'      => 'JazzCash',
                    'easypaisa'     => 'Easypaisa',
                    'bank_transfer' => 'Bank Transfer',
                ]),
                SelectFilter::make('payment_status')->options([
                    'unpaid'                => 'Unpaid',
                    'awaiting_verification' => 'Awaiting Verification',
                    'paid'                  => 'Paid',
                ]),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
