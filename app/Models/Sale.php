<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function car(): HasOne {
        return $this->hasOne(Car::class);
    }
    public function user(): HasOne {
        return $this->hasOne(User::class);
    }
}
