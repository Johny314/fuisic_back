<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_history_id',
        'answer',
    ];

    public function testHistory(): BelongsTo
    {
        return $this->belongsTo(TestHistory::class);
    }
}
