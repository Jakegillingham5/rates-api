<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating',
        'feedback',
        'response',
        'review_time',
        'is_anonymous',
        'student_id',
        'assessment_id'
    ];


    /**
     * The student that submitted this feedback
     */
    public function student()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The Assessment that this feedback is for
     */
    public function assessment()
    {
        return $this->belongsToMany('App\Models\Assessment');
    }
}
