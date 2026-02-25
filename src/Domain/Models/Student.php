<?php

namespace Student\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Student\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'father_name',
        'age',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'age' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the factory instance for this model.
     */
    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}
