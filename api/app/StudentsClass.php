<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsClass extends Model
{
    protected $table = 'students_classes';
    
    protected $fillable = [
        'name'
    ];

    public function teste(){
        return $this->belongsTo('App\Student');
    }
    
}
