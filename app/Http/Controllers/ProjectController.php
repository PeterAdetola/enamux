<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ProjectGalleryParser;

class ProjectController extends Controller
{
    /**
     * Display a listing of all projects
     */
    public function index()
    {
        $projects = ProjectGalleryParser::getAllProjects();

        return view('frontend.project.projects_index', compact('projects'));
    }

    /**
     * Display the specified project
     */
    public function show($slug)
    {
        try {
            $project = new ProjectGalleryParser($slug);
            $project->parse();

            return view('frontend.project.project_show', compact('project'));
        } catch (\Exception $e) {
            abort(404, 'Project not found');
        }
    }

}
