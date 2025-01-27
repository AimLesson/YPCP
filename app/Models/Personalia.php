<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalia extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personalia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'profile_picture',
        'branch_id',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['branch'];

    /**
     * Get the branch associated with the personalia.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function scopeFilterByBranch($query)
    {
        if (auth()->check() && auth()->user()->role !== 'superadmin') {
            return $query->where('branch_id', auth()->user()->branch_id);
        }
        return $query;
    }

}
