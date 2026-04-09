@extends('layouts.app')

@section('title', 'Leveranciersoverzicht')

@section('content')
    <section class="hero">
        <div>
            <h1>Leveranciers</h1>
            <p>Beheer het overzicht van leveranciers. Voeg nieuwe relaties toe, werk gegevens bij en verwijder wat niet meer nodig is.</p>
        </div>

        <a class="button button-primary" href="{{ route('leveranciers.create') }}">Leverancier toevoegen</a>
    </section>

    <section class="cards">
        <div class="card">
            <div class="card-label">Totaal leveranciers</div>
            <div class="card-value">{{ $leveranciers->count() }}</div>
        </div>
        <div class="card">
            <div class="card-label">Actieve contacten</div>
            <div class="card-value">{{ $leveranciers->whereNotNull('contact_email')->count() }}</div>
        </div>
        <div class="card">
            <div class="card-label">Volgende levering</div>
            <div class="card-value">
                {{ optional($leveranciers->sortBy('eerstvolgende_levering')->first()?->eerstvolgende_levering)->format('d-m-Y H:i') ?? 'Nog niet gepland' }}
            </div>
        </div>
    </section>

    <section class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Bedrijf</th>
                    <th>Contact</th>
                    <th>Adres</th>
                    <th>Telefoon</th>
                    <th>Volgende levering</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leveranciers as $leverancier)
                    <tr>
                        <td>
                            <strong>{{ $leverancier->bedrijfsnaam }}</strong><br>
                            <span class="muted">Aangemaakt op {{ $leverancier->created_at?->format('d-m-Y') }}</span>
                        </td>
                        <td>
                            {{ $leverancier->contact_naam }}<br>
                            <span class="muted">{{ $leverancier->contact_email }}</span>
                        </td>
                        <td>{{ $leverancier->adres }}</td>
                        <td>{{ $leverancier->telefoon ?: 'Niet ingevuld' }}</td>
                        <td>{{ $leverancier->eerstvolgende_levering?->format('d-m-Y H:i') ?? 'Nog niet gepland' }}</td>
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
                        <td colspan="6">
                            <div class="empty">
                                Nog geen leveranciers toegevoegd. Klik op <strong>Leverancier toevoegen</strong> om te beginnen.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection