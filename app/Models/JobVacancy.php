<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'slug';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'additional_information',
        'type_of_work_id',
        'work_experience_id',
        'job_position_id',
        'created_by',
        'country_id',
        'province_id',
        'city_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'upload_date'
    ];

    public function getUploadDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function typeOfWork()
    {
        return $this->belongsTo(TypeOfWork::class);
    }

    public function workExperience()
    {
        return $this->belongsTo(WorkExperience::class);
    }

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function userApplied()
    {
        return $this->hasMany(JobVacancyUser::class, 'job_vacancy_id', 'id');
    }

    public function scopeFilter($query, array $filters) {
		$query->when($filters['search'] ?? null, function ($query, $search) {
			$query->where('title', 'like', '%' . $search . '%')
                ->orWhereHas('country', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('province', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('city', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('typeOfWork', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('workExperience', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('jobPosition', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('createdBy', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
		})
        ->when($filters['typeofworks'] ?? null, function ($query, $typeOfWorks) {
            $typeOfWorks = explode(':', $typeOfWorks);
            foreach ($typeOfWorks as $key => $value) {
                $query->orWhere('type_of_work_id', $value);
            }
		})
        ->when($filters['workexperiences'] ?? null, function ($query, $workExperiences) {
            $workExperiences = explode(':', $workExperiences);
            foreach ($workExperiences as $key => $value) {
                $query->orWhere('type_of_work_id', $value);
            }
		})
        ->when($filters['jobpositions'] ?? null, function ($query, $jobPositions) {
            $jobPositions = explode(':', $jobPositions);
            foreach ($jobPositions as $key => $value) {
                $query->orWhere('type_of_work_id', $value);
            }
		})
        ->when($filters['country'] ?? null, function ($query, $country) {
            $query->where('country_id', $country);
		})
        ->when($filters['province'] ?? null, function ($query, $province) {
            $query->where('province_id', $province);
		})
        ->when($filters['city'] ?? null, function ($query, $city) {
            $query->where('city_id', $city);
		});
	}
}
