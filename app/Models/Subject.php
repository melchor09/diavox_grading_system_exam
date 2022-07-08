<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $table = "tblsubject";
    protected $fillable = [
        'subject_id',
        'subject',
        'description',
        'created_at',
        'updated_at'
    ];
}
