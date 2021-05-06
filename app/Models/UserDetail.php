<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * Get the user that owns the user_detail.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
