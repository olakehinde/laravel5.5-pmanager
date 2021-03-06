<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use App\Models\User;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', ['projects' => $projects]);
        }

        return view('auth.login');
    }

    public function adduser(Request $request) {
        // add to project
        $project = Project::find($request->input('project_id'));

        if (Auth::user()->id === $project->user_id) {
            $user = User::where('email', $request->input('email'))->first();

            $projectUser = projectUser::where('user_id', $user->id)
                                        ->where('project_id', $project->id)
                                        ->first();

            // check if user is already added to project
            if ($projectUser) {
                return redirect()->route('projects.show', ['project_id' => $project->id])->with('errors', $request->input('email'). ' is already a Member of this Project');
            }

            if ($user && $project) {
                $project->users()->attach($user->id);

                return redirect()->route('projects.show', ['project_id' => $project->id])->with('success', $request->input('email'). ' was Successfully added to '. $project->name . ' Project');
            }

            return redirect()->route('projects.show', ['project_id' => $project->id])->with('errors', 'Error adding User to Project. Try again');
        }

        return redirect()->route('projects.show', ['project_id' => $project->id])->with('errors', 'Sorry, you do not have permission to add User to this Project');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);

            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project created Successfully');
            }
            return back()->WithInput()->with('errors', 'Sorry, Project cannot be created. Try again');
        }

        return back()->WithInput()->with('errors', 'Sorry, you do not have Permission to create a Project. Please Login to create Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id); 
        $comments = $project->comments;

        return view('projects.show', ['project' => $project, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $updateProject = Project::find($project->id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($updateProject) {
            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project updated Successfully');
        }
        return back()->WithInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $findProject = Project::find($project->id);

        if ($findProject->delete()) {
            return redirect()->route('projects.index')
                             ->with('success', 'Project deleted Successfully');
        }

        return back()->WithInput()->with('error', 'Project cannot be deleted');
    }
}
