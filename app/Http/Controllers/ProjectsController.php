<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class ProjectsController extends Controller
{
    protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
	];

    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();
		return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $project
     * @return Response
     */


    public function store()
    {
        $input = Input::all();
        Project::create( $input );
 
        return Redirect::route('projects.index')->with('message', 'Project created');
    }
 
    public function update(Project $project)
    {
        $input = array_except(Input::all(), '_method');
        $project->update($input);
 
        return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated.');
    }
 
    public function destroy(Project $project)
    {
        $project->delete();
 
        return Redirect::route('projects.index')->with('message', 'Project deleted.');
    }
 
    // TasksController
   

}
