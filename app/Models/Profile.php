<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company_profile',
        'logo',
        'about',
        'phone',
        'address',
        'visi',
        'misi',
        'profile_bg',
        'profile_banner1',
        'profile_banner2',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically set slug when creating a new branch
        static::creating(function ($profile) {
            if (empty($profile->slug)) {
                $profile->slug = Str::slug($profile->name);
            }
        });
    }
    
}
