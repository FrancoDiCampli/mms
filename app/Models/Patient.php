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
            $social_works[] = ['id' => $item];
        }

        $this->attributes['social_works'] = json_encode($social_works);
    }

    public function socialwork()
    {
        return $this->hasManyJson(SocialWork::class, 'social_work_id');
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }
}
