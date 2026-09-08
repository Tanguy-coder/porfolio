<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        return view('admin.contact-infos.index', [
            'contactInfos' => ContactInfo::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.contact-infos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'label' => 'required|string|max:100',
            'label_en' => 'nullable|string|max:100',
            'value' => 'required|string|max:255',
            'value_en' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        ContactInfo::create($data);

        return redirect()->route('admin.contact-infos.index')->with('success', 'Contact créé.');
    }

    public function edit(ContactInfo $contactInfo)
    {
        return view('admin.contact-infos.edit', compact('contactInfo'));
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $data = $request->validate([
            'icon' => 'required|string|max:10',
            'label' => 'required|string|max:100',
            'label_en' => 'nullable|string|max:100',
            'value' => 'required|string|max:255',
            'value_en' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $contactInfo->update($data);

        return redirect()->route('admin.contact-infos.index')->with('success', 'Contact mis à jour.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('admin.contact-infos.index')->with('success', 'Contact supprimé.');
    }

    public function show(ContactInfo $contactInfo)
    {
        return redirect()->route('admin.contact-infos.edit', $contactInfo);
    }
}
