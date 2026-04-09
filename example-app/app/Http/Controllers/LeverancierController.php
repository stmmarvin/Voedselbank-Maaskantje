<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class LeverancierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $zoek = trim((string) $request->query('zoek', ''));

        $leveranciers = Schema::hasTable('Leverancier')
            ? Leverancier::query()
                ->when($zoek !== '', function ($query) use ($zoek) {
                    $query->where(function ($nestedQuery) use ($zoek) {
                        $nestedQuery
                            ->where('Bedrijfsnaam', 'like', "%{$zoek}%")
                            ->orWhere('ContactNaam', 'like', "%{$zoek}%")
                            ->orWhere('ContactEmail', 'like', "%{$zoek}%")
                            ->orWhere('Adres', 'like', "%{$zoek}%");
                    });
                })
                ->orderByDesc('Id')
                ->get()
            : collect();

        return view('leveranciers.index', compact('leveranciers', 'zoek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('leveranciers.create', [
            'leverancier' => new Leverancier(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateLeverancier($request, null);
        $this->normalizeDate($data);

        Leverancier::create($data);

        return redirect()->route('leveranciers.index')->with('status', 'Leverancier succesvol toegevoegd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leverancier $leverancier): RedirectResponse
    {
        return redirect()->route('leveranciers.edit', $leverancier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leverancier $leverancier): View
    {
        return view('leveranciers.edit', compact('leverancier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leverancier $leverancier): RedirectResponse
    {
        if ($leverancier->eerstvolgende_levering && $leverancier->eerstvolgende_levering->isAfter(now())) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Leverancier kan niet worden bewerkt omdat er een actieve bestelling aan gekoppeld is');
        }

        $data = $this->validateLeverancier($request, $leverancier->id);
        $this->normalizeDate($data);

        $leverancier->update($data);

        return redirect()->route('leveranciers.index')->with('status', 'Leverancier succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leverancier $leverancier): RedirectResponse
    {
        if ($leverancier->eerstvolgende_levering && $leverancier->eerstvolgende_levering->isAfter(now())) {
            return redirect()->route('leveranciers.index')->with('error', 'Leverancier kan niet worden verwijderd omdat er nog actieve bestellingen aan gekoppeld zijn');
        }

        $leverancier->delete();

        return redirect()->route('leveranciers.index')->with('status', 'Leverancier succesvol verwijderd');
    }

    /**
     * Validate supplier input.
     */
    private function validateLeverancier(Request $request, ?int $id = null): array
    {
        $uniqueRule = $id === null 
            ? 'unique:Leverancier,Bedrijfsnaam'
            : 'unique:Leverancier,Bedrijfsnaam,' . $id . ',Id';

        return $request->validate([
            'bedrijfsnaam' => ['required', 'string', 'max:100', $uniqueRule],
            'adres' => ['required', 'string', 'max:255'],
            'contact_naam' => ['required', 'string', 'max:100'],
            'contact_email' => ['required', 'email', 'max:100'],
            'telefoon' => ['nullable', 'string', 'max:15'],
            'eerstvolgende_levering' => ['nullable', 'date'],
        ]);
    }

    /**
     * Normalize the datetime-local value for storage.
     */
    private function normalizeDate(array &$data): void
    {
        if (empty($data['eerstvolgende_levering'])) {
            $data['eerstvolgende_levering'] = null;

            return;
        }

        $data['eerstvolgende_levering'] = Carbon::parse($data['eerstvolgende_levering']);
    }
}
