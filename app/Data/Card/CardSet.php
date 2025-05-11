<?php

namespace App\Data\Card;

use App\Data\Data;
use App\Data\Section;
use App\Data\User\User;
use App\Enums\Classifications;
use App\Enums\Difficulty;
use App\Enums\Subject;
use App\Models\Card\CardSet as Model;
use App\OpenApi\Property;
use Illuminate\Http\Request;
use OpenApi\Attributes\Schema;

#[Schema(required: ['name', 'section_id', 'user_id'])]
class CardSet extends Data
{
    #[Property(readOnly: true, example: '1')]
    public ?int $id;

    #[Property(example: 'Math Basics')]
    public string $name;

    #[Property(example: Subject::math->value)]
    public Subject $subject;

    #[Property(writeOnly: true, example: '1')]
    public ?string $section_id;

    #[Property(example: Classifications::first->value)]
    public ?Classifications $class;

    #[Property(example: Difficulty::easy->value)]
    public ?Difficulty $difficulty;

    #[Property(writeOnly: true, example: '1')]
    public ?string $user_id;

    #[Property(schema: Section::class, readOnly: true)]
    public ?Section $section;

    #[Property(schema: User::class, readOnly: true)]
    public ?User $user;

    public static function fromRequest(Request $request): CardSet
    {
        return static::from($request->toArray());
    }

    public static function fromModel(Model $model): CardSet
    {
        return static::from([
                'section' => Section::from($model->section),
                'user' => User::from($model->user),
            ] + $model->toArray());
    }
}
