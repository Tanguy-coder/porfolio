@extends('layouts.admin')

@section('title', 'À propos — Valeurs')

@section('content')
<div class="header-row">
    <h2>Cartes "À propos"</h2>
    <a href="{{ route('admin.about-values.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Icon</th>
                <th>Titre</th>
                <th>Ordre</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($aboutValues as $value)
            <tr>
                <td>{{ $value->icon }}</td>
                <td style="font-weight:600;">{{ $value->title }}</td>
                <td>{{ $value->sort_order }}</td>
                <td>
                    @if($value->is_active)
                        <span class="badge-active">Oui</span>
                    @else
                        <span class="badge-inactive">Non</span>
                    @endif
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.about-values.edit', $value) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.about-values.destroy', $value) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucune valeur</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
