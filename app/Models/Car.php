<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'vinNo';
    public $incrementing = false;
    protected $fillable = [
        'vinNo',
        'make',
        'model',
        'year'
    ];
    
    public function space(): BelongsTo {
        return $this->belongsTo(Space::class);
    }
}

