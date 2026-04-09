@extends('layouts.app')

@section('title', 'Leverancier bewerken')

@section('content')
    <section class="hero">
        <div>
            <h1>Leverancier Gegevens Bewerken</h1>
            <p>Leverancier Bewerken</p>
        </div>
    </section>

    <section class="panel" style="padding: 14px;">
        @if ($errors->any())
            <div class="alert" style="margin-bottom: 16px; border-color: rgba(251, 191, 36, 0.28); background: rgba(251, 191, 36, 0.12); color: #fef3c7;">
                Voer geldige gegevens in
            </div>
        @endif

        @include('leveranciers._form', ['leverancier' => $leverancier])
    </section>
@endsection