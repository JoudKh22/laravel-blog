<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Detay sayfası
    public function show($id)
    {
        $project = Project::findOrFail($id); // ID'ye göre proje bul
       return view('show', compact('project'));

    }
}
