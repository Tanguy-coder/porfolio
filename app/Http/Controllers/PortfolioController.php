<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\AboutValue;
use App\Models\Certification;
use App\Models\ContactInfo;
use App\Models\Experience;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $projects = Project::where('is_active', true)->orderBy('sort_order')->get();
        $skills = Skill::where('is_active', true)->orderBy('sort_order')->get();
        $certifications = Certification::where('is_active', true)->orderBy('sort_order')->get();
        $experiences = Experience::where('is_active', true)->orderBy('sort_order')->get();
        $aboutValues = AboutValue::where('is_active', true)->orderBy('sort_order')->get();
        $contactInfos = ContactInfo::where('is_active', true)->orderBy('sort_order')->get();

        $s = $settings;

        $translations = [
            'fr' => [
                'nav_home' => $s['nav_home'] ?? 'Accueil',
                'nav_about' => $s['nav_about'] ?? 'À propos',
                'nav_skills' => $s['nav_skills'] ?? 'Compétences',
                'nav_projects' => $s['nav_projects'] ?? 'Projets',
                'nav_experience' => $s['nav_experience'] ?? 'Expérience',
                'nav_certifications' => $s['nav_certifications'] ?? 'Certifications',
                'nav_contact' => $s['nav_contact'] ?? 'Contact',
                'theme_light' => $s['theme_light'] ?? 'Mode clair',
                'theme_dark' => $s['theme_dark'] ?? 'Mode sombre',
                'lang_btn' => '🌐 English',
                'hero_tag' => $s['hero_badge'] ?? '',
                'hero_title' => $s['hero_role'] ?? '',
                'hero_desc' => $s['hero_description'] ?? '',
                'hero_cta1' => $s['btn_projects'] ?? 'Voir mes projets →',
                'hero_cta2' => $s['btn_contact'] ?? 'Me contacter',
                'hero_cv' => $s['btn_cv'] ?? '⬇ Télécharger CV',
                'stat1' => $s['stat_exp'] ?? "ANS D'EXP.",
                'stat2' => $s['stat_projects'] ?? 'PROJETS',
                'stat3' => $s['stat_pro_exp'] ?? 'EXPÉRIENCE PROFESSIONNELLE MAJEURE',
                'stat4' => $s['stat_certs'] ?? 'CERTIFS',
                'stat5' => $s['stat_techs'] ?? 'TECHNOS',
                'about_label' => $s['section_about_label'] ?? '// à propos',
                'about_title' => $s['section_about_title'] ?? 'Pourquoi je code',
                'about_p1' => $s['about_text_1'] ?? '',
                'about_p2' => $s['about_text_2'] ?? '',
                'about_p3' => $s['about_text_3'] ?? '',
                'skills_label' => $s['section_skills_label'] ?? '// compétences',
                'skills_title' => $s['section_skills_title'] ?? 'Stack technique',
                'projects_label' => $s['section_projects_label'] ?? '// projets',
                'projects_title' => $s['section_projects_title'] ?? "Ce que j'ai construit",
                'proj_link' => $s['proj_link'] ?? 'Voir sur GitHub →',
                'exp_label' => $s['section_exp_label'] ?? '// expérience',
                'exp_title' => $s['section_exp_title'] ?? 'Parcours professionnel',
                'cert_label' => $s['section_cert_label'] ?? '// certifications',
                'cert_title' => $s['section_cert_title'] ?? 'Certifications',
                'cert_verify' => $s['cert_verify'] ?? '↗ Vérifier le certificat',
                'contact_label' => $s['section_contact_label'] ?? '// contact',
                'contact_title' => $s['section_contact_title'] ?? 'Travaillons<br>ensemble.',
                'contact_desc' => $s['contact_subtitle'] ?? '',
                'form_name' => $s['form_name'] ?? 'NOM',
                'form_email' => $s['form_email'] ?? 'EMAIL',
                'form_subject' => $s['form_subject'] ?? 'SUJET',
                'form_subject_ph' => $s['form_subject_placeholder'] ?? '',
                'form_message' => $s['form_message'] ?? 'MESSAGE',
                'form_message_ph' => $s['form_message_placeholder'] ?? '',
                'form_send' => $s['btn_send'] ?? 'Envoyer le message',
                'footer' => $s['footer_text'] ?? '',
                'about_cards' => $aboutValues->map(fn($v) => ['title' => $v->title, 'desc' => $v->description])->values()->toArray(),
                'projects' => $projects->map(fn($p) => [
                    'title' => $p->title, 'desc' => $p->description, 'type' => $p->type,
                    'client' => $p->client, 'link_label' => $p->link_label,
                ])->values()->toArray(),
                'skills' => $skills->map(fn($sk) => ['name' => $sk->name, 'category' => $sk->category])->values()->toArray(),
                'certifications' => $certifications->map(fn($c) => ['title' => $c->title, 'issuer' => $c->issuer, 'date' => $c->date])->values()->toArray(),
                'experiences' => $experiences->map(fn($e) => [
                    'title' => $e->title, 'date_range' => $e->date_range,
                    'company' => $e->company, 'tasks' => $e->tasks,
                ])->values()->toArray(),
                'contacts' => $contactInfos->map(fn($ci) => ['label' => $ci->label, 'value' => $ci->value])->values()->toArray(),
            ],
            'en' => [
                'nav_home' => $s['nav_home_en'] ?? 'Home',
                'nav_about' => $s['nav_about_en'] ?? 'About',
                'nav_skills' => $s['nav_skills_en'] ?? 'Skills',
                'nav_projects' => $s['nav_projects_en'] ?? 'Projects',
                'nav_experience' => $s['nav_experience_en'] ?? 'Experience',
                'nav_certifications' => $s['nav_certifications_en'] ?? 'Certifications',
                'nav_contact' => $s['nav_contact_en'] ?? 'Contact',
                'theme_light' => $s['theme_light_en'] ?? 'Light mode',
                'theme_dark' => $s['theme_dark_en'] ?? 'Dark mode',
                'lang_btn' => '🌐 Français',
                'hero_tag' => $s['hero_badge_en'] ?? '',
                'hero_title' => $s['hero_role_en'] ?? '',
                'hero_desc' => $s['hero_description_en'] ?? '',
                'hero_cta1' => $s['btn_projects_en'] ?? 'View my projects →',
                'hero_cta2' => $s['btn_contact_en'] ?? 'Contact me',
                'hero_cv' => $s['btn_cv_en'] ?? '⬇ Download CV',
                'stat1' => $s['stat_exp_en'] ?? 'YRS EXP.',
                'stat2' => $s['stat_projects_en'] ?? 'PROJECTS',
                'stat3' => $s['stat_pro_exp_en'] ?? 'MAJOR PROFESSIONAL EXPERIENCE',
                'stat4' => $s['stat_certs_en'] ?? 'CERTS',
                'stat5' => $s['stat_techs_en'] ?? 'TECHS',
                'about_label' => $s['section_about_label_en'] ?? '// about',
                'about_title' => $s['section_about_title_en'] ?? 'Why I code',
                'about_p1' => $s['about_text_1_en'] ?? '',
                'about_p2' => $s['about_text_2_en'] ?? '',
                'about_p3' => $s['about_text_3_en'] ?? '',
                'skills_label' => $s['section_skills_label_en'] ?? '// skills',
                'skills_title' => $s['section_skills_title_en'] ?? 'Tech stack',
                'projects_label' => $s['section_projects_label_en'] ?? '// projects',
                'projects_title' => $s['section_projects_title_en'] ?? "What I've built",
                'proj_link' => $s['proj_link_en'] ?? 'View on GitHub →',
                'exp_label' => $s['section_exp_label_en'] ?? '// experience',
                'exp_title' => $s['section_exp_title_en'] ?? 'Professional journey',
                'cert_label' => $s['section_cert_label_en'] ?? '// certifications',
                'cert_title' => $s['section_cert_title_en'] ?? 'Certifications',
                'cert_verify' => $s['cert_verify_en'] ?? '↗ Verify certificate',
                'contact_label' => $s['section_contact_label_en'] ?? '// contact',
                'contact_title' => $s['section_contact_title_en'] ?? "Let's work<br>together.",
                'contact_desc' => $s['contact_subtitle_en'] ?? '',
                'form_name' => $s['form_name_en'] ?? 'NAME',
                'form_email' => $s['form_email_en'] ?? 'EMAIL',
                'form_subject' => $s['form_subject_en'] ?? 'SUBJECT',
                'form_subject_ph' => $s['form_subject_placeholder_en'] ?? '',
                'form_message' => $s['form_message_en'] ?? 'MESSAGE',
                'form_message_ph' => $s['form_message_placeholder_en'] ?? '',
                'form_send' => $s['btn_send_en'] ?? 'Send message',
                'footer' => $s['footer_text_en'] ?? '',
                'about_cards' => $aboutValues->map(fn($v) => ['title' => $v->title_en ?? $v->title, 'desc' => $v->description_en ?? $v->description])->values()->toArray(),
                'projects' => $projects->map(fn($p) => [
                    'title' => $p->title_en ?? $p->title, 'desc' => $p->description_en ?? $p->description,
                    'type' => $p->type_en ?? $p->type, 'client' => $p->client_en ?? $p->client,
                    'link_label' => $p->link_label_en ?? $p->link_label,
                ])->values()->toArray(),
                'skills' => $skills->map(fn($sk) => ['name' => $sk->name_en ?? $sk->name, 'category' => $sk->category_en ?? $sk->category])->values()->toArray(),
                'certifications' => $certifications->map(fn($c) => ['title' => $c->title_en ?? $c->title, 'issuer' => $c->issuer_en ?? $c->issuer, 'date' => $c->date_en ?? $c->date])->values()->toArray(),
                'experiences' => $experiences->map(fn($e) => [
                    'title' => $e->title_en ?? $e->title, 'date_range' => $e->date_range_en ?? $e->date_range,
                    'company' => $e->company_en ?? $e->company, 'tasks' => $e->tasks_en ?? $e->tasks,
                ])->values()->toArray(),
                'contacts' => $contactInfos->map(fn($ci) => ['label' => $ci->label_en ?? $ci->label, 'value' => $ci->value_en ?? $ci->value])->values()->toArray(),
            ],
        ];

        return view('portfolio', compact(
            'settings', 'projects', 'skills', 'certifications',
            'experiences', 'aboutValues', 'contactInfos', 'translations'
        ));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Mail::to('contact@tanguy-dev.com')->send(new ContactMessage(
            senderName: $validated['name'],
            senderEmail: $validated['email'],
            mailSubject: $validated['subject'],
            body: $validated['message'],
        ));

        return back()->with('success', 'Message envoyé avec succès !');
    }
}
