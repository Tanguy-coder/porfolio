@extends('layouts.admin')

@section('title', 'Ajouter une expérience')

@section('content')
<div class="card">
    <form action="{{ route('admin.experiences.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>Titre du poste</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Période</label>
                <input type="text" name="date_range" value="{{ old('date_range') }}" placeholder="Mai 2025 — Août 2026" required>
                @error('date_range') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Entreprise</label>
                <input type="text" name="company" value="{{ old('company') }}" required>
                @error('company') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Lieu</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="Antananarivo">
                @error('location') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Tags (séparés par des virgules)</label>
            <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Angular, NestJS, MongoDB">
            @error('tags') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tâches (une par ligne)</label>
            <textarea name="tasks" rows="5" placeholder="Contribution au développement de...&#10;Développement de read-models...">{{ old('tasks') }}</textarea>
            @error('tasks') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Traduction anglaise</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Job title (EN)</label>
                <input type="text" name="title_en" value="{{ old('title_en') }}">
                @error('title_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Date range (EN)</label>
                <input type="text" name="date_range_en" value="{{ old('date_range_en') }}" placeholder="May 2025 — Aug 2026">
                @error('date_range_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Company (EN)</label>
                <input type="text" name="company_en" value="{{ old('company_en') }}">
                @error('company_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Location (EN)</label>
                <input type="text" name="location_en" value="{{ old('location_en') }}">
                @error('location_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Tasks (EN, one per line)</label>
            <textarea name="tasks_en" rows="5" placeholder="Contributed to the development of...&#10;Developed read-models...">{{ old('tasks_en') }}</textarea>
            @error('tasks_en') <div class="form-error">{{ $message }}</div> @enderror
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
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
