<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
  $seoName = $settings['hero_name'] ?? 'MAMBAFEI Tanguy Pouwedeou';
  $seoRole = $settings['hero_role'] ?? 'Ingénieur Logiciel Fullstack';
  $seoDesc = "Portfolio de {$seoName} — {$seoRole}. Laravel, Spring Boot, React Native. Ouvert aux opportunités.";
  $seoUrl = url('/');
  $seoPhoto = ($settings['hero_photo'] ?? '') ? asset('storage/' . $settings['hero_photo']) : asset('images/profile.jpg');
@endphp
<title>{{ $seoName }} — {{ $seoRole }}</title>
<meta name="description" content="{{ $seoDesc }}">
<meta name="keywords" content="développeur fullstack, ingénieur logiciel, Laravel, Spring Boot, React Native, PHP, Java, freelance, Lomé, Togo, portfolio">
<meta name="author" content="{{ $seoName }}">
<meta name="theme-color" content="#0a0e1a">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $seoUrl }}">
<link rel="alternate" hreflang="fr" href="{{ $seoUrl }}">
<link rel="alternate" hreflang="en" href="{{ $seoUrl }}">
<link rel="alternate" hreflang="x-default" href="{{ $seoUrl }}">
<meta property="og:title" content="{{ $seoName }} — {{ $seoRole }}">
<meta property="og:description" content="{{ $seoDesc }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $seoUrl }}">
<meta property="og:image" content="{{ $seoPhoto }}">
<meta property="og:locale" content="fr_FR">
<meta property="og:locale:alternate" content="en_US">
<meta property="og:site_name" content="TANGUYDEV">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoName }} — {{ $seoRole }}">
<meta name="twitter:description" content="{{ $seoDesc }}">
<meta name="twitter:image" content="{{ $seoPhoto }}">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='12' fill='%231a1a2e'/><text y='72' x='50' text-anchor='middle' font-size='55' font-family='Arial' font-weight='bold' fill='%2300d4ff'>TM</text></svg>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Instrument+Sans:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "name": "TANGUYDEV",
      "url": "{{ $seoUrl }}",
      "description": "{{ $seoDesc }}",
      "inLanguage": ["fr", "en"]
    },
    {
      "@type": "Person",
      "name": "{{ $seoName }}",
      "url": "{{ $seoUrl }}",
      "image": "{{ $seoPhoto }}",
      "jobTitle": "{{ $seoRole }}",
      "worksFor": {
        "@type": "Organization",
        "name": "ITVOG"
      },
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Lomé",
        "addressCountry": "TG"
      },
      "knowsAbout": ["Laravel", "Spring Boot", "React Native", "PHP", "Java", "REST API", "Microservices", "DDD"],
      "sameAs": [
        @if($contactInfos->where('link', '!=', null)->count() > 0)
          @foreach($contactInfos->filter(fn($ci) => $ci->link && str_starts_with($ci->link, 'http')) as $ci)
            "{{ $ci->link }}"@if(!$loop->last),@endif
          @endforeach
        @endif
      ]
    }
  ]
}
</script>
<style>
:root {
  --bg: #0a0e1a;
  --bg2: #0f1525;
  --bg3: #151d35;
  --surface: #1a2340;
  --border: rgba(255,255,255,0.08);
  --teal: #00d4ff;
  --teal2: #00a8cc;
  --accent: #ff6b35;
  --text: #e8edf5;
  --text2: #8892a4;
  --text3: #5a6478;
  --card: rgba(26, 35, 64, 0.8);
  --glow: rgba(0, 212, 255, 0.15);
}

[data-theme="light"] {
  --bg: #f5f7ff;
  --bg2: #eef1fa;
  --bg3: #e4e9f5;
  --surface: #ffffff;
  --border: rgba(0,0,0,0.08);
  --teal: #0077b6;
  --teal2: #005f8e;
  --accent: #e85d04;
  --text: #0f1525;
  --text2: #4a5568;
  --text3: #8892a4;
  --card: rgba(255,255,255,0.9);
  --glow: rgba(0,119,182,0.1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {
  font-family: 'Instrument Sans', sans-serif;
  background: var(--bg);
  color: var(--text);
  line-height: 1.6;
  transition: background 0.3s, color 0.3s;
  overflow-x: hidden;
}

/* ── NOISE TEXTURE ── */
body::before {
  content: '';
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
  pointer-events: none;
  z-index: 0;
  opacity: 0.4;
}

/* ── NAVBAR ── */
nav {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 100;
  padding: 16px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: rgba(10, 14, 26, 0.85);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
  transition: background 0.3s;
}

[data-theme="light"] nav {
  background: rgba(245, 247, 255, 0.85);
}

.nav-logo {
  font-family: 'Syne', sans-serif;
  font-weight: 800;
  font-size: 18px;
  color: var(--teal);
  letter-spacing: -0.5px;
}

.nav-links {
  display: flex;
  gap: 32px;
  list-style: none;
  align-items: center;
}

.nav-links a {
  font-size: 13px;
  font-weight: 500;
  color: var(--text2);
  text-decoration: none;
  letter-spacing: 0.5px;
  transition: color 0.2s;
}

.nav-links a:hover { color: var(--teal); }

.theme-toggle {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 50px;
  padding: 6px 14px;
  cursor: pointer;
  font-size: 13px;
  color: var(--text2);
  display: flex;
  align-items: center;
  gap: 6px;
  transition: all 0.2s;
}

.theme-toggle:hover { border-color: var(--teal); color: var(--teal); }

/* ── HERO ── */
#hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding: 100px 80px 60px;
  position: relative;
  overflow: hidden;
}

.hero-bg {
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 80% 60% at 70% 50%, rgba(0,212,255,0.06) 0%, transparent 70%),
              radial-gradient(ellipse 40% 40% at 20% 80%, rgba(255,107,53,0.05) 0%, transparent 60%);
  pointer-events: none;
}

[data-theme="light"] .hero-bg {
  background: radial-gradient(ellipse 80% 60% at 70% 50%, rgba(0,119,182,0.06) 0%, transparent 70%),
              radial-gradient(ellipse 40% 40% at 20% 80%, rgba(232,93,4,0.04) 0%, transparent 60%);
}

.hero-grid {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 80px;
  align-items: center;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(0,212,255,0.1);
  border: 1px solid rgba(0,212,255,0.2);
  border-radius: 50px;
  padding: 6px 14px;
  font-size: 12px;
  font-family: 'JetBrains Mono', monospace;
  color: var(--teal);
  margin-bottom: 24px;
  animation: fadeInUp 0.6s ease both;
}

.hero-tag::before {
  content: '';
  width: 6px; height: 6px;
  background: var(--teal);
  border-radius: 50%;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.5; transform: scale(0.8); }
}

.hero-name {
  font-family: 'Syne', sans-serif;
  font-size: clamp(36px, 5vw, 64px);
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -2px;
  color: var(--text);
  animation: fadeInUp 0.6s 0.1s ease both;
}

.hero-name span { color: var(--teal); }

.hero-title {
  font-family: 'Syne', sans-serif;
  font-size: clamp(16px, 2vw, 22px);
  font-weight: 500;
  color: var(--text2);
  margin: 12px 0 20px;
  animation: fadeInUp 0.6s 0.2s ease both;
}

.hero-desc {
  font-size: 15px;
  color: var(--text2);
  max-width: 500px;
  line-height: 1.7;
  margin-bottom: 36px;
  animation: fadeInUp 0.6s 0.3s ease both;
}

.hero-cta {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
  animation: fadeInUp 0.6s 0.4s ease both;
}

.btn-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--teal);
  color: #0a0e1a;
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 14px;
  text-decoration: none;
  transition: all 0.2s;
  border: none;
  cursor: pointer;
}

.btn-primary:hover {
  background: var(--teal2);
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(0,212,255,0.3);
}

.btn-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: transparent;
  color: var(--text);
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 500;
  font-size: 14px;
  text-decoration: none;
  border: 1px solid var(--border);
  transition: all 0.2s;
}

.btn-secondary:hover {
  border-color: var(--teal);
  color: var(--teal);
  transform: translateY(-2px);
}

/* Hero photo */
.hero-photo-wrap {
  position: relative;
  animation: fadeInRight 0.8s 0.2s ease both;
}

.hero-photo-wrap::before {
  content: '';
  position: absolute;
  inset: -3px;
  border-radius: 24px;
  background: linear-gradient(135deg, var(--teal), transparent 60%, var(--accent));
  z-index: 0;
}

.hero-photo {
  width: 100%;
  aspect-ratio: 3 / 4;
  object-fit: cover;
  object-position: center top;
  border-radius: 22px;
  position: relative;
  z-index: 1;
  display: block;
}

.hero-stats {
  display: flex;
  gap: 32px;
  margin-top: 36px;
  animation: fadeInUp 0.6s 0.5s ease both;
}

.stat { text-align: center; }
.stat-num {
  font-family: 'Syne', sans-serif;
  font-size: 28px;
  font-weight: 800;
  color: var(--teal);
  line-height: 1;
}
.stat-label { font-size: 11px; color: var(--text3); margin-top: 4px; letter-spacing: 0.5px; }

/* ── SECTIONS ── */
section {
  padding: 100px 80px;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

.section-label {
  font-family: 'JetBrains Mono', monospace;
  font-size: 11px;
  color: var(--teal);
  letter-spacing: 3px;
  text-transform: uppercase;
  margin-bottom: 12px;
}

.section-title {
  font-family: 'Syne', sans-serif;
  font-size: clamp(28px, 4vw, 44px);
  font-weight: 800;
  letter-spacing: -1px;
  color: var(--text);
  margin-bottom: 48px;
  line-height: 1.1;
}

/* ── SKILLS ── */
.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 16px;
}

.skill-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 20px;
  backdrop-filter: blur(10px);
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
}

.skill-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, var(--teal), transparent);
  opacity: 0;
  transition: opacity 0.3s;
}

.skill-card:hover { border-color: rgba(0,212,255,0.3); transform: translateY(-3px); box-shadow: 0 12px 32px var(--glow); }
.skill-card:hover::before { opacity: 1; }

.skill-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.skill-name { font-weight: 600; font-size: 14px; color: var(--text); }
.skill-pct {
  font-family: 'JetBrains Mono', monospace;
  font-size: 13px;
  color: var(--teal);
  font-weight: 500;
}

.skill-bar {
  height: 4px;
  background: var(--border);
  border-radius: 2px;
  overflow: hidden;
}

.skill-fill {
  height: 100%;
  background: linear-gradient(90deg, var(--teal), var(--teal2));
  border-radius: 2px;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
}

.skill-fill.animated { transform: scaleX(1); }

.skill-category {
  font-size: 10px;
  color: var(--text3);
  font-family: 'JetBrains Mono', monospace;
  margin-top: 8px;
  letter-spacing: 0.5px;
}

/* ── PROJECTS ── */
.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
  gap: 24px;
}

.project-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 28px;
  backdrop-filter: blur(10px);
  transition: all 0.3s;
  display: flex;
  flex-direction: column;
  gap: 14px;
  position: relative;
  overflow: hidden;
}

.project-card::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--teal), var(--accent));
  transform: scaleX(0);
  transition: transform 0.3s;
}

.project-card:hover { border-color: rgba(0,212,255,0.25); transform: translateY(-4px); box-shadow: 0 20px 48px var(--glow); }
.project-card:hover::after { transform: scaleX(1); }

.project-icon {
  width: 44px; height: 44px;
  background: rgba(0,212,255,0.1);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  border: 1px solid rgba(0,212,255,0.2);
}

.project-name {
  font-family: 'Syne', sans-serif;
  font-size: 18px;
  margin: 0;
  font-weight: 700;
  color: var(--text);
}

.project-desc {
  font-size: 13.5px;
  color: var(--text2);
  line-height: 1.6;
  flex: 1;
}

.project-tags { display: flex; flex-wrap: wrap; gap: 6px; }

.tag {
  font-size: 11px;
  font-family: 'JetBrains Mono', monospace;
  background: rgba(0,212,255,0.08);
  color: var(--teal);
  border: 1px solid rgba(0,212,255,0.15);
  padding: 3px 10px;
  border-radius: 4px;
}

.project-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: var(--teal);
  text-decoration: none;
  font-weight: 500;
  transition: gap 0.2s;
}
.project-link:hover { gap: 10px; }

/* ── EXPERIENCE ── */
.timeline {
  position: relative;
  padding-left: 32px;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 0; top: 8px; bottom: 0;
  width: 1px;
  background: linear-gradient(to bottom, var(--teal), transparent);
}

.timeline-item {
  position: relative;
  margin-bottom: 48px;
  animation: fadeInLeft 0.6s ease both;
}

.timeline-item::before {
  content: '';
  position: absolute;
  left: -36px; top: 6px;
  width: 10px; height: 10px;
  border-radius: 50%;
  background: var(--teal);
  box-shadow: 0 0 0 3px rgba(0,212,255,0.2);
}

.timeline-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 6px;
}

.timeline-title {
  font-family: 'Syne', sans-serif;
  font-size: 19px;
  margin: 0;
  font-weight: 700;
  color: var(--text);
}

.timeline-date {
  font-family: 'JetBrains Mono', monospace;
  font-size: 12px;
  color: var(--teal);
  background: rgba(0,212,255,0.1);
  padding: 4px 12px;
  border-radius: 50px;
  border: 1px solid rgba(0,212,255,0.2);
}

.timeline-company {
  font-size: 14px;
  font-weight: 600;
  color: var(--teal2);
  margin-bottom: 12px;
}

.timeline-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 14px; }

.timeline-bullets {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 7px;
}

.timeline-bullets li {
  font-size: 14px;
  color: var(--text2);
  padding-left: 16px;
  position: relative;
  line-height: 1.5;
}

.timeline-bullets li::before {
  content: '→';
  position: absolute;
  left: 0;
  color: var(--teal);
  font-size: 12px;
}

/* ── CERTIFICATIONS ── */
.certs-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 16px;
}

.cert-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 22px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  transition: all 0.3s;
  backdrop-filter: blur(10px);
}

.cert-card:hover { border-color: rgba(0,212,255,0.3); transform: translateY(-2px); }

.cert-badge {
  width: 36px; height: 36px;
  background: rgba(0,212,255,0.1);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
  border: 1px solid rgba(0,212,255,0.2);
  margin-bottom: 4px;
}

.cert-name {
  font-family: 'Syne', sans-serif;
  font-size: 15px;
  margin: 0;
  font-weight: 700;
  color: var(--text);
}

.cert-org { font-size: 12px; color: var(--text3); }
.cert-date { font-size: 12px; color: var(--teal); font-family: 'JetBrains Mono', monospace; }

.cert-link {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-size: 12px;
  color: var(--teal);
  text-decoration: none;
  margin-top: 4px;
  font-weight: 500;
}

/* ── CONTACT ── */
#contact {
  padding: 100px 80px;
  position: relative;
  z-index: 1;
}

.contact-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: start;
}

.contact-info { display: flex; flex-direction: column; gap: 20px; }

.contact-item {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 16px 20px;
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 12px;
  text-decoration: none;
  color: var(--text);
  transition: all 0.2s;
}

.contact-item:hover { border-color: var(--teal); color: var(--teal); transform: translateX(4px); }

.contact-icon {
  width: 40px; height: 40px;
  background: rgba(0,212,255,0.1);
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.contact-text { font-size: 13px; }
.contact-label { font-size: 10px; color: var(--text3); font-family: 'JetBrains Mono', monospace; letter-spacing: 1px; }

/* ── FORM ── */
.contact-form { display: flex; flex-direction: column; gap: 16px; }

.form-group { display: flex; flex-direction: column; gap: 6px; }

.form-label {
  font-size: 12px;
  font-family: 'JetBrains Mono', monospace;
  color: var(--text3);
  letter-spacing: 1px;
}

.form-input, .form-textarea {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: 12px 16px;
  color: var(--text);
  font-family: 'Instrument Sans', sans-serif;
  font-size: 14px;
  transition: border-color 0.2s;
  outline: none;
  resize: none;
}

.form-input:focus, .form-textarea:focus { border-color: var(--teal); box-shadow: 0 0 0 3px var(--glow); }
.form-textarea { min-height: 120px; }

.form-submit {
  background: var(--teal);
  color: #0a0e1a;
  border: none;
  border-radius: 8px;
  padding: 14px 28px;
  font-weight: 700;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-family: 'Instrument Sans', sans-serif;
}

.form-submit:hover { background: var(--teal2); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,212,255,0.3); }

/* ── FOOTER ── */
footer {
  text-align: center;
  padding: 32px;
  border-top: 1px solid var(--border);
  font-size: 12px;
  color: var(--text3);
  font-family: 'JetBrains Mono', monospace;
  position: relative;
  z-index: 1;
}

/* ── ANIMATIONS ── */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInRight {
  from { opacity: 0; transform: translateX(30px); }
  to { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInLeft {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}

.reveal {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 0.7s ease, transform 0.7s ease;
}

.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ── SCROLLBAR ── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb { background: var(--surface); border-radius: 3px; }
::-webkit-scrollbar-thumb:hover { background: var(--teal); }

/* ── ABOUT LAYOUT ── */
.about-section { padding: 80px 80px 0; }
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
}

/* ── BURGER MENU ── */
.nav-burger {
  display: none;
  background: none;
  border: 1px solid var(--border);
  color: var(--text);
  border-radius: 8px;
  padding: 6px 12px;
  font-size: 18px;
  cursor: pointer;
  line-height: 1;
}

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  nav { padding: 14px 16px; }
  .nav-burger { display: block; }
  .nav-links {
    display: none;
    position: fixed;
    top: 57px;
    left: 0; right: 0;
    flex-direction: column;
    align-items: stretch;
    gap: 0;
    background: var(--bg);
    border-bottom: 1px solid var(--border);
    padding: 8px 24px 16px;
    z-index: 99;
  }
  .nav-links.open { display: flex; }
  .nav-links li { border-bottom: 1px solid var(--border); }
  .nav-links li:last-child { border-bottom: none; }
  .nav-links a { display: block; padding: 14px 0; font-size: 15px; }
  .theme-toggle { padding: 6px 10px; font-size: 11px; }
  #hero { padding: 100px 24px 60px; }
  .hero-name { font-size: clamp(28px, 8.5vw, 36px); letter-spacing: -1px; }
  .hero-grid { grid-template-columns: 1fr; gap: 40px; }
  .hero-photo-wrap { max-width: 280px; margin: 0 auto; }
  .hero-stats { flex-wrap: wrap; gap: 24px; }
  section { padding: 60px 24px; }
  .about-section { padding: 60px 24px 0; }
  .about-grid { grid-template-columns: 1fr; gap: 40px; }
  .projects-grid { grid-template-columns: 1fr; }
  #contact { padding: 60px 24px; }
  .contact-inner { grid-template-columns: 1fr; gap: 40px; }
}
</style>
</head>
<body>

<!-- ── NAVBAR ── -->
<nav>
  <div class="nav-logo">TANGUYDEV<span style="color:var(--text2);">.</span></div>
  <ul class="nav-links">
    <li><a href="#hero" id="nav-home">Accueil</a></li>
    <li><a href="#about" id="nav-about">À propos</a></li>
    <li><a href="#skills" id="nav-skills">Compétences</a></li>
    <li><a href="#projects" id="nav-projects">Projets</a></li>
    <li><a href="#experience" id="nav-experience">Expérience</a></li>
    <li><a href="#certifications" id="nav-certifications">Certifications</a></li>
    <li><a href="#contact" id="nav-contact">Contact</a></li>
  </ul>
  <div style="display:flex;gap:8px;align-items:center;">
    <button class="theme-toggle" id="langBtn" style="border-color:var(--teal);color:var(--teal);">
      🌐 English
    </button>
    <button class="theme-toggle" onclick="toggleTheme()" id="themeBtn">
      <span id="themeIcon">☀️</span> Mode clair
    </button>
    <button class="nav-burger" id="navBurger" aria-label="Menu" aria-expanded="false" onclick="toggleMenu()">☰</button>
  </div>
</nav>

<!-- ── HERO ── -->
<main>
<section id="hero">
  <div class="hero-bg"></div>
  <div class="hero-grid">
    <div>
      <div class="hero-tag" id="hero-tag">{{ $settings['hero_badge'] ?? 'Disponible · Ouvert aux opportunités' }}</div>
      @php
        $nameParts = explode(' ', $settings['hero_name'] ?? 'Manoela Hardy Rakotonarivo');
        $first = $nameParts[0] ?? '';
        $middle = $nameParts[1] ?? '';
        $last = implode(' ', array_slice($nameParts, 2));
      @endphp
      <h1 class="hero-name">{{ $first }}<br><span>{{ $middle }}</span><br>{{ $last }}</h1>
      <p class="hero-title" id="hero-title">{{ $settings['hero_role'] ?? 'Développeur Full-Stack' }}</p>
      <p class="hero-desc" id="hero-desc">
        {{ $settings['hero_description'] ?? '' }}
      </p>
      <div class="hero-cta">
        <a href="#projects" class="btn-primary" id="hero-cta1">Voir mes projets →</a>
        <a href="#contact" class="btn-secondary" id="hero-cta2">Me contacter</a>
        <a href="{{ ($settings['cv_file'] ?? '') ? asset('storage/' . $settings['cv_file']) : '#' }}" download class="btn-secondary" id="hero-cv" style="border-color:var(--accent);color:var(--accent);{{ ($settings['cv_file'] ?? '') ? '' : 'display:none;' }}">⬇ Télécharger CV</a>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <div class="stat-num" id="stat-num-1">{{ $settings['stat_num_exp'] ?? '2+' }}</div>
          <div class="stat-label">{{ $settings['stat_exp'] ?? "ANS D'EXP." }}</div>
        </div>
        <div class="stat">
          <div class="stat-num" id="stat-num-2">{{ $settings['stat_num_projects'] ?? $projects->count() }}</div>
          <div class="stat-label">{{ $settings['stat_projects'] ?? 'PROJETS' }}</div>
        </div>
        <div class="stat">
          <div class="stat-num" id="stat-num-3">{{ $settings['stat_num_pro_exp'] ?? $experiences->count() }}</div>
          <div class="stat-label">{{ $settings['stat_pro_exp'] ?? 'EXP. PRO.' }}</div>
        </div>
        <div class="stat">
          <div class="stat-num" id="stat-num-4">{{ $settings['stat_num_certs'] ?? $certifications->count() }}</div>
          <div class="stat-label">{{ $settings['stat_certs'] ?? 'CERTIFS' }}</div>
        </div>
        <div class="stat">
          <div class="stat-num" id="stat-num-5">{{ $settings['stat_num_techs'] ?? $skills->count() . '+' }}</div>
          <div class="stat-label">{{ $settings['stat_techs'] ?? 'TECHNOS' }}</div>
        </div>
      </div>
    </div>
    <div class="hero-photo-wrap">
      <img src="{{ ($settings['hero_photo'] ?? '') ? asset('storage/' . $settings['hero_photo']) : asset('images/profile.jpg') }}" alt="Photo de {{ $settings['hero_name'] ?? 'MAMBAFEI Tanguy' }}, {{ $settings['hero_role'] ?? 'Ingénieur Logiciel Fullstack' }}" class="hero-photo">
    </div>
  </div>
</section>

<!-- ── ABOUT ── -->
<section id="about" class="about-section" style="background:var(--bg2); max-width:100%; padding: 100px 80px;">
  <div style="max-width:1200px;margin:0 auto;">
    <div class="about-grid">
      <div class="reveal">
        <p class="section-label" id="about-label">// à propos</p>
        <h2 class="section-title" id="about-title" style="margin-bottom:20px;">Pourquoi je code</h2>
        <p style="font-size:15px;color:var(--text2);line-height:1.8;margin-bottom:16px;">
          <span id="about-p1">{!! $settings['about_text_1'] ?? '' !!}</span>
        </p>
        <p style="font-size:15px;color:var(--text2);line-height:1.8;margin-bottom:16px;">
          <span id="about-p2">{!! $settings['about_text_2'] ?? '' !!}</span>
        </p>
        <p style="font-size:15px;color:var(--text2);line-height:1.8;">
          <span id="about-p3">{!! $settings['about_text_3'] ?? '' !!}</span>
        </p>
      </div>
      <div class="reveal" style="display:flex;flex-direction:column;gap:16px;">
        @foreach($aboutValues as $i => $value)
        <div style="background:var(--card);border:1px solid var(--border);border-radius:12px;padding:20px;display:flex;gap:16px;align-items:center;backdrop-filter:blur(10px);">
          <div style="font-size:28px;">{{ $value->icon }}</div>
          <div>
            <div id="about-card{{ $i+1 }}-title" style="font-weight:700;font-family:'Syne',sans-serif;color:var(--text);margin-bottom:4px;">{{ $value->title }}</div>
            <div id="about-card{{ $i+1 }}-desc" style="font-size:13px;color:var(--text2);">{{ $value->description }}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ── EXPERIENCE ── -->
<section id="experience">
  <p class="section-label" id="exp-label">// expérience</p>
  <h2 class="section-title reveal" id="exp-title">Parcours professionnel</h2>
  <div class="timeline">
    @foreach($experiences as $exp)
    <div class="timeline-item reveal">
      <div class="timeline-header">
        <h3 class="timeline-title" id="exp-{{ $loop->iteration }}-title">{{ $exp->title }}</h3>
        <div class="timeline-date" id="exp-{{ $loop->iteration }}-date">{{ $exp->date_range }}</div>
      </div>
      <div class="timeline-company" id="exp-{{ $loop->iteration }}-company">{{ $exp->company }}{{ $exp->location ? ' · ' . $exp->location : '' }}</div>
      @if($exp->tags)
      <div class="timeline-tags">
        @foreach($exp->tags as $tag)
        <span class="tag">{{ $tag }}</span>
        @endforeach
      </div>
      @endif
      @if($exp->tasks)
      <ul class="timeline-bullets" id="exp-{{ $loop->iteration }}-tasks">
        @foreach($exp->tasks as $task)
        <li>{!! $task !!}</li>
        @endforeach
      </ul>
      @endif
    </div>
    @endforeach
  </div>
</section>

<!-- ── PROJECTS ── -->
<section id="projects" style="background:var(--bg2); max-width:100%; padding: 100px 80px;">
  <div style="max-width:1200px;margin:0 auto;">
    <p class="section-label" id="projects-label">// projets</p>
    <h2 class="section-title reveal" id="projects-title">Ce que j'ai construit</h2>
    <div class="projects-grid">
      @foreach($projects as $project)
      <div class="project-card reveal"@if($project->type === 'PROFESSIONNEL') style="border-left-color:var(--accent);grid-column:1/-1;"@endif>
        @if($project->type === 'PROFESSIONNEL')
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:8px;">
          <div style="display:flex;gap:12px;align-items:center;">
            <div class="project-icon" style="background:rgba(255,107,53,0.1);border-color:rgba(255,107,53,0.3);">{{ $project->icon }}</div>
            <div>
              <div style="display:flex;align-items:center;gap:8px;">
                <h3 class="project-name" id="project-{{ $loop->iteration }}-name">{{ $project->title }}</h3>
                <span id="project-{{ $loop->iteration }}-type" style="font-size:10px;background:rgba(255,107,53,0.15);color:var(--accent);border:1px solid rgba(255,107,53,0.3);padding:2px 8px;border-radius:4px;font-family:'JetBrains Mono',monospace;">{{ $project->type }}</span>
              </div>
              @if($project->client)
              <div id="project-{{ $loop->iteration }}-client" style="font-size:12px;color:var(--teal);margin-top:2px;">{{ $project->client }}</div>
              @endif
            </div>
          </div>
        </div>
        @else
        <div class="project-icon">{{ $project->icon }}</div>
        <h3 class="project-name" id="project-{{ $loop->iteration }}-name">{{ $project->title }}</h3>
        @endif
        <p class="project-desc" id="project-{{ $loop->iteration }}-desc">{{ $project->description }}</p>
        <div class="project-tags">
          @foreach($project->tags ?? [] as $tag)
          <span class="tag">{{ $tag }}</span>
          @endforeach
        </div>
        @if($project->link)
        <a href="{{ $project->link }}" target="_blank" class="project-link">{{ $project->link_label ?? 'Voir sur GitHub →' }}</a>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ── SKILLS ── -->
<section id="skills">
  <p class="section-label" id="skills-label">// compétences</p>
  <h2 class="section-title reveal" id="skills-title">Stack technique</h2>
  <div class="skills-grid">
    @foreach($skills as $skill)
    <div class="skill-card reveal">
      <div class="skill-header"><span class="skill-name" id="skill-{{ $loop->iteration }}-name">{{ $skill->name }}</span></div>
      <div class="skill-category" id="skill-{{ $loop->iteration }}-cat">{{ $skill->category }}</div>
    </div>
    @endforeach
  </div>
</section>

<!-- ── CERTIFICATIONS ── -->
<section id="certifications" style="background:var(--bg2); max-width:100%; padding: 100px 80px;">
  <div style="max-width:1200px;margin:0 auto;">
    <p class="section-label" id="cert-label">// certifications</p>
    <h2 class="section-title reveal" id="cert-title">Certifications</h2>
    <div class="certs-grid">
      @foreach($certifications as $cert)
      <div class="cert-card reveal">
        <div class="cert-badge">{{ $cert->icon }}</div>
        <h3 class="cert-name" id="cert-{{ $loop->iteration }}-name">{{ $cert->title }}</h3>
        <div class="cert-org" id="cert-{{ $loop->iteration }}-org">{{ $cert->issuer }}</div>
        <div class="cert-date" id="cert-{{ $loop->iteration }}-date">{{ $cert->date ?? '—' }}</div>
        @if($cert->verification_link)
        <a href="{{ $cert->verification_link }}" target="_blank" class="cert-link">↗ Vérifier le certificat</a>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ── CONTACT ── -->
<section id="contact">
  <div class="contact-inner">
    <div>
      <p class="section-label" id="contact-label">// contact</p>
      <h2 class="section-title reveal" id="contact-title" style="margin-bottom:24px;">Travaillons<br>ensemble.</h2>
      <p id="contact-desc" style="font-size:14px;color:var(--text2);margin-bottom:32px;line-height:1.7;">
        Ouvert à de nouvelles opportunités — que ce soit un poste full-time, du freelance ou une collaboration sur un projet ambitieux.
      </p>
      <div class="contact-info">
        @foreach($contactInfos as $info)
        <a href="{{ $info->link }}" @if(str_starts_with($info->link ?? '', 'http')) target="_blank" @endif class="contact-item">
          <div class="contact-icon">{{ $info->icon }}</div>
          <div>
            <div class="contact-label" id="contact-{{ $loop->iteration }}-label">{{ $info->label }}</div>
            <div class="contact-text" id="contact-{{ $loop->iteration }}-value">{{ $info->value }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>

    <form class="contact-form reveal" id="contactForm">
      @csrf
      <div class="form-group">
        <label class="form-label" id="form-name" for="field-name">NOM</label>
        <input type="text" name="name" id="field-name" class="form-input" placeholder="Votre nom" required>
      </div>
      <div class="form-group">
        <label class="form-label" id="form-email-label" for="field-email">EMAIL</label>
        <input type="email" name="email" id="field-email" class="form-input" placeholder="votre@email.com" required>
      </div>
      <div class="form-group">
        <label class="form-label" id="form-subject-label" for="form-subject-input">SUJET</label>
        <input type="text" name="subject" class="form-input" id="form-subject-input" placeholder="Opportunité / Projet / Collaboration">
      </div>
      <div class="form-group">
        <label class="form-label" id="form-message-label" for="form-message-input">MESSAGE</label>
        <textarea name="message" class="form-textarea" id="form-message-input" placeholder="Décrivez votre projet ou opportunité..." required></textarea>
      </div>
      <button type="submit" class="form-submit" id="form-send-btn">
        <span>Envoyer le message</span> <span>→</span>
      </button>
      <div id="formMsg" style="display:none;font-size:13px;color:var(--teal);margin-top:8px;font-family:'JetBrains Mono',monospace;"></div>
    </form>
  </div>
</section>
</main>

<!-- ── FOOTER ── -->
<footer>
  <span style="color:var(--teal)">TANGUYDEV</span> · {{ $settings['hero_name'] ?? 'MAMBAFEI Tanguy Pouwedeou' }} · <span id="footer-text">{{ $settings['footer_text'] ?? 'Construit avec passion depuis Lome' }}</span>
</footer>

<script>
// Burger menu toggle
function toggleMenu() {
  const links = document.querySelector('.nav-links');
  const burger = document.getElementById('navBurger');
  const open = links.classList.toggle('open');
  burger.setAttribute('aria-expanded', open);
  burger.textContent = open ? '✕' : '☰';
}
document.querySelectorAll('.nav-links a').forEach(a => a.addEventListener('click', () => {
  const links = document.querySelector('.nav-links');
  if (links.classList.contains('open')) toggleMenu();
}));

// Theme toggle
function toggleTheme() {
  const html = document.documentElement;
  const btn = document.getElementById('themeBtn');
  if (html.getAttribute('data-theme') === 'dark') {
    html.setAttribute('data-theme', 'light');
    btn.innerHTML = '<span id="themeIcon">🌙</span> Mode sombre';
    localStorage.setItem('theme', 'light');
  } else {
    html.setAttribute('data-theme', 'dark');
    btn.innerHTML = '<span id="themeIcon">☀️</span> Mode clair';
    localStorage.setItem('theme', 'dark');
  }
}

// Restore saved theme
(function() {
  const saved = localStorage.getItem('theme');
  if (saved === 'light') {
    document.documentElement.setAttribute('data-theme', 'light');
    const btn = document.getElementById('themeBtn');
    if (btn) btn.innerHTML = '<span id="themeIcon">🌙</span> Mode sombre';
  }
})();

// Scroll reveal
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      const fills = entry.target.querySelectorAll('.skill-fill');
      fills.forEach(fill => fill.classList.add('animated'));
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Skill bar animation
const skillsSection = document.getElementById('skills');
if (skillsSection) {
  const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        document.querySelectorAll('.skill-fill').forEach(fill => {
          fill.classList.add('animated');
        });
      }
    });
  }, { threshold: 0.2 });
  skillObserver.observe(skillsSection);
}

// Contact form
document.getElementById('contactForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const btn = document.getElementById('form-send-btn');
  const msg = document.getElementById('formMsg');
  const form = this;

  btn.innerHTML = '<span>Envoi en cours...</span>';
  btn.disabled = true;
  msg.style.display = 'none';

  fetch('{{ route("contact.send") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
      'Accept': 'application/json'
    },
    body: JSON.stringify({
      name: form.querySelector('input[name="name"]').value,
      email: form.querySelector('input[name="email"]').value,
      subject: form.querySelector('input[name="subject"]').value,
      message: form.querySelector('textarea[name="message"]').value
    })
  })
  .then(r => r.json())
  .then(data => {
    btn.innerHTML = '<span>✓ Message envoyé !</span>';
    msg.style.display = 'block';
    msg.style.color = 'var(--teal)';
    msg.textContent = '// Merci ! Je vous répondrai dans les plus brefs délais.';
    form.reset();
    setTimeout(() => {
      btn.innerHTML = '<span>Envoyer le message</span> <span>→</span>';
      btn.disabled = false;
      msg.style.display = 'none';
    }, 5000);
  })
  .catch(() => {
    btn.innerHTML = '<span>Envoyer le message</span> <span>→</span>';
    btn.disabled = false;
    msg.style.display = 'block';
    msg.style.color = 'var(--accent)';
    msg.textContent = '// Erreur : Veuillez réessayer.';
  });
});

// Active nav link on scroll
const sections = document.querySelectorAll('section[id], div[id]');
const navLinks = document.querySelectorAll('.nav-links a');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(section => {
    if (window.scrollY >= section.offsetTop - 100) current = section.id;
  });
  navLinks.forEach(link => {
    link.style.color = link.getAttribute('href') === '#' + current ? 'var(--teal)' : '';
  });
});

// ── i18n translations (fully dynamic from server) ──
const translations = @json($translations);

let currentLang = 'fr';

function toggleLang() {
  currentLang = currentLang === 'fr' ? 'en' : 'fr';
  applyTranslations();
}

function applyTranslations() {
  const t = translations[currentLang];
  if (!t) return;
  const set = (id, text) => { const el = document.getElementById(id); if(el) el.textContent = text; };
  const setHTML = (id, val) => { const el = document.getElementById(id); if(el) el.innerHTML = val; };
  const setAttr = (id, attr, val) => { const el = document.getElementById(id); if(el) el[attr] = val; };

  // Lang button
  set('langBtn', t.lang_btn);

  // Nav links
  set('nav-home', t.nav_home); set('nav-about', t.nav_about);
  set('nav-skills', t.nav_skills); set('nav-projects', t.nav_projects);
  set('nav-experience', t.nav_experience); set('nav-certifications', t.nav_certifications);
  set('nav-contact', t.nav_contact);

  // Hero
  set('hero-tag', t.hero_tag); set('hero-title', t.hero_title); set('hero-desc', t.hero_desc);
  set('hero-cta1', t.hero_cta1); set('hero-cta2', t.hero_cta2); set('hero-cv', t.hero_cv);
  const stats = document.querySelectorAll('.stat-label');
  ['stat1','stat2','stat3','stat4','stat5'].forEach((k,i) => { if(stats[i] && t[k]) stats[i].textContent = t[k]; });

  // About
  set('about-label', t.about_label); set('about-title', t.about_title);
  setHTML('about-p1', t.about_p1); setHTML('about-p2', t.about_p2); setHTML('about-p3', t.about_p3);

  // About cards
  if (t.about_cards) {
    t.about_cards.forEach((card, i) => {
      set('about-card'+(i+1)+'-title', card.title);
      set('about-card'+(i+1)+'-desc', card.desc);
    });
  }

  // Projects
  set('projects-label', t.projects_label); set('projects-title', t.projects_title);
  if (t.projects) {
    t.projects.forEach((proj, i) => {
      set('project-'+(i+1)+'-name', proj.title);
      set('project-'+(i+1)+'-desc', proj.desc);
      if (proj.type) set('project-'+(i+1)+'-type', proj.type);
      if (proj.client) set('project-'+(i+1)+'-client', proj.client);
    });
    document.querySelectorAll('.project-link').forEach((l, i) => {
      if (t.projects[i] && t.projects[i].link_label) l.textContent = t.projects[i].link_label;
      else if (t.proj_link) l.textContent = t.proj_link;
    });
  }

  // Skills
  set('skills-label', t.skills_label); set('skills-title', t.skills_title);
  if (t.skills) {
    t.skills.forEach((sk, i) => {
      set('skill-'+(i+1)+'-name', sk.name);
      set('skill-'+(i+1)+'-cat', sk.category);
    });
  }

  // Experiences
  set('exp-label', t.exp_label); set('exp-title', t.exp_title);
  if (t.experiences) {
    t.experiences.forEach((exp, i) => {
      set('exp-'+(i+1)+'-title', exp.title);
      set('exp-'+(i+1)+'-date', exp.date_range);
      set('exp-'+(i+1)+'-company', exp.company);
      if (exp.tasks) {
        const ul = document.getElementById('exp-'+(i+1)+'-tasks');
        if (ul) ul.innerHTML = exp.tasks.map(function(task) { return '<li>'+task+'</li>'; }).join('');
      }
    });
  }

  // Certifications
  set('cert-label', t.cert_label); set('cert-title', t.cert_title);
  if (t.certifications) {
    t.certifications.forEach((cert, i) => {
      set('cert-'+(i+1)+'-name', cert.title);
      set('cert-'+(i+1)+'-org', cert.issuer);
      set('cert-'+(i+1)+'-date', cert.date || '—');
    });
  }
  document.querySelectorAll('.cert-link').forEach(l => { if(t.cert_verify) l.textContent = t.cert_verify; });

  // Contact
  set('contact-label', t.contact_label); setHTML('contact-title', t.contact_title);
  set('contact-desc', t.contact_desc);
  if (t.contacts) {
    t.contacts.forEach((ci, i) => {
      set('contact-'+(i+1)+'-label', ci.label);
      set('contact-'+(i+1)+'-value', ci.value);
    });
  }

  // Form
  set('form-name', t.form_name); set('form-email-label', t.form_email);
  set('form-subject-label', t.form_subject);
  setAttr('form-subject-input', 'placeholder', t.form_subject_ph);
  set('form-message-label', t.form_message);
  setAttr('form-message-input', 'placeholder', t.form_message_ph);
  const sendBtn = document.getElementById('form-send-btn');
  if(sendBtn) { const sp = sendBtn.querySelector('span'); if(sp) sp.textContent = t.form_send; }

  // Footer
  set('footer-text', t.footer);

  // Theme button text
  const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
  const themeBtn = document.getElementById('themeBtn');
  if(themeBtn) themeBtn.innerHTML = isDark
    ? '<span>☀️</span> ' + (t.theme_light || 'Mode clair')
    : '<span>🌙</span> ' + (t.theme_dark || 'Mode sombre');
}

window.addEventListener('load', function() {
  const langBtn = document.getElementById('langBtn');
  if(langBtn) langBtn.onclick = toggleLang;
});
</script>
</body>
</html>
