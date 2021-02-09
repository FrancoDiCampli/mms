<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return ucwords($this->surname . ', ' . $this->name);
    }

    public function social_work()
    {
        return $this->hasOne(SocialWork::class, 'id', 'social_work_id');
    }

    public function queries()
    {
        return $this->hasMany(Query::class)->orderBy('id', 'DESC');
    }

    public function clinicalhistories()
    {
        return $this->hasMany(ClinicalHistory::class)->orderBy('id', 'DESC');
    }

    public function echocardiograms()
    {
        return $this->hasMany(Echocardiogram::class);
    }

    public function electrocardiograms()
    {
        return $this->hasMany(Electrocardiogram::class);
    }

    public function ecoarteriallowermembers()
    {
        return $this->hasMany(EcoArterialLowerMembers::class);
    }

    public function ecoarterialnecks()
    {
        return $this->hasMany(EcoArterialNeck::class);
    }

    public function ecovenouslowermembers()
    {
        return $this->hasMany(EcoVenousLowerMembers::class);
    }

    public function presurgicalrisks()
    {
        return $this->hasMany(PresurgicalRisk::class);
    }
}
