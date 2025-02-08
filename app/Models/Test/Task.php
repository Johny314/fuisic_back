<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'test_id',
        'problem_statement',
        'answer',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
