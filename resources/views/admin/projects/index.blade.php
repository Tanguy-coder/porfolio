@extends('layouts.admin')

@section('title', 'Projets')

@section('content')
<div class="header-row">
    <h2>Liste des projets</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Ajouter un projet</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Icon</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Ordre</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->icon }}</td>
                <td style="font-weight:600;">{{ $project->title }}</td>
                <td>{{ $project->type }}</td>
                <td>{{ $project->sort_order }}</td>
                <td>
                    @if($project->is_active)
                        <span class="badge-active">Oui</span>
                    @else
                        <span class="badge-inactive">Non</span>
                    @endif
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Supprimer ce projet ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucun projet</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
