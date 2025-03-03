<?php

namespace App\Models\Card;

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardSet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'subject',
        'section_id',
        'class',
        'difficulty',
        'user_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
