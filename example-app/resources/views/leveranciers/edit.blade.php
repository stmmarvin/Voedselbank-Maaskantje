@extends('layouts.app')

@section('title', 'Leverancier bewerken')

@section('content')
    <section class="hero">
        <div>
            <h1>Leverancier bewerken</h1>
            <p>Pas de gegevens van {{ $leverancier->bedrijfsnaam }} aan.</p>
        </div>
    </section>

    <section class="panel" style="padding: 24px;">
        @include('leveranciers._form', ['leverancier' => $leverancier])
    </section>
@endsection