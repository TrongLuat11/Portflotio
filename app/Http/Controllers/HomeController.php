<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = json_decode(file_get_contents(storage_path('app/data/projects.json')));
        $roadmap = json_decode(file_get_contents(storage_path('app/data/roadmap.json')));
        $site = json_decode(file_get_contents(storage_path('app/data/site.json')));
        $skills = json_decode(file_get_contents(storage_path('app/data/skills.json')));

        return view('welcome', compact('projects', 'roadmap', 'site', 'skills'));
    }
}
