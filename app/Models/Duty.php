<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}