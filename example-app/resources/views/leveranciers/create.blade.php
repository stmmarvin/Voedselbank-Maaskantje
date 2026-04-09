@extends('layouts.app')

@section('title', 'Leverancier toevoegen')

@section('content')
    <section class="hero">
        <div>
            <h1>Nieuwe leverancier</h1>
            <p>Voeg een leverancier toe met de contactgegevens en de eerstvolgende levering.</p>
        </div>
    </section>

    <section class="panel" style="padding: 24px;">
        @include('leveranciers._form', ['leverancier' => $leverancier])
    </section>
@endsection