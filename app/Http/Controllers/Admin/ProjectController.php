<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'type' => 'required|string|max:50',
            'type_en' => 'nullable|string|max:50',
            'client' => 'nullable|string|max:255',
            'client_en' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'tags' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'link_label' => 'nullable|string|max:255',
            'link_label_en' => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['tags'] = array_filter(array_map('trim', explode(',', $data['tags'] ?? '')));
        $data['is_active'] = $request->has('is_active');

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet créé.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'type' => 'required|string|max:50',
            'type_en' => 'nullable|string|max:50',
            'client' => 'nullable|string|max:255',
            'client_en' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'tags' => 'nullable|string',
            'link' => 'nullable|url|max:255',
            'link_label' => 'nullable|string|max:255',
            'link_label_en' => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['tags'] = array_filter(array_map('trim', explode(',', $data['tags'] ?? '')));
        $data['is_active'] = $request->has('is_active');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé.');
    }

    public function show(Project $project)
    {
        return redirect()->route('admin.projects.edit', $project);
    }
}
