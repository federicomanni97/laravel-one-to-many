<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view ('admin.projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $formData = $request->validated();
        // creo lo slug 
        $slug = Str::slug($formData['title'], '-');
        // aggiungo slug al formdata
        $formData['slug'] = $slug;
        // prendiamo l'id dell'utente che sta facendo l'operazione
        $userId = Auth::id();
        // aggiungiamo l'id dell'utente
        $formData['user_id'] = $userId;
        if ($request->hasFile('image')) {

            $img_path = Storage::put('uploads', $request->image);
            $formData['image'] = $img_path;    
        }
        $project = Project::create($formData);
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        // creo lo slug 
        $slug = Str::slug($formData['title'], '-');
        // aggiungo slug al formdata
        $formData['slug'] = $slug;
        // prendiamo l'id dell'utente che sta facendo l'operazione
        $formData['user_id'] = $project->user_id;
        // aggiungiamo l'id dell'utente
        $project->update($formData);
        // $project = Project::create($formData);
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        if ($project->image) {
            Storage::delete('$post->image');
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Post $project->title Eliminato Correttamente');
    }
}