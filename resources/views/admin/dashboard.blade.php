@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;margin-bottom:2rem;">
    <a href="{{ route('admin.projects.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">🚀</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['projects'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Projets</div>
    </a>
    <a href="{{ route('admin.skills.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">⚡</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['skills'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Compétences</div>
    </a>
    <a href="{{ route('admin.certifications.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">🏅</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['certifications'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Certifications</div>
    </a>
    <a href="{{ route('admin.experiences.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">💼</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['experiences'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Expériences</div>
    </a>
    <a href="{{ route('admin.about-values.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">🎯</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['about_values'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Valeurs</div>
    </a>
    <a href="{{ route('admin.contact-infos.index') }}" class="card" style="text-decoration:none;transition:transform 0.2s,border-color 0.2s;">
        <div style="font-size:2rem;margin-bottom:0.5rem;">📬</div>
        <div style="font-size:2.25rem;font-weight:800;color:#6c63ff;">{{ $counts['contact_infos'] }}</div>
        <div style="font-size:0.85rem;color:#a0a0b0;font-weight:500;">Contacts</div>
    </a>
</div>

<div class="card">
    <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:1.25rem;color:#6c63ff;">Photo de profil (Hero)</h3>

    <div style="display:flex;gap:2rem;align-items:flex-start;flex-wrap:wrap;">
        <div style="flex-shrink:0;">
            @if($heroPhoto)
                <div style="width:180px;height:240px;border-radius:16px;overflow:hidden;border:2px solid rgba(108,99,255,0.3);background:#1a1a2e;">
                    <img src="{{ asset('storage/' . $heroPhoto) }}" alt="Photo de profil" style="width:100%;height:100%;object-fit:cover;">
                </div>
            @else
                <div style="width:180px;height:240px;border-radius:16px;border:2px dashed rgba(255,255,255,0.15);background:#1a1a2e;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:0.5rem;">
                    <div style="font-size:2.5rem;opacity:0.3;">📷</div>
                    <div style="font-size:0.8rem;color:#a0a0b0;">Aucune photo</div>
                </div>
            @endif
        </div>

        <div style="flex:1;min-width:250px;">
            <form action="{{ route('admin.photo.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Choisir une photo</label>
                    <input type="file" name="hero_photo" accept="image/jpeg,image/png,image/webp" required
                           style="padding:0.5rem;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:8px;color:#f0f0f5;width:100%;">
                    <div style="font-size:0.75rem;color:#a0a0b0;margin-top:0.35rem;">JPG, PNG ou WebP. Max 5 Mo. Format portrait recommandé (3:4).</div>
                    @error('hero_photo') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Envoyer la photo</button>
            </form>

            @if($heroPhoto)
                <form action="{{ route('admin.photo.delete') }}" method="POST" style="margin-top:0.75rem;" onsubmit="return confirm('Supprimer la photo ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="color:#ff6b6b;border-color:rgba(255,107,107,0.3);">Supprimer la photo</button>
                </form>
            @endif
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.25rem;">
    <h3 style="font-size:1.1rem;font-weight:700;margin-bottom:1.25rem;color:#6c63ff;">CV (téléchargeable)</h3>

    <div style="display:flex;gap:2rem;align-items:flex-start;flex-wrap:wrap;">
        <div style="flex-shrink:0;">
            @if($cvFile)
                <a href="{{ asset('storage/' . $cvFile) }}" target="_blank" style="display:flex;width:180px;height:240px;border-radius:16px;border:2px solid rgba(108,99,255,0.3);background:#1a1a2e;align-items:center;justify-content:center;flex-direction:column;gap:0.75rem;text-decoration:none;transition:border-color 0.2s;">
                    <div style="font-size:3rem;">📄</div>
                    <div style="font-size:0.8rem;color:#6c63ff;font-weight:600;">{{ basename($cvFile) }}</div>
                    <div style="font-size:0.7rem;color:#a0a0b0;">Cliquer pour ouvrir</div>
                </a>
            @else
                <div style="width:180px;height:240px;border-radius:16px;border:2px dashed rgba(255,255,255,0.15);background:#1a1a2e;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:0.5rem;">
                    <div style="font-size:2.5rem;opacity:0.3;">📄</div>
                    <div style="font-size:0.8rem;color:#a0a0b0;">Aucun CV</div>
                </div>
            @endif
        </div>

        <div style="flex:1;min-width:250px;">
            <form action="{{ route('admin.cv.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Choisir un fichier PDF</label>
                    <input type="file" name="cv_file" accept="application/pdf" required
                           style="padding:0.5rem;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:8px;color:#f0f0f5;width:100%;">
                    <div style="font-size:0.75rem;color:#a0a0b0;margin-top:0.35rem;">PDF uniquement. Max 10 Mo.</div>
                    @error('cv_file') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Envoyer le CV</button>
            </form>

            @if($cvFile)
                <form action="{{ route('admin.cv.delete') }}" method="POST" style="margin-top:0.75rem;" onsubmit="return confirm('Supprimer le CV ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="color:#ff6b6b;border-color:rgba(255,107,107,0.3);">Supprimer le CV</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
