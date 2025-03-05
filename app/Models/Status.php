<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = ['name', 'color'];


    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }
}
