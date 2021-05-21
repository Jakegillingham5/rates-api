<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    const FIRST_SEMESTER = 'First Semester';
    const SUMMER_SEMESTER = 'Summer Semester';
    const SECOND_SEMESTER = 'Second Semester';
    const WINTER_SEMESTER = 'Winter Semester';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_code',
        'topic_name',
        'semester',
        'year',
        'lecturer_id'
    ];

    /**
     * The lecturer that runs this topic
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The Assessments that relate to this topic.
     */
    public function Assessments()
    {
        return $this->hasMany('App\Models\Assessment');
    }

    /**
     * The users that are taking this topic
     */
    public function topics()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
