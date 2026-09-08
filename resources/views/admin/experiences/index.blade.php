@extends('layouts.admin')

@section('title', 'Expériences')

@section('content')
<div class="header-row">
    <h2>Liste des expériences</h2>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Entreprise</th>
                <th>Période</th>
                <th>Ordre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($experiences as $exp)
            <tr>
                <td style="font-weight:600;">{{ $exp->title }}</td>
                <td>{{ $exp->company }}</td>
                <td>{{ $exp->date_range }}</td>
                <td>{{ $exp->sort_order }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucune expérience</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
