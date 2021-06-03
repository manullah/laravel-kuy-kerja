<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancyUser extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_vacancies_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_vacancy_id',
        'user_id',
        'status'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'my_status'
    ];

    public function getMyStatusAttribute()
    {
        if ($this->status == 'PENDING') {
            return 'Pending';
        } else if ($this->status == 'INTERVIEW') {
            return 'Wawancara';
        } else if ($this->status == 'ACCEPTED') {
            return 'Diterima';
        } else {
            return '';
        }
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
