<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Order Details')
                    ->columns(3)
                    ->schema([
                        TextInput::make('order_number')->disabled(),
                        TextInput::make('payment_method')->label('Payment Method')->disabled(),
                        TextInput::make('gift_wrap')
                            ->label('Gift Wrap')
                            ->disabled()
                            ->formatStateUsing(fn($state) => $state ? 'Yes' : 'No'),
                        Select::make('status')->options([
                            'pending'    => 'Pending',
                            'processing' => 'Processing',
                            'dispatched' => 'Dispatched',
                            'delivered'  => 'Delivered',
                            'cancelled'  => 'Cancelled',
                        ])->required(),
                        Select::make('payment_status')->options([
                            'unpaid'                => 'Unpaid',
                            'awaiting_verification' => 'Awaiting Verification',
                            'paid'                  => 'Paid',
                        ])->required(),
                        TextInput::make('tracking_number')->placeholder('TCS tracking number'),
                    ]),

                Section::make('Customer Details')
                    ->columns(2)
                    ->schema([
                        Placeholder::make('customer_name')
                            ->label('Full Name')
                            ->content(fn($record) => $record->address?->name ?? $record->user?->name ?? '—'),
                        Placeholder::make('customer_phone')
                            ->label('Phone Number')
                            ->content(fn($record) => $record->address?->phone ?? '—'),
                        Placeholder::make('customer_email')
                            ->label('Email Address')
                            ->content(fn($record) => $record->guest_email ?? $record->user?->email ?? '—'),
                        Placeholder::make('customer_type')
                            ->label('Account Type')
                            ->content(fn($record) => $record->user ? 'Registered Customer' : 'Guest'),
                    ]),

                Section::make('Delivery Address')
                    ->columns(2)
                    ->schema([
                        Placeholder::make('address_line1')
                            ->label('Address Line 1')
                            ->content(fn($record) => $record->address?->line1 ?? '—'),
                        Placeholder::make('address_line2')
                            ->label('Address Line 2')
                            ->content(fn($record) => $record->address?->line2 ?? '—'),
                        Placeholder::make('address_city')
                            ->label('City')
                            ->content(fn($record) => $record->address?->city ?? '—'),
                        Placeholder::make('address_province')
                            ->label('Province')
                            ->content(fn($record) => $record->address?->province ?? '—'),
                    ]),

                Section::make('Order Items')
                    ->schema([
                        Placeholder::make('items')
                            ->label('')
                            ->content(function ($record) {
                                $record->loadMissing('items');
                                if ($record->items->isEmpty()) return 'No items found.';

                                $rows = $record->items->map(fn($item) =>
                                    "{$item->name}  ×{$item->quantity}  —  Rs " . number_format($item->total)
                                )->join("\n");

                                return $rows;
                            }),
                    ]),

                Section::make('Order Totals')
                    ->columns(3)
                    ->schema([
                        Placeholder::make('subtotal')
                            ->label('Subtotal')
                            ->content(fn($record) => 'Rs ' . number_format($record->subtotal)),
                        Placeholder::make('shipping_fee')
                            ->label('Shipping Fee')
                            ->content(fn($record) => 'Rs ' . number_format($record->shipping_fee)),
                        Placeholder::make('total')
                            ->label('Total')
                            ->content(fn($record) => 'Rs ' . number_format($record->total)),
                    ]),

                Section::make('Notes')
                    ->schema([
                        Textarea::make('notes')->label('Order Notes')->rows(3),
                    ]),

            ]);
    }
}
