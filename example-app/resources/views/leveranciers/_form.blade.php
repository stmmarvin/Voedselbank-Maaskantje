@php
    $isEditing = $leverancier->exists;
@endphp

<form class="stack" method="POST" action="{{ $isEditing ? route('leveranciers.update', $leverancier) : route('leveranciers.store') }}">
    @csrf

    @if ($isEditing)
        @method('PUT')
    @endif

    <div class="form-grid">
        <div class="field">
            <label for="bedrijfsnaam">Bedrijfsnaam:</label>
            <input id="bedrijfsnaam" name="bedrijfsnaam" type="text" value="{{ old('bedrijfsnaam', $leverancier->bedrijfsnaam) }}" required>
            @error('bedrijfsnaam')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="contact_naam">Contactpersoon:</label>
            <input id="contact_naam" name="contact_naam" type="text" value="{{ old('contact_naam', $leverancier->contact_naam) }}" required>
            @error('contact_naam')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="telefoon">Telefoon:</label>
            <input id="telefoon" name="telefoon" type="text" value="{{ old('telefoon', $leverancier->telefoon) }}">
            @error('telefoon')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="contact_email">Email:</label>
            <input id="contact_email" name="contact_email" type="email" value="{{ old('contact_email', $leverancier->contact_email) }}" required>
            @error('contact_email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="adres">Adres:</label>
            <textarea id="adres" name="adres" required>{{ old('adres', $leverancier->adres) }}</textarea>
            @error('adres')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="eerstvolgende_levering">Eerstvolgende levering:</label>
            <input id="eerstvolgende_levering" name="eerstvolgende_levering" type="datetime-local" value="{{ old('eerstvolgende_levering', $leverancier->eerstvolgende_levering?->format('Y-m-d\TH:i')) }}">
            @error('eerstvolgende_levering')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-actions">
        <button class="button button-primary" type="submit">Bevestigen</button>
        <a class="button button-secondary" href="{{ route('leveranciers.index') }}">Annuleren</a>
    </div>
</form>
