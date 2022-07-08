<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public $table = "tblgrade";
    protected $primaryKey = "grade_id";
    protected $fillable = [
        'grade_id',
        'student_id',
        'teacher_id',
		'subject_id',
		'grade',
        'created_at',
        'updated_at'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
