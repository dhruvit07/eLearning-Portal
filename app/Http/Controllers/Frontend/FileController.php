<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Psy\CodeCleaner\FinalClassPass;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function show($id)
    {
        $file = File::where('id', $id)->first();
        return response()->file('public/uploads/' . $file->name);
    }
}
