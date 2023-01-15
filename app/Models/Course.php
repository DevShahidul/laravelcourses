<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function platform() {
        return $this->belongsTo(Platform::class);
    }

    // Build relationship with topics
    public function topics() {
        return $this->belongsToMany(Topic::class, 'course_topics', 'course_id', 'topic_id' );
    }

    // Build relationship with series
    public function series() {
        return $this->belongsToMany(Series::class, 'course_series', 'course_id', 'series_id' );
    }

    // Build relationship with authors
    public function authors() {
        return $this->belongsToMany(Author::class, 'course_author', 'course_id', 'author_id' );
    }
}
