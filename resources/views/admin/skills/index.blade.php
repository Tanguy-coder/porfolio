@extends('layouts.admin')

@section('title', 'Compétences')

@section('content')
<div class="header-row">
    <h2>Liste des compétences</h2>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Ordre</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td style="font-weight:600;">{{ $skill->name }}</td>
                <td>{{ $skill->category }}</td>
                <td>{{ $skill->sort_order }}</td>
                <td>
                    @if($skill->is_active)
                        <span class="badge-active">Oui</span>
                    @else
                        <span class="badge-inactive">Non</span>
                    @endif
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucune compétence</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
