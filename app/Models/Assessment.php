<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    const TYPE_MODULE = 'Module Assessment';
    const TYPE_LECTURE = 'Lecture Assessment';
    const TYPE_WORKSHOP = 'Workshop Assessment';
    const TYPE_GENERAL = 'Overall Assessment';
    const TYPE_TUTORIAL = 'Tutorial Assessment';
    const TYPE_TEST = 'Test Assessment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'topic_id'
    ];

    /**
     * The lecturer that runs this topic
     */
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }

    /**
     * The various feedback that relate to this Assessment.
     */
    public function feedback()
    {
        return $this->hasMany('App\Models\Feedback');
    }
}
