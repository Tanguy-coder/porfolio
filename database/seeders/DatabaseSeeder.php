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

            // Stat values
            'stat_num_exp' => '2+',
            'stat_num_projects' => '14',
            'stat_num_pro_exp' => '2',
            'stat_num_certs' => '6',
            'stat_num_techs' => '15+',

            // Stat labels
            'stat_exp' => "ANS D'EXP.", 'stat_exp_en' => 'YRS EXP.',
            'stat_projects' => 'PROJETS', 'stat_projects_en' => 'PROJECTS',
            'stat_pro_exp' => 'EXP. PRO.', 'stat_pro_exp_en' => 'PRO. EXP.',
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
            // === 1. PROJETS PROFESSIONNELS / MÉTIER ===
            [
                'icon' => '🌾', 'title' => 'SCI AGRI — Agricultural Field Management App', 'type' => 'PROFESSIONNEL / AGRICULTURE',
                'client' => null,
                'description' => 'Application mobile destinée à la collecte et à la gestion de données terrain, développée avec une approche offline-first pour fonctionner dans des contextes de connectivité limitée. Le projet met l\'accent sur la collecte locale, la synchronisation des données et la fiabilité des échanges avec le backend.',
                'tags' => ['React Native', 'Expo', 'WatermelonDB', 'SQLite', 'Offline-first', 'Synchronisation', 'Background Tasks', 'Notifee'],
                'link' => null, 'sort_order' => 1,
                'title_en' => 'SCI AGRI — Agricultural Field Management App', 'type_en' => 'PROFESSIONAL / AGRICULTURE',
                'client_en' => null,
                'description_en' => 'Mobile application for field data collection and management, developed with an offline-first approach to work in limited connectivity contexts. The project focuses on local data collection, synchronization, and reliable exchanges with the backend.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '💊', 'title' => 'EasyPharma / PharmaPlus — Pharmacy Management', 'type' => 'PROFESSIONNEL / GESTION',
                'client' => null,
                'description' => 'Solution de gestion destinée aux pharmacies pour digitaliser et simplifier leurs opérations métier. Le projet s\'inscrit dans l\'écosystème EasySuite de solutions de gestion développées pour répondre aux besoins des entreprises.',
                'tags' => ['PHP', 'Laravel', 'MySQL', 'Filament', 'REST API', 'Applications métier'],
                'link' => null, 'sort_order' => 2,
                'title_en' => 'EasyPharma / PharmaPlus — Pharmacy Management', 'type_en' => 'PROFESSIONAL / MANAGEMENT',
                'client_en' => null,
                'description_en' => 'Management solution for pharmacies to digitalize and simplify their business operations. The project is part of the EasySuite ecosystem of management solutions developed to meet business needs.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '📦', 'title' => 'EasyStock — Stock Management', 'type' => 'PROFESSIONNEL / GESTION',
                'client' => null,
                'description' => 'Solution de gestion de stock conçue pour accompagner les entreprises dans le suivi et la gestion de leurs opérations. Le projet fait partie de l\'écosystème EasySuite dédié aux applications métier.',
                'tags' => ['PHP', 'Laravel', 'MySQL', 'Filament', 'REST API'],
                'link' => null, 'sort_order' => 3,
                'title_en' => 'EasyStock — Stock Management', 'type_en' => 'PROFESSIONAL / MANAGEMENT',
                'client_en' => null,
                'description_en' => 'Stock management solution designed to support businesses in tracking and managing their operations. The project is part of the EasySuite ecosystem dedicated to business applications.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '🏨', 'title' => 'EasyResto / HotelPlus — Business Management', 'type' => 'PROFESSIONNEL / RESTAURATION & HÔTELLERIE',
                'client' => null,
                'description' => 'Solutions de gestion métier destinées aux activités de restauration et d\'hôtellerie, avec pour objectif de digitaliser les opérations et centraliser les données nécessaires au fonctionnement quotidien.',
                'tags' => ['PHP', 'Laravel', 'MySQL', 'Applications métier', 'REST API'],
                'link' => null, 'sort_order' => 4,
                'title_en' => 'EasyResto / HotelPlus — Business Management', 'type_en' => 'PROFESSIONAL / RESTAURANT & HOSPITALITY',
                'client_en' => null,
                'description_en' => 'Business management solutions for restaurant and hospitality activities, aiming to digitalize operations and centralize the data needed for daily functioning.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            // === 2. BACKEND & ARCHITECTURE ===
            [
                'icon' => '🎓', 'title' => 'ISMB App Backend — School Management Backend', 'type' => 'PROJET / ÉDUCATION',
                'client' => null,
                'description' => 'Backend d\'une application de gestion scolaire développé avec Spring Boot et conçu autour d\'une architecture hexagonale. L\'application couvre la gestion des étudiants, enseignants, filières, niveaux, matières, unités d\'enseignement, notes et utilisateurs.',
                'tags' => ['Java 17', 'Spring Boot 3.3', 'MySQL', 'Spring Data JPA', 'Spring Security', 'JWT', 'RBAC', 'MapStruct', 'JUnit', 'Mockito', 'MockMvc', 'H2', 'Swagger/OpenAPI'],
                'link' => null, 'sort_order' => 5,
                'title_en' => 'ISMB App Backend — School Management Backend', 'type_en' => 'PROJECT / EDUCATION',
                'client_en' => null,
                'description_en' => 'Backend for a school management application developed with Spring Boot and designed around a hexagonal architecture. The application covers the management of students, teachers, programs, levels, subjects, teaching units, grades, and users.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '🛒', 'title' => 'E-Commerce MS App — E-Commerce Microservices Application', 'type' => 'PROJET / E-COMMERCE',
                'client' => null,
                'description' => 'Application e-commerce développée pour mettre en pratique une architecture microservices avec Spring Boot et Spring Cloud. La gestion des clients, des produits et de la facturation est répartie entre des services indépendants, avec API Gateway et découverte dynamique via Eureka.',
                'tags' => ['Java 21', 'Spring Boot 4', 'Spring Cloud', 'Gateway', 'Eureka', 'OpenFeign', 'Spring Data JPA', 'HATEOAS', 'H2', 'Maven', 'Actuator'],
                'link' => null, 'sort_order' => 6,
                'title_en' => 'E-Commerce MS App — E-Commerce Microservices Application', 'type_en' => 'PROJECT / E-COMMERCE',
                'client_en' => null,
                'description_en' => 'E-commerce application developed to practice a microservices architecture with Spring Boot and Spring Cloud. Client, product, and billing management is distributed across independent services, with API Gateway and dynamic discovery via Eureka.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '🏦', 'title' => 'E-Bank MS App — Banking Microservices Application', 'type' => 'PROJET / FINTECH & BANKING',
                'client' => null,
                'description' => 'Application bancaire basée sur une architecture microservices, permettant d\'explorer la séparation des domaines, la communication entre services et les mécanismes de résilience. Le projet intègre également un service dédié aux fonctionnalités d\'assistance bancaire avec une intégration IA.',
                'tags' => ['Java', 'Spring Boot', 'Spring Cloud', 'PostgreSQL', 'OpenFeign', 'Resilience4j', 'Config Server', 'Spring AI', 'MCP', 'OpenAI', 'MapStruct'],
                'link' => null, 'sort_order' => 7,
                'title_en' => 'E-Bank MS App — Banking Microservices Application', 'type_en' => 'PROJECT / FINTECH & BANKING',
                'client_en' => null,
                'description_en' => 'Banking application based on a microservices architecture, exploring domain separation, inter-service communication, and resilience mechanisms. The project also includes a dedicated service for banking assistance features with AI integration.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '💳', 'title' => 'DigiPay — Digital Payment & Settlement Platform', 'type' => 'PROJET / FINTECH & PAYMENTS',
                'client' => null,
                'description' => 'Plateforme de paiement digital et de settlement conçue autour des problématiques des systèmes financiers distribués : traitement des paiements, cohérence des données, idempotence, résilience et transactions distribuées. L\'architecture explore notamment Kafka, CQRS, Saga et l\'Outbox Pattern.',
                'tags' => ['Java', 'Spring Boot', 'Kafka', 'PostgreSQL', 'Redis', 'Microservices', 'Event-Driven Architecture', 'CQRS', 'Saga', 'Outbox Pattern', 'Idempotence'],
                'link' => null, 'sort_order' => 8,
                'title_en' => 'DigiPay — Digital Payment & Settlement Platform', 'type_en' => 'PROJECT / FINTECH & PAYMENTS',
                'client_en' => null,
                'description_en' => 'Digital payment and settlement platform designed around distributed financial system challenges: payment processing, data consistency, idempotency, resilience, and distributed transactions. The architecture notably explores Kafka, CQRS, Saga, and the Outbox Pattern.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '💼', 'title' => 'DigiTrade — Digital Trade Finance & Credit Management Platform', 'type' => 'PROJET / FINTECH & TRADE FINANCE',
                'client' => null,
                'description' => 'Plateforme digitale de financement du commerce et de gestion du crédit couvrant le cycle complet d\'un financement, de la demande de crédit au remboursement et au recouvrement. Le projet explore les problématiques complexes du secteur financier : analyse du risque, limites de crédit, concurrence, transactions distribuées, double décaissement, cohérence des expositions et auditabilité.',
                'tags' => ['Java 21', 'Spring Boot', 'Spring Cloud', 'Kafka', 'PostgreSQL', 'Redis', 'Microservices', 'DDD', 'Architecture Hexagonale', 'CQRS', 'Event Sourcing', 'Saga', 'Outbox Pattern', 'Kubernetes', 'OpenTelemetry', 'Keycloak'],
                'link' => null, 'sort_order' => 9,
                'title_en' => 'DigiTrade — Digital Trade Finance & Credit Management Platform', 'type_en' => 'PROJECT / FINTECH & TRADE FINANCE',
                'client_en' => null,
                'description_en' => 'Digital trade finance and credit management platform covering the full financing cycle, from credit application to repayment and recovery. The project explores complex financial sector challenges: risk analysis, credit limits, concurrency, distributed transactions, double disbursement, exposure consistency, and auditability.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            // === 3. PROJETS INNOVATION / ARCHITECTURE ===
            [
                'icon' => '🚚', 'title' => 'ETANA — Predictive ETA Platform', 'type' => 'PROJET / LOGTECH & AI',
                'client' => null,
                'description' => 'Plateforme de prédiction des temps d\'arrivée conçue pour améliorer la précision des ETA dans les livraisons à Lomé. Le système exploite les données GPS et l\'historique des trajets pour calculer des temps de parcours par zones géographiques et produire des prédictions adaptées au contexte.',
                'tags' => ['Java', 'Spring Boot', 'PostgreSQL', 'PostGIS', 'GPS', 'Data Processing', 'Offline-first', 'REST API', 'Predictive Analytics'],
                'link' => null, 'sort_order' => 10,
                'title_en' => 'ETANA — Predictive ETA Platform', 'type_en' => 'PROJECT / LOGTECH & AI',
                'client_en' => null,
                'description_en' => 'ETA prediction platform designed to improve delivery time accuracy in Lomé. The system leverages GPS data and trip history to calculate travel times by geographic zones and produce context-adapted predictions.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '📡', 'title' => 'File Transfer QR — Optical File Transfer', 'type' => 'PROJET / INNOVATION',
                'client' => null,
                'description' => 'Concept de transfert de fichiers utilisant un canal optique entre un écran et une caméra, sans dépendre du Wi-Fi Direct, Wi-Fi Aware ou d\'un réseau local. Les fichiers sont découpés en fragments, encodés, transmis visuellement puis reconstruits avec une vérification d\'intégrité.',
                'tags' => ['Chunking', 'Encoding', 'QR', 'Optical Communication', 'Camera', 'SHA-256', 'Data Integrity'],
                'link' => null, 'sort_order' => 11,
                'title_en' => 'File Transfer QR — Optical File Transfer', 'type_en' => 'PROJECT / INNOVATION',
                'client_en' => null,
                'description_en' => 'File transfer concept using an optical channel between a screen and a camera, without relying on Wi-Fi Direct, Wi-Fi Aware, or a local network. Files are chunked, encoded, visually transmitted, then reconstructed with integrity verification.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '🚨', 'title' => 'Emergency Platform — Digital Emergency Assistance', 'type' => 'PROJET / CIVTECH',
                'client' => null,
                'description' => 'Concept de plateforme web légère destinée à faciliter l\'accès aux services d\'urgence au Togo, avec une attention particulière portée aux environnements à faible connectivité. L\'approche privilégie une expérience sans installation, une utilisation simple et une conservation locale des données lorsque cela est possible.',
                'tags' => ['PWA', 'Offline-first', 'Low Bandwidth', 'Web Platform', 'Local Storage', 'Emergency Services'],
                'link' => null, 'sort_order' => 12,
                'title_en' => 'Emergency Platform — Digital Emergency Assistance', 'type_en' => 'PROJECT / CIVTECH',
                'client_en' => null,
                'description_en' => 'Concept of a lightweight web platform designed to facilitate access to emergency services in Togo, with particular attention to low-connectivity environments. The approach favors a no-install experience, simple usage, and local data storage when possible.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '✈️', 'title' => 'Aircraft & Equipment Potential Management', 'type' => 'PROJET / AVIATION',
                'client' => null,
                'description' => 'Conception d\'un système de gestion du potentiel des équipements aéronautiques permettant de suivre leur état, leurs défauts, leurs échéances et leur historique. Le modèle métier prend notamment en compte les contrôles, les TBO, les compteurs et l\'interdiction d\'utilisation d\'un équipement présentant un défaut non résolu.',
                'tags' => ['Domain Modeling', 'Asset Management', 'Maintenance', 'Aviation', 'Audit Trail', 'Business Rules'],
                'link' => null, 'sort_order' => 13,
                'title_en' => 'Aircraft & Equipment Potential Management', 'type_en' => 'PROJECT / AVIATION',
                'client_en' => null,
                'description_en' => 'Design of a potential management system for aeronautical equipment, enabling tracking of their condition, defects, deadlines, and history. The business model notably accounts for inspections, TBOs, counters, and the prohibition of using equipment with an unresolved defect.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
            ],
            [
                'icon' => '🌐', 'title' => 'BrighttSolutions — Web Platform', 'type' => 'PROJET / WEB',
                'client' => null,
                'description' => 'Développement et maintenance d\'une plateforme web basée sur WordPress avec personnalisation du thème et adaptation de l\'environnement serveur. Le projet comprend également des interventions sur la configuration PHP, Apache et l\'hébergement.',
                'tags' => ['WordPress', 'PHP', 'Custom Theme', 'Apache', '.htaccess', 'PHP 8.2', 'MySQL'],
                'link' => null, 'sort_order' => 14,
                'title_en' => 'BrighttSolutions — Web Platform', 'type_en' => 'PROJECT / WEB',
                'client_en' => null,
                'description_en' => 'Development and maintenance of a WordPress-based web platform with theme customization and server environment adaptation. The project also includes work on PHP, Apache, and hosting configuration.',
                'link_label' => 'Voir sur GitHub ↗', 'link_label_en' => 'View on GitHub ↗',
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
                'title' => 'Ingénieur Logiciel Fullstack',
                'date_range' => 'Novembre 2025 — Présent',
                'company' => 'ITVOG',
                'location' => 'Lomé, Togo',
                'tags' => ['Laravel', 'React Native', 'REST API', 'MySQL', 'Offline-first', 'Git', 'Jira', 'Agile'],
                'tasks' => [
                    'Développement et évolution d\'applications métier avec Laravel et React Native',
                    'Conception et intégration d\'API REST',
                    'Implémentation de fonctionnalités métier et amélioration des parcours utilisateurs',
                    'Mise en place de mécanismes de synchronisation et de réconciliation des données',
                    'Travail sur des fonctionnalités offline-first et la synchronisation des données',
                    'Analyse et correction des anomalies techniques et fonctionnelles',
                    'Participation aux phases de tests, de validation et d\'amélioration de la qualité',
                    'Collaboration avec l\'équipe dans un environnement Agile',
                ],
                'sort_order' => 1,
                'title_en' => 'Fullstack Software Engineer',
                'date_range_en' => 'November 2025 — Present',
                'company_en' => 'ITVOG',
                'location_en' => 'Lomé, Togo',
                'tasks_en' => [
                    'Development and evolution of business applications with Laravel and React Native',
                    'Design and integration of REST APIs',
                    'Implementation of business features and improvement of user journeys',
                    'Implementation of data synchronization and reconciliation mechanisms',
                    'Work on offline-first features and data synchronization',
                    'Analysis and resolution of technical and functional issues',
                    'Participation in testing, validation, and quality improvement phases',
                    'Collaboration with the team in an Agile environment',
                ],
            ],
            [
                'title' => 'Développeur Web Freelance / Consultant',
                'date_range' => '2021 — Juillet 2025',
                'company' => 'DT-DEV — Freelance',
                'location' => 'Remote',
                'tags' => ['Backend', 'Laravel', 'PHP', 'REST API', 'MySQL', 'Docker', 'Git', 'CI/CD', 'Applications métier'],
                'tasks' => [
                    'Analyse des besoins et conception de solutions adaptées aux problématiques métier',
                    'Conception et développement d\'applications web et d\'API REST',
                    'Développement de solutions dans les domaines de la finance, de l\'éducation et de la gestion',
                    'Mise en place et maintenance de bases de données et services backend',
                    'Tests, déploiement et maintenance des applications',
                    'Amélioration des performances, de la fiabilité et de la sécurité des solutions',
                    'Accompagnement des utilisateurs et support technique',
                    'Formation et transfert de connaissances aux utilisateurs et équipes clientes',
                ],
                'sort_order' => 2,
                'title_en' => 'Freelance Web Developer / Consultant',
                'date_range_en' => '2021 — July 2025',
                'company_en' => 'DT-DEV — Freelance',
                'location_en' => 'Remote',
                'tasks_en' => [
                    'Requirements analysis and design of solutions tailored to business needs',
                    'Design and development of web applications and REST APIs',
                    'Development of solutions in the finance, education, and management domains',
                    'Setup and maintenance of databases and backend services',
                    'Testing, deployment, and maintenance of applications',
                    'Improvement of performance, reliability, and security of solutions',
                    'User support and technical assistance',
                    'Training and knowledge transfer to users and client teams',
                ],
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        $certifications = [
            ['icon' => '☁️', 'title' => 'Introduction to Cloud Computing', 'issuer' => 'IBM', 'date' => 'Avril 2026', 'date_en' => 'April 2026', 'verification_link' => null, 'sort_order' => 1],
            ['icon' => '⚙️', 'title' => 'Introduction to DevOps', 'issuer' => 'IBM', 'date' => 'Mars 2026', 'date_en' => 'March 2026', 'verification_link' => null, 'sort_order' => 2],
            ['icon' => '🐧', 'title' => 'Hands-on Introduction to Linux Commands and Shell Scripting', 'issuer' => 'IBM', 'date' => 'Avril 2026', 'date_en' => 'April 2026', 'verification_link' => null, 'sort_order' => 3],
            ['icon' => '🐳', 'title' => 'Introduction to Containers with Docker, Kubernetes & OpenShift', 'issuer' => 'IBM', 'date' => '2026', 'date_en' => '2026', 'verification_link' => null, 'sort_order' => 4],
            ['icon' => '🔄', 'title' => 'Introduction to Agile Development and Scrum', 'issuer' => 'IBM', 'date' => '2025', 'date_en' => '2025', 'verification_link' => null, 'sort_order' => 5],
            ['icon' => '📊', 'title' => 'Google Data Analytics', 'issuer' => 'Google', 'date' => '2026', 'date_en' => '2026', 'verification_link' => null, 'sort_order' => 6],
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
