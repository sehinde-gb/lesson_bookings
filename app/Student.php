<?php
/**
 * This class is the Student class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;

/**
 * This class is the Student class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
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

    /**
     *  Students belongs to many lessons
     */

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }

    
}
