<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epicrisis extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clinicalhistory()
    {
        return $this->belongsTo(ClinicalHistory::class);
    }

    public function protocol()
    {
        return $this->hasOneThrough(Protocol::class, ClinicalHistory::class, 'clinical_history_id');
    }

    public function dailyevolutions()
    {
        return $this->hasManyThrough(DailyEvolution::class, ClinicalHistory::class, 'clinical_history_id');
    }
}
