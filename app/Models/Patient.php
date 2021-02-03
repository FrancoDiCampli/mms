<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'social_works' => 'array'
    ];

    public function getFullNameAttribute()
    {
        return ucwords($this->surname . ', ' . $this->name);
    }

    public function setSocialWorksAttribute($values)
    {
        $social_works = [];
        foreach ($values as $item) {
            $social_works[] = ['id' => $item['id'], 'affiliate' => $item['affiliate']];
        }

        $this->attributes['social_works'] = json_encode($social_works);
    }

    public function socialwork() // ??
    {
        return $this->hasManyJson(SocialWork::class, 'social_work_id');
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }

    public function clinicalhistories()
    {
        return $this->hasMany(ClinicalHistory::class);
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
