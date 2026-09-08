@extends('layouts.admin')

@section('title', 'Modifier le projet')

@section('content')
<div class="card">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label>Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon', $project->icon) }}">
                @error('icon') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required>
                @error('title') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Type</label>
                <select name="type">
                    <option value="PERSONNEL" {{ old('type', $project->type) === 'PERSONNEL' ? 'selected' : '' }}>Personnel</option>
                    <option value="PROFESSIONNEL" {{ old('type', $project->type) === 'PROFESSIONNEL' ? 'selected' : '' }}>Professionnel</option>
                </select>
                @error('type') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Client</label>
                <input type="text" name="client" value="{{ old('client', $project->client) }}" placeholder="Optionnel">
                @error('client') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
            @error('description') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Tags (séparés par des virgules)</label>
            <input type="text" name="tags" value="{{ old('tags', implode(', ', $project->tags ?? [])) }}">
            @error('tags') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Lien</label>
                <input type="url" name="link" value="{{ old('link', $project->link) }}" placeholder="https://...">
                @error('link') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Libellé du lien</label>
                <input type="text" name="link_label" value="{{ old('link_label', $project->link_label) }}">
                @error('link_label') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Traduction anglaise</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Title (EN)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $project->title_en) }}">
                @error('title_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Type (EN)</label>
                <input type="text" name="type_en" value="{{ old('type_en', $project->type_en) }}" placeholder="PERSONAL, PROFESSIONAL">
                @error('type_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Client (EN)</label>
            <input type="text" name="client_en" value="{{ old('client_en', $project->client_en) }}">
            @error('client_en') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Description (EN)</label>
            <textarea name="description_en" rows="3">{{ old('description_en', $project->description_en) }}</textarea>
            @error('description_en') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Link label (EN)</label>
            <input type="text" name="link_label_en" value="{{ old('link_label_en', $project->link_label_en) }}">
            @error('link_label_en') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;"></div>

        <div class="form-row">
            <div class="form-group">
                <label>Ordre d'affichage</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}">
                @error('sort_order') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group" style="display:flex;align-items:flex-end;">
                <div class="checkbox-group">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                    <label for="is_active">Actif</label>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
