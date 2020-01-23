<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Lesson extends Model
{
    protected $fillable = ['title', 'body', 'lecturer', 'objectives', 'prerequisites', 'evaluation', 'resources', 'activity'];

    
    /**
     * Returns the latest published blog post.
     *
     * @param $query
     */
    public function scopeLatest($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    /**
     *  Lessons belongs to many students
     *
     * 
     */
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }
}
