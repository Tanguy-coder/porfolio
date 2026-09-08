<?php

namespace Database\Seeders;

use App\Models\AboutValue;
use App\Models\Certification;
use App\Models\ContactInfo;
use App\Models\Experience;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.local',
            'password' => Hash::make('password'),
        ]);

        $settings = [
            'hero_name' => 'Manoela Hardy Rakotonarivo',
            'hero_role' => 'Développeur Full-Stack',
            'hero_description' => "Développeur Full-Stack avec près de 2 ans d'expérience sur des applications web professionnelles. J'ai notamment contribué au développement et à l'évolution de QOLEE-TMS-AI, une solution dédiée à la gestion et au suivi des livraisons de colis.",
            'hero_badge' => 'Disponible · Ouvert aux opportunités',
            'about_text_1' => "J'ai découvert la programmation avec une conviction simple : le code transforme les idées en réalité. Passionné par la construction de systèmes robustes et performants, je m'investis dans chaque projet avec rigueur et créativité.",
            'about_text_2' => "Dès le début de ma carrière chez Orchis International, j'ai travaillé sur QOLEE-TMS-AI — une solution utilisée par des clients comme Air France. Cette expérience m'a appris que la qualité du code n'est pas un luxe, mais une nécessité.",
            'about_text_3' => "Je continue d'apprendre en permanence — architectures modernes, patterns avancés, nouveaux frameworks. Mon objectif : construire des systèmes scalables et maintenables, prêts pour l'échelle.",
            'footer_text' => 'Construit avec passion depuis Antananarivo 🇲🇬',

            // Hero EN
            'hero_name_en' => 'Manoela Hardy Rakotonarivo',
            'hero_badge_en' => 'Available · Open to opportunities',
            'hero_role_en' => 'Full-Stack Developer',
            'hero_description_en' => "Full-Stack Developer with nearly 2 years of experience building professional web applications. I notably contributed to the development and evolution of QOLEE-TMS-AI, a solution dedicated to parcel delivery management and tracking.",

            // About EN
            'about_text_1_en' => "I discovered programming with a simple conviction: code is the most powerful tool to turn ideas into reality. What drives me is building systems that <strong style='color:var(--text)'>actually work</strong> — not just in demos, but in professional environments.",
            'about_text_2_en' => "At Orchis International, I had the opportunity to work on <strong style='color:var(--text)'>QOLEE-TMS-AI</strong> early in my career — a parcel delivery management and tracking solution developed within projects involving <strong style='color:var(--text)'>Air France</strong> and <strong style='color:var(--text)'>Warning Group</strong>.",
            'about_text_3_en' => "I am constantly learning — modern architectures, advanced patterns and new frameworks. My goal is to become a developer capable of designing <strong style='color:var(--text)'>scalable and maintainable</strong> systems.",
            'footer_text_en' => 'Built with passion from Antananarivo 🇲🇬',

            // Nav labels
            'nav_home' => 'Accueil', 'nav_home_en' => 'Home',
            'nav_about' => 'À propos', 'nav_about_en' => 'About',
            'nav_skills' => 'Compétences', 'nav_skills_en' => 'Skills',
            'nav_projects' => 'Projets', 'nav_projects_en' => 'Projects',
            'nav_experience' => 'Expérience', 'nav_experience_en' => 'Experience',
            'nav_certifications' => 'Certifications', 'nav_certifications_en' => 'Certifications',
            'nav_contact' => 'Contact', 'nav_contact_en' => 'Contact',

            // Section labels & titles
            'section_about_label' => '// à propos', 'section_about_label_en' => '// about',
            'section_about_title' => 'Pourquoi je code', 'section_about_title_en' => 'Why I code',
            'section_skills_label' => '// compétences', 'section_skills_label_en' => '// skills',
            'section_skills_title' => 'Stack technique', 'section_skills_title_en' => 'Tech stack',
            'section_projects_label' => '// projets', 'section_projects_label_en' => '// projects',
            'section_projects_title' => "Ce que j'ai construit", 'section_projects_title_en' => "What I've built",
            'section_exp_label' => '// expérience', 'section_exp_label_en' => '// experience',
            'section_exp_title' => 'Parcours professionnel', 'section_exp_title_en' => 'Professional journey',
            'section_cert_label' => '// certifications', 'section_cert_label_en' => '// certifications',
            'section_cert_title' => 'Certifications', 'section_cert_title_en' => 'Certifications',
            'section_contact_label' => '// contact', 'section_contact_label_en' => '// contact',
            'section_contact_title' => 'Travaillons<br>ensemble.', 'section_contact_title_en' => "Let's work<br>together.",
            'contact_subtitle' => 'Ouvert à de nouvelles opportunités — que ce soit un poste full-time, du freelance ou une collaboration sur un projet ambitieux.',
            'contact_subtitle_en' => 'Open to new opportunities — full-time position, freelance or collaboration on an ambitious project.',

            // Button labels
            'btn_projects' => 'Voir mes projets →', 'btn_projects_en' => 'View my projects →',
            'btn_contact' => 'Me contacter', 'btn_contact_en' => 'Contact me',
            'btn_cv' => '⬇ Télécharger CV', 'btn_cv_en' => '⬇ Download CV',
            'btn_send' => 'Envoyer le message', 'btn_send_en' => 'Send message',

            // Stat labels
            'stat_exp' => "ANS D'EXP.", 'stat_exp_en' => 'YRS EXP.',
            'stat_projects' => 'PROJETS', 'stat_projects_en' => 'PROJECTS',
            'stat_pro_exp' => 'EXPÉRIENCE PROFESSIONNELLE MAJEURE', 'stat_pro_exp_en' => 'MAJOR PROFESSIONAL EXPERIENCE',
            'stat_certs' => 'CERTIFS', 'stat_certs_en' => 'CERTS',
            'stat_techs' => 'TECHNOS', 'stat_techs_en' => 'TECHS',

            // Form labels
            'form_name' => 'NOM', 'form_name_en' => 'NAME',
            'form_email' => 'EMAIL', 'form_email_en' => 'EMAIL',
            'form_subject' => 'SUJET', 'form_subject_en' => 'SUBJECT',
            'form_message' => 'MESSAGE', 'form_message_en' => 'MESSAGE',
            'form_subject_placeholder' => 'Opportunité / Projet / Collaboration', 'form_subject_placeholder_en' => 'Opportunity / Project / Collaboration',
            'form_message_placeholder' => 'Décrivez votre projet ou opportunité...', 'form_message_placeholder_en' => 'Describe your project or opportunity...',

            // Theme
            'theme_light' => 'Mode clair', 'theme_light_en' => 'Light mode',
            'theme_dark' => 'Mode sombre', 'theme_dark_en' => 'Dark mode',

            // Cert verify link text
            'cert_verify' => '↗ Vérifier le certificat', 'cert_verify_en' => '↗ Verify certificate',

            // Project link text
            'proj_link' => 'Voir sur GitHub →', 'proj_link_en' => 'View on GitHub →',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create(['key' => $key, 'value' => $value]);
        }

        $projects = [
            [
                'icon' => '🚚', 'title' => 'QOLEE-TMS-AI', 'type' => 'PROFESSIONNEL',
                'client' => 'Orchis International · Air France & Warning',
                'description' => 'Gestion intelligente du transport et suivi logistique en temps réel. NX Monorepo avec patterns CQRS/DDD. En production avec des clients internationaux majeurs.',
                'tags' => ['Angular', 'NestJS', 'NX', 'MongoDB', 'CQRS', 'DDD', 'Playwright'],
                'link' => null, 'sort_order' => 1,
                'title_en' => 'QOLEE-TMS-AI', 'type_en' => 'PROFESSIONAL',
                'client_en' => 'Orchis International · Air France & Warning Group',
                'description_en' => 'Intelligent transport management and real-time logistics tracking. NX Monorepo architecture using CQRS and DDD patterns. In production with major international clients.',
                'link_label_en' => 'View on GitHub →',
            ],
            [
                'icon' => '🏫', 'title' => 'EKOLOVA', 'type' => 'PERSONNEL', 'client' => null,
                'description' => 'Application de gestion scolaire — évaluations, périodes, suivi des élèves, export de bulletins.',
                'tags' => ['React', 'Vite', 'TypeScript', 'Playwright'],
                'link' => 'https://github.com/HardyRak/gestion-ecole', 'sort_order' => 2,
                'title_en' => 'EKOLOVA',
                'description_en' => 'School management application — assessments, periods, student tracking and report exports.',
                'link_label_en' => 'View on GitHub →',
            ],
            [
                'icon' => '🎬', 'title' => 'MadaMovie', 'type' => 'PERSONNEL', 'client' => null,
                'description' => 'Application mobile de streaming de films malgaches — catalogue, abonnements, auth JWT, interface mobile-first.',
                'tags' => ['Angular', 'Ionic', 'Spring Boot', 'JWT', 'Docker'],
                'link' => 'https://github.com/HardyRak/madamovie-front-end', 'sort_order' => 3,
                'title_en' => 'MadaMovie',
                'description_en' => 'Mobile streaming app for Malagasy films — catalog, subscriptions, JWT authentication, mobile-first UI.',
                'link_label_en' => 'View on GitHub →',
            ],
            [
                'icon' => '🚗', 'title' => 'VarotraFiara', 'type' => 'PERSONNEL', 'client' => null,
                'description' => 'API REST marketplace de véhicules — annonces, favoris, commissions. Architecture clean et scalable.',
                'tags' => ['Spring Boot', 'MongoDB', 'Java', 'REST API'],
                'link' => 'https://github.com/HardyRak', 'sort_order' => 4,
                'title_en' => 'VarotraFiara',
                'description_en' => 'REST API vehicle marketplace — listings, favorites, commissions. Clean and scalable architecture.',
                'link_label_en' => 'View on GitHub →',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $skills = [
            ['name' => 'Angular', 'category' => 'FRONT-END', 'category_en' => 'FRONT-END'],
            ['name' => 'NestJS', 'category' => 'BACK-END', 'category_en' => 'BACK-END'],
            ['name' => 'TypeScript & JavaScript', 'category' => 'LANGAGE', 'category_en' => 'LANGUAGE'],
            ['name' => 'NX Monorepo', 'category' => 'ARCHITECTURE', 'category_en' => 'ARCHITECTURE'],
            ['name' => 'RxJS & NgRx Signals', 'category' => 'FRONT-END', 'category_en' => 'FRONT-END'],
            ['name' => 'Java & Spring Boot', 'category' => 'BACK-END', 'category_en' => 'BACK-END'],
            ['name' => 'PHP', 'category' => 'BACK-END', 'category_en' => 'BACK-END'],
            ['name' => 'Ionic', 'category' => 'MOBILE', 'category_en' => 'MOBILE'],
            ['name' => 'MongoDB & PostgreSQL', 'category' => 'BASE DE DONNÉES', 'category_en' => 'DATABASE'],
            ['name' => 'Playwright & Tests E2E', 'category' => 'TESTING', 'category_en' => 'TESTING'],
            ['name' => 'CQRS & DDD', 'category' => 'ARCHITECTURE', 'category_en' => 'ARCHITECTURE'],
            ['name' => 'Git & GitHub', 'category' => 'VERSIONING', 'category_en' => 'VERSIONING'],
            ['name' => 'Docker', 'category' => 'DEVOPS', 'category_en' => 'DEVOPS'],
            ['name' => 'GitHub Actions', 'category' => 'CI/CD', 'category_en' => 'CI/CD'],
            ['name' => 'Outils IA pour le développement', 'category' => 'WORKFLOW', 'name_en' => 'AI Tools for Development', 'category_en' => 'WORKFLOW'],
        ];

        foreach ($skills as $i => $skill) {
            Skill::create(array_merge($skill, ['sort_order' => $i + 1]));
        }

        $experiences = [
            [
                'title' => 'Développeur Full-Stack',
                'date_range' => 'Mai 2025 — Août 2026',
                'company' => 'Orchis International',
                'location' => 'Antananarivo',
                'tags' => ['Angular', 'NestJS', 'NX', 'MongoDB', 'CQRS', 'DDD'],
                'tasks' => [
                    'Contribution au développement de QOLEE-TMS-AI pour Air France et Warning Group',
                    'Développement de read-models CQRS suivant les principes DDD avec MongoDB Change Streams sur plusieurs modules ; contribution aux DTOs partagés en TypeScript',
                    'Front-end Angular avec NgRx Signals, tests E2E via Playwright, CI/CD avec GitHub Actions',
                ],
                'sort_order' => 1,
                'title_en' => 'Full-Stack Developer',
                'date_range_en' => 'May 2025 — Aug. 2026',
                'company_en' => 'Orchis International',
                'location_en' => 'Antananarivo',
                'tasks_en' => [
                    'Contribution to the development and evolution of QOLEE-TMS-AI, a parcel delivery management and tracking solution, within projects involving Air France and Warning Group.',
                    'Development of CQRS read-models following DDD principles, using MongoDB Change Streams across multiple modules; contribution to shared TypeScript DTOs.',
                    'Angular front-end development with NgRx Signals, E2E testing with Playwright, contribution to CI/CD GitHub Actions pipelines.',
                ],
            ],
            [
                'title' => 'Stagiaire — Développement Web & Mobile',
                'date_range' => 'Oct. 2024 — Avr. 2025',
                'company' => 'Orchis International',
                'location' => 'Antananarivo',
                'tags' => ['Angular', 'NestJS', 'NX', 'C'],
                'tasks' => [
                    'Montée en compétences sur Angular, contribution active à QOLEE-TMS-AI',
                    'Approfondissement algorithmique via le programme France IOI (langage C)',
                    'Intégration agile, code review, participation aux sprints',
                ],
                'sort_order' => 2,
                'title_en' => 'Intern — Web & Mobile Development',
                'date_range_en' => 'Oct. 2024 — Apr. 2025',
                'company_en' => 'Orchis International',
                'location_en' => 'Antananarivo',
                'tasks_en' => [
                    'Skill development on Angular and active contribution to QOLEE-TMS-AI',
                    'Algorithmic deepening through the France IOI program (C language)',
                    'Agile integration, code reviews and sprint delivery participation',
                ],
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        $certifications = [
            ['icon' => '⚡', 'title' => 'Angular Foundation', 'issuer' => 'StudySection E-Certification', 'date' => 'Octobre 2025', 'date_en' => 'October 2025', 'verification_link' => 'https://www.studysection.com/users/socialMedia/ODE4ODY5/aGFyZHlyYWtvdG82NkBnbWFpbC5jb20%3D', 'sort_order' => 1],
            ['icon' => '☕', 'title' => 'Java Programming Foundation', 'issuer' => 'StudySection E-Certification', 'date' => 'Juillet 2024', 'date_en' => 'July 2024', 'verification_link' => 'https://www.studysection.com/users/socialMedia/NzY3MzMx/aGFyZHlyYWtvdG82NkBnbWFpbC5jb20%3D', 'sort_order' => 2],
            ['icon' => '🐍', 'title' => 'Python Foundation', 'issuer' => 'StudySection E-Certification', 'date' => 'Juillet 2024', 'date_en' => 'July 2024', 'verification_link' => 'https://www.studysection.com/users/socialMedia/NzY3MzMw/aGFyZHlyYWtvdG82NkBnbWFpbC5jb20%3D', 'sort_order' => 3],
            ['icon' => '⚙️', 'title' => 'C Programming Foundation', 'issuer' => 'StudySection E-Certification', 'date' => 'Octobre 2025', 'date_en' => 'October 2025', 'verification_link' => 'https://www.studysection.com/users/socialMedia/ODE4ODc0/aGFyZHlyYWtvdG82NkBnbWFpbC5jb20%3D', 'sort_order' => 4],
            ['icon' => '🇬🇧', 'title' => 'Anglais Niveau 1', 'title_en' => 'English Level 1', 'issuer' => 'KM Academy', 'date' => null, 'date_en' => null, 'verification_link' => null, 'sort_order' => 5],
        ];

        foreach ($certifications as $cert) {
            Certification::create($cert);
        }

        $aboutValues = [
            ['icon' => '🎯', 'title' => 'Orienté résultat', 'description' => 'Je livre du code propre, testé et documenté.', 'sort_order' => 1, 'title_en' => 'Result-driven', 'description_en' => 'I deliver clean, tested and documented code — not just code that works on my machine.'],
            ['icon' => '🏗️', 'title' => 'Sensibilité architecture & qualité', 'description' => 'CQRS, DDD, NX Monorepo — je pense structure avant fonctionnalité.', 'sort_order' => 2, 'title_en' => 'Architecture first', 'description_en' => 'CQRS, DDD, NX Monorepo — I pay close attention to code structure and maintainability.'],
            ['icon' => '🌍', 'title' => 'Vision internationale', 'description' => 'Ambition de travailler sur des projets à impact mondial, depuis Madagascar.', 'sort_order' => 3, 'title_en' => 'International vision', 'description_en' => 'Working on internationally oriented projects from Madagascar — that is my ambition.'],
        ];

        foreach ($aboutValues as $value) {
            AboutValue::create($value);
        }

        $contactInfos = [
            ['icon' => '✉️', 'label' => 'EMAIL', 'value' => 'hardyrakoto66@gmail.com', 'link' => 'mailto:hardyrakoto66@gmail.com', 'sort_order' => 1, 'label_en' => 'EMAIL', 'value_en' => 'hardyrakoto66@gmail.com'],
            ['icon' => '💻', 'label' => 'GITHUB', 'value' => 'github.com/HardyRak', 'link' => 'https://github.com/HardyRak', 'sort_order' => 2, 'label_en' => 'GITHUB', 'value_en' => 'github.com/HardyRak'],
            ['icon' => '🔗', 'label' => 'LINKEDIN', 'value' => 'Hardy Rakotonarivo', 'link' => 'https://www.linkedin.com/in/hardy-rakotonarivo-a073072b5/', 'sort_order' => 3, 'label_en' => 'LINKEDIN', 'value_en' => 'Hardy Rakotonarivo'],
            ['icon' => '📞', 'label' => 'TÉLÉPHONE', 'value' => '+261 33 71 545 95', 'link' => 'tel:+261337154595', 'sort_order' => 4, 'label_en' => 'PHONE', 'value_en' => '+261 33 71 545 95'],
        ];

        foreach ($contactInfos as $info) {
            ContactInfo::create($info);
        }
    }
}
