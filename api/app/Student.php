<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'birthdate',
        'gender',
        'students_classes_id'
    ];

    public function classe() {
        return $this->hasOne(StudentsClass::class, 'id', 'students_classes_id');
    }
}
