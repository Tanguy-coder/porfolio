@extends('layouts.admin')

@section('title', 'Certifications')

@section('content')
<div class="header-row">
    <h2>Liste des certifications</h2>
    <a href="{{ route('admin.certifications.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<div class="card" style="padding:0;overflow:hidden;">
    <table>
        <thead>
            <tr>
                <th>Icon</th>
                <th>Titre</th>
                <th>Émetteur</th>
                <th>Date</th>
                <th>Ordre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certifications as $cert)
            <tr>
                <td>{{ $cert->icon }}</td>
                <td style="font-weight:600;">{{ $cert->title }}</td>
                <td>{{ $cert->issuer }}</td>
                <td>{{ $cert->date ?? '—' }}</td>
                <td>{{ $cert->sort_order }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.certifications.edit', $cert) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('admin.certifications.destroy', $cert) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#a0a0b0;padding:2rem;">Aucune certification</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
