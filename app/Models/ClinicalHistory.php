<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function protocol()
    {
        return $this->hasOne(Protocol::class);
    }

    public function epicrisis()
    {
        return $this->hasOne(Epicrisis::class);
    }

    public function ambulatory()
    {
        if ($this->type_intervention) {
            return $this->hasOne(Ambulatory::class);
        }
    }

    public function dailyevolutions()
    {
        return $this->hasMany(DailyEvolution::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function sanatorio()
    {
        return $this->hasOne(Sanatorio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
