<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Syllabus;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'syllabus_id'];

    public function syllabus()
    {
        return $this->belongsTo(Syllabus::class, 'syllabus_id');
    }
}
