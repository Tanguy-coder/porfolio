@extends('layouts.admin')

@section('title', 'Ajouter un contact')

@section('content')
<div class="card">
    <form action="{{ route('admin.contact-infos.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon', '✉️') }}">
                @error('icon') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Label</label>
                <input type="text" name="label" value="{{ old('label') }}" placeholder="EMAIL, GITHUB..." required>
                @error('label') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Valeur affichée</label>
                <input type="text" name="value" value="{{ old('value') }}" required>
                @error('value') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Lien</label>
                <input type="text" name="link" value="{{ old('link') }}" placeholder="mailto:..., https://..., tel:...">
                @error('link') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.1);margin:1.5rem 0 1rem;padding-top:1rem;">
            <h3 style="font-size:1rem;color:#6c63ff;margin-bottom:1rem;">Traduction anglaise</h3>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Label (EN)</label>
                <input type="text" name="label_en" value="{{ old('label_en') }}">
                @error('label_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Value (EN)</label>
                <input type="text" name="value_en" value="{{ old('value_en') }}">
                @error('value_en') <div class="form-error">{{ $message }}</div> @enderror
            </div>
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
            <a href="{{ route('admin.contact-infos.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
