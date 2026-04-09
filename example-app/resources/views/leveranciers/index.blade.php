@extends('layouts.app')

@section('title', 'Leveranciersoverzicht')

@section('content')
    <section class="hero">
        <div>
            <h1>Leverancier Overzicht</h1>
            <p>Bekijk alle leveranciers, zoek snel een relatie op en ga direct door naar toevoegen, bewerken of verwijderen.</p>
        </div>

        <a class="button button-primary" href="{{ route('leveranciers.create') }}">Leverancier toevoegen</a>
    </section>

    <section class="panel" style="padding: 18px; margin-bottom: 18px;">
        <form method="GET" action="{{ route('leveranciers.index') }}">
            <input
                type="search"
                name="zoek"
                value="{{ $zoek }}"
                placeholder="Zoeken..."
                aria-label="Zoeken in leveranciers"
                style="width: 100%; max-width: 320px; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(15, 23, 42, 0.88); color: #e5eefc;"
            >
        </form>
    </section>

    <section class="panel">
        <table class="table" style="display: none;">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contact</th>
                    <th>Locatie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leveranciers as $leverancier)
                    <tr>
                        <td>
                            <strong>{{ $leverancier->bedrijfsnaam }}</strong><br>
                        </td>
                        <td>
                            {{ $leverancier->contact_naam }}<br>
                            <span class="muted">{{ $leverancier->contact_email }}</span>
                        </td>
                        <td>{{ $leverancier->adres }}</td>
                        <td>
                            <div class="actions">
                                <a class="button button-secondary" href="{{ route('leveranciers.edit', $leverancier) }}">Bewerken</a>
                                <form method="POST" action="{{ route('leveranciers.destroy', $leverancier) }}" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button button-danger" type="submit">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty">
                                Nog geen leveranciers gevonden.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mobile-list">
            @forelse ($leveranciers as $leverancier)
                <div class="mobile-item">
                    <div class="mobile-title">{{ $leverancier->bedrijfsnaam }}</div>
                    <div class="muted">{{ $leverancier->contact_naam }} | {{ $leverancier->adres }}</div>
                    <div class="actions" style="margin-top: 12px;">
                        <a class="button button-secondary" href="{{ route('leveranciers.edit', $leverancier) }}">Bewerken</a>
                        <form method="POST" action="{{ route('leveranciers.destroy', $leverancier) }}" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button class="button button-danger" type="submit">Verwijderen</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty">Nog geen leveranciers gevonden.</div>
            @endforelse
        </div>
    </section>

    <style>
        .mobile-list { display: none; }
        .mobile-item {
            padding: 16px 0;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
        }

        .mobile-item:last-child { border-bottom: 0; }
        .mobile-title { font-weight: 700; margin-bottom: 6px; }

        @media (max-width: 760px) {
            .table { display: none; }
            .mobile-list { display: grid; gap: 12px; }
        }

        @media (min-width: 761px) {
            .mobile-list { display: none; }
            .table { display: table !important; }
        }
    </style>
@endsection