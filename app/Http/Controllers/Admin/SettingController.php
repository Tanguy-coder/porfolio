<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private array $settingKeys = [
        'hero_name', 'hero_role', 'hero_role_en', 'hero_badge', 'hero_badge_en',
        'hero_description', 'hero_description_en',
        'btn_projects', 'btn_projects_en', 'btn_contact', 'btn_contact_en',
        'btn_cv', 'btn_cv_en',
        'stat_exp', 'stat_exp_en', 'stat_projects', 'stat_projects_en',
        'stat_pro_exp', 'stat_pro_exp_en', 'stat_certs', 'stat_certs_en',
        'stat_techs', 'stat_techs_en',
        'stat_exp_value', 'stat_projects_value', 'stat_pro_exp_value',
        'stat_certs_value', 'stat_techs_value',
        'nav_home', 'nav_home_en', 'nav_about', 'nav_about_en',
        'nav_skills', 'nav_skills_en', 'nav_projects', 'nav_projects_en',
        'nav_experience', 'nav_experience_en', 'nav_certifications', 'nav_certifications_en',
        'nav_contact', 'nav_contact_en',
        'theme_light', 'theme_light_en', 'theme_dark', 'theme_dark_en',
        'section_about_label', 'section_about_label_en', 'section_about_title', 'section_about_title_en',
        'about_text_1', 'about_text_1_en', 'about_text_2', 'about_text_2_en',
        'about_text_3', 'about_text_3_en',
        'section_skills_label', 'section_skills_label_en', 'section_skills_title', 'section_skills_title_en',
        'section_projects_label', 'section_projects_label_en', 'section_projects_title', 'section_projects_title_en',
        'proj_link', 'proj_link_en',
        'section_exp_label', 'section_exp_label_en', 'section_exp_title', 'section_exp_title_en',
        'section_cert_label', 'section_cert_label_en', 'section_cert_title', 'section_cert_title_en',
        'cert_verify', 'cert_verify_en',
        'section_contact_label', 'section_contact_label_en', 'section_contact_title', 'section_contact_title_en',
        'contact_subtitle', 'contact_subtitle_en',
        'form_name', 'form_name_en', 'form_email', 'form_email_en',
        'form_subject', 'form_subject_en', 'form_subject_placeholder', 'form_subject_placeholder_en',
        'form_message', 'form_message_en', 'form_message_placeholder', 'form_message_placeholder_en',
        'btn_send', 'btn_send_en',
        'footer_text', 'footer_text_en',
        'cv_link', 'hero_photo',
    ];

    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('admin.settings.index', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        foreach ($this->settingKeys as $key) {
            SiteSetting::set($key, $request->input($key));
        }

        return redirect()->route('admin.settings.index')->with('success', 'Paramètres mis à jour.');
    }
}
