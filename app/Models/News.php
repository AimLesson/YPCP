<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'is_published',
        'youtube_link',
        'instagram_link',
        'tiktok_link',
        'branch_id',
        'views', 
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($news) {

            if (empty($news->slug)) {
                $slug = \Illuminate\Support\Str::slug($news->title);
                $count = News::where('slug', 'like', "$slug%")->count();
        
                $news->slug = $count ? "{$slug}-{$count}" : $slug;
            }
    
            $user = auth()->user();
    
            // Skip branch check for `is_published` toggle
            if ($news->isDirty('is_published')) {
                return;
            }
    
        });
    }
    
    

}
