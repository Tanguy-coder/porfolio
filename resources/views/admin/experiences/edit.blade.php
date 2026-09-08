@extends('layouts.admin')

@section('title', 'Modifier l\'expérience')

@section('content')
<div class="card">
    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label>Titre du poste</label>
                <input type="text" name="title" value="{{ old('title', $experience->title) }}" required>
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Période</label>
                <input type="text" name="date_range" value="{{ old('date_range', $experience->date_range) }}" required>
                @error('date_range') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Entreprise</label>
                <input type="text" name="company" value="{{ old('company', $experience->company) }}" required>
                @error('company') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Lieu</label>
                <input type="text" name="location" value="{{ old('location', $experience->location) }}">
                @error('location') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Tags (séparés par des virgules)</label>
            <input type="text" name="tags" value="{{ old('tags', implode(', ', $experience->tags ?? [])) }}">
            @error('tags') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tâches (une par ligne)</label>
            <textarea name="tasks" rows="5">{{ old('tasks', implode("\n", $experience->tasks ?? [])) }}</textarea>
            @error('tasks') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Traduction anglaise</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Job title (EN)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $experience->title_en) }}">
                @error('title_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Date range (EN)</label>
                <input type="text" name="date_range_en" value="{{ old('date_range_en', $experience->date_range_en) }}">
                @error('date_range_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Company (EN)</label>
                <input type="text" name="company_en" value="{{ old('company_en', $experience->company_en) }}">
                @error('company_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Location (EN)</label>
                <input type="text" name="location_en" value="{{ old('location_en', $experience->location_en) }}">
                @error('location_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Tasks (EN, one per line)</label>
            <textarea name="tasks_en" rows="5">{{ old('tasks_en', implode("\n", $experience->tasks_en ?? [])) }}</textarea>
            @error('tasks_en') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;"></div>

        <div class="form-row">
            <div class="form-group">
                <label>Ordre d'affichage</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}">
                @error('sort_order') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group" style="display:flex;align-items:flex-end;">
                <div class="checkbox-group">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $experience->is_active) ? 'checked' : '' }}>
                    <label for="is_active">Actif</label>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
