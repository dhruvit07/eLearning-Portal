<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Syllabus;

class ExamType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function syllabi()
    {
        return $this->hasMany(Syllabus::class, 'exam_type_id');
    }
}
