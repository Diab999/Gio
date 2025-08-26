<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource\RelationManagers;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Team Member Content')
                    ->tabs([
                        Tabs\Tab::make('English')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('Name (English)')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('role.en')
                                    ->label('Role (English)')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('bio.en')
                                    ->label('Bio (English)')
                                    ->required()
                                    ->maxLength(1000)
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('العربية')
                            ->schema([
                                TextInput::make('name.ar')
                                    ->label('الاسم (العربية)')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('role.ar')
                                    ->label('الدور (العربية)')
                                    ->required()
                                    ->maxLength(255),
                                Textarea::make('bio.ar')
                                    ->label('السيرة الذاتية (العربية)')
                                    ->required()
                                    ->maxLength(1000)
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
                Section::make('General Settings')
                    ->schema([
                        FileUpload::make('image')
                            ->disk('public')
                            ->image()
                            ->maxSize(2048),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('image')
                    ->label('Image')
                    ->view('admin.columns.image')
                    ->getStateUsing(fn($record) => $record->image),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bio')
                    ->label('Bio')
                    ->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options(function () {
                        return \App\Models\TeamMember::distinct()
                            ->pluck('role')
                            ->mapWithKeys(fn($role) => [$role => $role])
                            ->toArray();
                    })
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([10, 25, 50, 100]);
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
