<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_profile',
        'logo',
        'about',
        'phone',
        'address',
        'profile_bg',
        'profile_banner1',
        'profile_banner2',
        'visi',
        'misi',
        'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'branch_id'); // Adjust 'branch_id' if your foreign key column has a different name
    }


    protected static function boot()
    {
        parent::boot();

        // Automatically set slug when creating a new branch
        static::creating(function ($branch) {
            if (empty($branch->slug)) {
                $branch->slug = Str::slug($branch->name);
            }
        });
    }
}
