<?php

namespace App\Filament\Resources;
use App\Filament\Resources\PayrollResource\Pages;
use App\Filament\Resources\PayrollResource\RelationManagers;
use App\Models\Payroll;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class PayrollResource extends Resource
{
    protected static ?string $model = Payroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('empno'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              //  TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('empno')->searchable()->sortable(),

                TextColumn::make('fullname')->label('Name')->searchable()->sortable(),
                TextColumn::make('period')->label('Period')->searchable()->sortable(),
                TextColumn::make('basicsalary')->sortable()->money('IDR'),
                TextColumn::make('transport')->sortable()->money('IDR'),
                TextColumn::make('meal')->sortable()->money('IDR'),
                TextColumn::make('overtime')->sortable()->money('IDR'),
                TextColumn::make('total')->sortable()->money('IDR'),
            ])
            ->filters([
                //
            ])




            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrolls::route('/'),
            'create' => Pages\CreatePayroll::route('/create'),
            'edit' => Pages\EditPayroll::route('/{record}/edit'),
        ];
    }
}
