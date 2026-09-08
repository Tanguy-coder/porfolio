<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutValue;
use Illuminate\Http\Request;

class AboutValueController extends Controller
{
    public function index()
    {
        return view('admin.about-values.index', [
            'aboutValues' => AboutValue::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.about-values.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        AboutValue::create($data);

        return redirect()->route('admin.about-values.index')->with('success', 'Valeur créée.');
    }

    public function edit(AboutValue $aboutValue)
    {
        return view('admin.about-values.edit', compact('aboutValue'));
    }

    public function update(Request $request, AboutValue $aboutValue)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $aboutValue->update($data);

        return redirect()->route('admin.about-values.index')->with('success', 'Valeur mise à jour.');
    }

    public function destroy(AboutValue $aboutValue)
    {
        $aboutValue->delete();

        return redirect()->route('admin.about-values.index')->with('success', 'Valeur supprimée.');
    }

    public function show(AboutValue $aboutValue)
    {
        return redirect()->route('admin.about-values.edit', $aboutValue);
    }
}
