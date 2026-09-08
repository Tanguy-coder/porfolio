<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutValue;
use App\Models\Certification;
use App\Models\ContactInfo;
use App\Models\Experience;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'counts' => [
                'projects' => Project::count(),
                'skills' => Skill::count(),
                'certifications' => Certification::count(),
                'experiences' => Experience::count(),
                'about_values' => AboutValue::count(),
                'contact_infos' => ContactInfo::count(),
            ],
            'heroPhoto' => SiteSetting::get('hero_photo'),
            'cvFile' => SiteSetting::get('cv_file'),
        ]);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'hero_photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $old = SiteSetting::get('hero_photo');
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        $path = $request->file('hero_photo')->store('photos', 'public');
        SiteSetting::set('hero_photo', $path);

        return redirect()->route('admin.dashboard')->with('success', 'Photo mise à jour.');
    }

    public function deletePhoto()
    {
        $path = SiteSetting::get('hero_photo');
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        SiteSetting::set('hero_photo', null);

        return redirect()->route('admin.dashboard')->with('success', 'Photo supprimée.');
    }

    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:10240',
        ]);

        $old = SiteSetting::get('cv_file');
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        $file = $request->file('cv_file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('cv', $filename, 'public');
        SiteSetting::set('cv_file', $path);

        return redirect()->route('admin.dashboard')->with('success', 'CV mis à jour.');
    }

    public function deleteCv()
    {
        $path = SiteSetting::get('cv_file');
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        SiteSetting::set('cv_file', null);

        return redirect()->route('admin.dashboard')->with('success', 'CV supprimé.');
    }
}
