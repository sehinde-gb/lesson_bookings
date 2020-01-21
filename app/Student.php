<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['first_name', 'last_name', 'title', 'phone', 'address', 'notes', 'faculty', 'attendance'];

    
    /**
     * Returns the latest published blog post.
     *
     * @param $query
     */
    public function scopeLatest($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
}
