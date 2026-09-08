<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experiences.index', [
            'experiences' => Experience::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'date_range' => 'required|string|max:100',
            'date_range_en' => 'nullable|string|max:100',
            'company' => 'required|string|max:255',
            'company_en' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'tasks' => 'nullable|string',
            'tasks_en' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['tags'] = array_filter(array_map('trim', explode(',', $data['tags'] ?? '')));
        $data['tasks'] = array_filter(array_map('trim', explode("\n", $data['tasks'] ?? '')));
        $data['tasks_en'] = array_filter(array_map('trim', explode("\n", $data['tasks_en'] ?? '')));
        $data['is_active'] = $request->has('is_active');

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Expérience créée.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'date_range' => 'required|string|max:100',
            'date_range_en' => 'nullable|string|max:100',
            'company' => 'required|string|max:255',
            'company_en' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'tasks' => 'nullable|string',
            'tasks_en' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['tags'] = array_filter(array_map('trim', explode(',', $data['tags'] ?? '')));
        $data['tasks'] = array_filter(array_map('trim', explode("\n", $data['tasks'] ?? '')));
        $data['tasks_en'] = array_filter(array_map('trim', explode("\n", $data['tasks_en'] ?? '')));
        $data['is_active'] = $request->has('is_active');

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Expérience mise à jour.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Expérience supprimée.');
    }

    public function show(Experience $experience)
    {
        return redirect()->route('admin.experiences.edit', $experience);
    }
}
