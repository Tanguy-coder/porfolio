@extends('layouts.admin')

@section('title', 'Paramètres du site')

@section('content')
<div class="card">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- HERO --}}
        <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Hero</h3>

        <div class="form-group">
            <label>Nom affiché</label>
            <input type="text" name="hero_name" value="{{ old('hero_name', $settings['hero_name'] ?? '') }}">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Badge (FR)</label>
                <input type="text" name="hero_badge" value="{{ old('hero_badge', $settings['hero_badge'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Badge (EN)</label>
                <input type="text" name="hero_badge_en" value="{{ old('hero_badge_en', $settings['hero_badge_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Rôle (FR)</label>
                <input type="text" name="hero_role" value="{{ old('hero_role', $settings['hero_role'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Role (EN)</label>
                <input type="text" name="hero_role_en" value="{{ old('hero_role_en', $settings['hero_role_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Description (FR)</label>
                <textarea name="hero_description" rows="3">{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label>Description (EN)</label>
                <textarea name="hero_description_en" rows="3">{{ old('hero_description_en', $settings['hero_description_en'] ?? '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label>Photo (URL ou chemin)</label>
            <input type="text" name="hero_photo" value="{{ old('hero_photo', $settings['hero_photo'] ?? '') }}">
        </div>

        <div class="form-group">
            <label>Lien CV (URL)</label>
            <input type="text" name="cv_link" value="{{ old('cv_link', $settings['cv_link'] ?? '') }}">
        </div>

        {{-- BOUTONS --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Boutons</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Voir mes projets (FR)</label>
                <input type="text" name="btn_projects" value="{{ old('btn_projects', $settings['btn_projects'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>View my projects (EN)</label>
                <input type="text" name="btn_projects_en" value="{{ old('btn_projects_en', $settings['btn_projects_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Me contacter (FR)</label>
                <input type="text" name="btn_contact" value="{{ old('btn_contact', $settings['btn_contact'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Contact me (EN)</label>
                <input type="text" name="btn_contact_en" value="{{ old('btn_contact_en', $settings['btn_contact_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Télécharger CV (FR)</label>
                <input type="text" name="btn_cv" value="{{ old('btn_cv', $settings['btn_cv'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Download CV (EN)</label>
                <input type="text" name="btn_cv_en" value="{{ old('btn_cv_en', $settings['btn_cv_en'] ?? '') }}">
            </div>
        </div>

        {{-- STATISTIQUES --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Statistiques Hero</h3>
        </div>

        @foreach([
            ['stat_exp', "Années d'exp.", 'Years exp.', 'stat_exp_value'],
            ['stat_projects', 'Projets', 'Projects', 'stat_projects_value'],
            ['stat_pro_exp', 'Exp. pro.', 'Pro exp.', 'stat_pro_exp_value'],
            ['stat_certs', 'Certifs', 'Certs', 'stat_certs_value'],
            ['stat_techs', 'Technos', 'Techs', 'stat_techs_value'],
        ] as $stat)
        <div class="form-row" style="align-items:flex-end;">
            <div class="form-group" style="flex:0.5;">
                <label>Valeur</label>
                <input type="text" name="{{ $stat[3] }}" value="{{ old($stat[3], $settings[$stat[3]] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Label FR ({{ $stat[1] }})</label>
                <input type="text" name="{{ $stat[0] }}" value="{{ old($stat[0], $settings[$stat[0]] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Label EN ({{ $stat[2] }})</label>
                <input type="text" name="{{ $stat[0] }}_en" value="{{ old($stat[0].'_en', $settings[$stat[0].'_en'] ?? '') }}">
            </div>
        </div>
        @endforeach

        {{-- NAVIGATION --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Navigation</h3>
        </div>

        @foreach([
            ['nav_home', 'Accueil', 'Home'],
            ['nav_about', 'À propos', 'About'],
            ['nav_skills', 'Compétences', 'Skills'],
            ['nav_projects', 'Projets', 'Projects'],
            ['nav_experience', 'Expérience', 'Experience'],
            ['nav_certifications', 'Certifications', 'Certifications'],
            ['nav_contact', 'Contact', 'Contact'],
        ] as $nav)
        <div class="form-row">
            <div class="form-group">
                <label>{{ $nav[1] }} (FR)</label>
                <input type="text" name="{{ $nav[0] }}" value="{{ old($nav[0], $settings[$nav[0]] ?? '') }}">
            </div>
            <div class="form-group">
                <label>{{ $nav[2] }} (EN)</label>
                <input type="text" name="{{ $nav[0] }}_en" value="{{ old($nav[0].'_en', $settings[$nav[0].'_en'] ?? '') }}">
            </div>
        </div>
        @endforeach

        <div class="form-row">
            <div class="form-group">
                <label>Mode clair (FR)</label>
                <input type="text" name="theme_light" value="{{ old('theme_light', $settings['theme_light'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Light mode (EN)</label>
                <input type="text" name="theme_light_en" value="{{ old('theme_light_en', $settings['theme_light_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Mode sombre (FR)</label>
                <input type="text" name="theme_dark" value="{{ old('theme_dark', $settings['theme_dark'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Dark mode (EN)</label>
                <input type="text" name="theme_dark_en" value="{{ old('theme_dark_en', $settings['theme_dark_en'] ?? '') }}">
            </div>
        </div>

        {{-- SECTIONS --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Titres des sections</h3>
        </div>

        @foreach([
            ['section_about', 'À propos', 'About'],
            ['section_skills', 'Compétences', 'Skills'],
            ['section_projects', 'Projets', 'Projects'],
            ['section_exp', 'Expérience', 'Experience'],
            ['section_cert', 'Certifications', 'Certifications'],
            ['section_contact', 'Contact', 'Contact'],
        ] as $section)
        <div class="form-row">
            <div class="form-group">
                <label>{{ $section[1] }} — Label (FR)</label>
                <input type="text" name="{{ $section[0] }}_label" value="{{ old($section[0].'_label', $settings[$section[0].'_label'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>{{ $section[2] }} — Label (EN)</label>
                <input type="text" name="{{ $section[0] }}_label_en" value="{{ old($section[0].'_label_en', $settings[$section[0].'_label_en'] ?? '') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>{{ $section[1] }} — Titre (FR)</label>
                <input type="text" name="{{ $section[0] }}_title" value="{{ old($section[0].'_title', $settings[$section[0].'_title'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>{{ $section[2] }} — Title (EN)</label>
                <input type="text" name="{{ $section[0] }}_title_en" value="{{ old($section[0].'_title_en', $settings[$section[0].'_title_en'] ?? '') }}">
            </div>
        </div>
        @endforeach

        {{-- ABOUT TEXTE --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Textes "À propos"</h3>
        </div>

        @for($i = 1; $i <= 3; $i++)
        <div class="form-row">
            <div class="form-group">
                <label>Paragraphe {{ $i }} (FR)</label>
                <textarea name="about_text_{{ $i }}" rows="3">{{ old("about_text_{$i}", $settings["about_text_{$i}"] ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label>Paragraph {{ $i }} (EN)</label>
                <textarea name="about_text_{{ $i }}_en" rows="3">{{ old("about_text_{$i}_en", $settings["about_text_{$i}_en"] ?? '') }}</textarea>
            </div>
        </div>
        @endfor

        {{-- LIENS PROJETS / CERTIFS --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Labels divers</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Lien projet (FR)</label>
                <input type="text" name="proj_link" value="{{ old('proj_link', $settings['proj_link'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Project link (EN)</label>
                <input type="text" name="proj_link_en" value="{{ old('proj_link_en', $settings['proj_link_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Vérifier certificat (FR)</label>
                <input type="text" name="cert_verify" value="{{ old('cert_verify', $settings['cert_verify'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Verify certificate (EN)</label>
                <input type="text" name="cert_verify_en" value="{{ old('cert_verify_en', $settings['cert_verify_en'] ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Sous-titre contact (FR)</label>
                <input type="text" name="contact_subtitle" value="{{ old('contact_subtitle', $settings['contact_subtitle'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Contact subtitle (EN)</label>
                <input type="text" name="contact_subtitle_en" value="{{ old('contact_subtitle_en', $settings['contact_subtitle_en'] ?? '') }}">
            </div>
        </div>

        {{-- FORMULAIRE DE CONTACT --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Formulaire de contact</h3>
        </div>

        @foreach([
            ['form_name', 'Label nom', 'Name label'],
            ['form_email', 'Label email', 'Email label'],
            ['form_subject', 'Label sujet', 'Subject label'],
            ['form_subject_placeholder', 'Placeholder sujet', 'Subject placeholder'],
            ['form_message', 'Label message', 'Message label'],
            ['form_message_placeholder', 'Placeholder message', 'Message placeholder'],
            ['btn_send', 'Bouton envoyer', 'Send button'],
        ] as $form)
        <div class="form-row">
            <div class="form-group">
                <label>{{ $form[1] }} (FR)</label>
                <input type="text" name="{{ $form[0] }}" value="{{ old($form[0], $settings[$form[0]] ?? '') }}">
            </div>
            <div class="form-group">
                <label>{{ $form[2] }} (EN)</label>
                <input type="text" name="{{ $form[0] }}_en" value="{{ old($form[0].'_en', $settings[$form[0].'_en'] ?? '') }}">
            </div>
        </div>
        @endforeach

        {{-- FOOTER --}}
        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Footer</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Texte footer (FR)</label>
                <input type="text" name="footer_text" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}">
            </div>
            <div class="form-group">
                <label>Footer text (EN)</label>
                <input type="text" name="footer_text_en" value="{{ old('footer_text_en', $settings['footer_text_en'] ?? '') }}">
            </div>
        </div>

        <div style="margin-top:1.5rem;">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
