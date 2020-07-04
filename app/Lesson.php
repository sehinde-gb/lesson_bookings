<?php
/**
 * This class is the Lesson class
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
use App\Student;

/**
 * This class is the Lesson class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
class Lesson extends Model
{
    protected $fillable = ['title', 'description', 'lecturer', 'objectives', 'prerequisites', 'evaluation', 'resources', 'activity'];

    
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
     */
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }
}
