<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'searcher_cv_path'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['searcher_cv_path'];

    /**
     * Get the user that owns the user_detail.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the URL to the user's searcher cv.
     *
     * @return string
     */
    public function getSearcherCvPathAttribute()
    {
        return $this->attributes['searcher_cv_path']
                    ? Storage::disk('public')->url($this->attributes['searcher_cv_path'])
                    : '';
    }
}
