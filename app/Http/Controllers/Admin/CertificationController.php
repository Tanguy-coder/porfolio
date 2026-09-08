<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        return view('admin.certifications.index', [
            'certifications' => Certification::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'issuer' => 'required|string|max:255',
            'issuer_en' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:100',
            'date_en' => 'nullable|string|max:100',
            'verification_link' => 'nullable|url|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        Certification::create($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification créée.');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'issuer' => 'required|string|max:255',
            'issuer_en' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:100',
            'date_en' => 'nullable|string|max:100',
            'verification_link' => 'nullable|url|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification mise à jour.');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('success', 'Certification supprimée.');
    }

    public function show(Certification $certification)
    {
        return redirect()->route('admin.certifications.edit', $certification);
    }
}
