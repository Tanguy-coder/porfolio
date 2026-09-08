@extends('layouts.admin')

@section('title', 'Informations de contact')

@section('content')
<div class="header-row">
    <h2>Liste des contacts</h2>
    <a href="{{ route('admin.contact-infos.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Icon</th>
                <th>Label</th>
                <th>Valeur</th>
                <th>Ordre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contactInfos as $info)
            <tr>
                <td>{{ $info->icon }}</td>
                <td style="font-weight:600;">{{ $info->label }}</td>
                <td>{{ $info->value }}</td>
                <td>{{ $info->sort_order }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.contact-infos.edit', $info) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.contact-infos.destroy', $info) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucun contact</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
