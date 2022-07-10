<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExamType;
use App\Models\File;

class Syllabus extends Model
{
    use HasFactory;

    protected $fillable = ['name','content','exam_type_id'];
    
    public function examType()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }
    
    public function files()
    {
        return $this->hasMany(File::class, 'syllabus_id');
    }
}
