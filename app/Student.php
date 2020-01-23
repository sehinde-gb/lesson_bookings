<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;

class Student extends Model
{

    protected $fillable = ['first_name', 'last_name', 'title', 'phone', 'address', 'notes', 'faculty', 'attendance', 'add_lessons'];

    
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
     *  Students belongs to many lessons
     *
     * 
     */

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }
}
