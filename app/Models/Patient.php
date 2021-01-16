<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function socialwork()
    {
        return $this->belongsTo(SocialWork::class, 'social_work_id');
    }

    public function queries()
    {
        return $this->hasMany(Query::class);
    }
}
