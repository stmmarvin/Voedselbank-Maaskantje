@extends('layouts.app')

@section('title', 'Leveranciersoverzicht')

@section('content')
    <section class="hero">
        <div>
            <h1>Leverancier Overzicht</h1>
            <p>Bekijk alle leveranciers.</p>
        </div>

        <a class="button button-primary" href="{{ route('leveranciers.create') }}">Leverancier toevoegen</a>
    </section>

    <section class="panel" style="padding: 10px; margin-bottom: 14px;">
        <form method="GET" action="{{ route('leveranciers.index') }}">
            <input
                type="search"
                name="zoek"
                value="{{ $zoek }}"
                placeholder="Zoeken..."
                aria-label="Zoeken in leveranciers"
                style="width: 100%; max-width: 320px; padding: 6px 10px; border-radius: 6px; border: 1px solid #bdbdbd; background: #ffffff; color: #222;"
            >
        </form>
    </section>

    <section class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contact</th>
                    <th>Locatie</th>
                    <th>Status</th>
                    <th>Eerstvolgende levering</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leveranciers as $leverancier)
                    @php
                        $levering = $leverancier->eerstvolgende_levering;
                        $isBezig = $levering && $levering->isAfter(now());
                        $isVoltooid = $levering && !$isBezig;
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $leverancier->bedrijfsnaam }}</strong>
                        </td>
                        <td>
                            {{ $leverancier->contact_naam }}<br>
                            <span class="muted">{{ $leverancier->contact_email }}</span>
                        </td>
                        <td>{{ $leverancier->adres }}</td>
                        <td>
                            @if ($isBezig)
                                <span class="badge" style="background: #fff3cd; color: #856404;">Bezig</span>
                            @elseif ($isVoltooid)
                                <span class="badge" style="background: #cce5ff; color: #004085;">Voltooid</span>
                            @else
                                <span class="badge" style="background: #d4edda; color: #155724;">Inactief</span>
                            @endif
                        </td>
                        <td>
                            @if ($levering)
                                {{ $levering->format('d-m-Y') }}
                            @else
                                <span class="muted">—</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a class="button button-secondary" href="{{ route('leveranciers.edit', $leverancier) }}">Bewerken</a>
                                <form method="POST" action="{{ route('leveranciers.destroy', $leverancier) }}" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button button-danger" type="submit">Verwijder</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
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
                @php
                    $levering = $leverancier->eerstvolgende_levering;
                    $isBezig = $levering && $levering->isAfter(now());
                    $isVoltooid = $levering && !$isBezig;
                @endphp
                <div class="mobile-item">
                    <div class="mobile-title">{{ $leverancier->bedrijfsnaam }}</div>
                    <div class="muted">{{ $leverancier->contact_naam }} | {{ $leverancier->adres }}</div>
                    <div style="margin-top: 8px;">
                        @if ($isBezig)
                            <div><strong>Status:</strong> <span class="badge" style="background: #fff3cd; color: #856404;">Bezig</span></div>
                            <div style="margin-top: 4px;"><strong>Levering:</strong> {{ $levering->format('d-m-Y') }}</div>
                        @elseif ($isVoltooid)
                            <div><strong>Status:</strong> <span class="badge" style="background: #cce5ff; color: #004085;">Voltooid</span></div>
                            <div style="margin-top: 4px;"><strong>Levering:</strong> {{ $levering->format('d-m-Y') }}</div>
                        @else
                            <div><strong>Status:</strong> <span class="badge" style="background: #d4edda; color: #155724;">Inactief</span></div>
                        @endif
                    </div>
                    <div class="actions" style="margin-top: 12px;">
                        <a class="button button-secondary" href="{{ route('leveranciers.edit', $leverancier) }}">Bewerken</a>
                        <form method="POST" action="{{ route('leveranciers.destroy', $leverancier) }}" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button class="button button-danger" type="submit">Verwijder</button>
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
            padding: 12px 0;
            border-bottom: 1px solid #d0d0d0;
        }

        .mobile-item:last-child { border-bottom: 0; }
        .mobile-title { font-weight: 700; margin-bottom: 6px; }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        @media (max-width: 992px) {
            .table { display: none; }
            .mobile-list { display: grid; gap: 12px; }
        }

        @media (min-width: 993px) {
            .mobile-list { display: none; }
            .table { display: table !important; }
        }
    </style>
@endsection