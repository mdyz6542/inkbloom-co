<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('code')->required()->unique(ignoreRecord: true)->alphaDash(),
                    Select::make('type')->options([
                        'percentage'   => 'Percentage (%)',
                        'fixed'        => 'Fixed Amount (Rs)',
                        'free_shipping'=> 'Free Shipping',
                    ])->required(),
                    TextInput::make('amount')->numeric()->default(0),
                    TextInput::make('min_order')->numeric()->prefix('Rs')->default(0)->label('Minimum Order'),
                    TextInput::make('max_uses')->numeric()->nullable()->label('Max Uses'),
                    DateTimePicker::make('expires_at')->nullable()->label('Expiry Date'),
                    Toggle::make('is_active')->default(true),
                ]),
            ]);
    }
}
