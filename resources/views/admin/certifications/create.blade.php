@extends('layouts.admin')

@section('title', 'Ajouter une certification')

@section('content')
<div class="card">
    <form action="{{ route('admin.certifications.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon', '⚡') }}">
                @error('icon') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Émetteur</label>
                <input type="text" name="issuer" value="{{ old('issuer') }}" required>
                @error('issuer') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="date" value="{{ old('date') }}" placeholder="Octobre 2025">
                @error('date') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Lien de vérification</label>
            <input type="url" name="verification_link" value="{{ old('verification_link') }}" placeholder="https://...">
            @error('verification_link') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Traduction anglaise</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Title (EN)</label>
                <input type="text" name="title_en" value="{{ old('title_en') }}">
                @error('title_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Issuer (EN)</label>
                <input type="text" name="issuer_en" value="{{ old('issuer_en') }}">
                @error('issuer_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Date (EN)</label>
            <input type="text" name="date_en" value="{{ old('date_en') }}" placeholder="October 2025">
            @error('date_en') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;"></div>

        <div class="form-row">
            <div class="form-group">
                <label>Ordre d'affichage</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}">
                @error('sort_order') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group" style="display:flex;align-items:flex-end;">
                <div class="checkbox-group">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                    <label for="is_active">Actif</label>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('admin.certifications.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
