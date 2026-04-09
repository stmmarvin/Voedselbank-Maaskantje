<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AllergieController extends Controller
{
    public function overzicht()
    {
        try {
            $rows = DB::select(
                'SELECT
                    a.Id AS allergie_id,
                    a.Naam AS AllergieNaam,
                    COALESCE(a.Ernst, "Niet opgegeven") AS Ernst,
                    k.Id AS klant_id,
                    k.GezinsNaam,
                    k.Email,
                    k.SpecifiekeWensen
                FROM Allergie a
                LEFT JOIN Klant_Allergie ka ON ka.Allergie_Id = a.Id
                LEFT JOIN Klant k ON k.Id = ka.Klant_Id
                ORDER BY a.Naam ASC, k.GezinsNaam ASC'
            );

            $uniqueCustomers = [];
            $uniqueAllergies = [];

            foreach ($rows as $row) {
                if (!empty($row->klant_id)) {
                    $uniqueCustomers[$row->klant_id] = true;
                }
                $uniqueAllergies[$row->allergie_id] = true;
            }

            $allergyCount = count($uniqueAllergies);
            $customerCount = count($uniqueCustomers);
            $allergyRows = $rows;
            $dbError = null;
            $isAdmin = \Auth::user()->Rol === 'admin';

        } catch (\Exception $e) {
            $allergyCount = 0;
            $customerCount = 0;
            $allergyRows = [];
            $dbError = $e->getMessage();
            $isAdmin = false;
        }

        return view('allergie-overzicht', compact('allergyCount', 'customerCount', 'allergyRows', 'dbError', 'isAdmin'));
    }

    public function toevoegen()
    {
        $formSuccess = null;
        $formError = null;

        if (request()->isMethod('post')) {
            try {
                $naam = request()->input('naam');
                $ernst = request()->input('ernst');

                DB::insert(
                    'INSERT INTO Allergie (Naam, Ernst) VALUES (?, ?)',
                    [$naam, $ernst !== '' ? $ernst : null]
                );

                $formSuccess = 'Allergie succesvol toegevoegd!';
            } catch (\Exception $e) {
                $formError = 'Fout bij opslaan: ' . $e->getMessage();
            }
        }

        return view('allergie-toevoegen', compact('formSuccess', 'formError'));
    }

    public function bewerken()
    {
        $id = request()->input('id');
        $editFormSuccess = null;
        $editFormError = null;
        $editAllergy = null;

        if ($id) {
            try {
                $result = DB::select('SELECT Id, Naam, Ernst FROM Allergie WHERE Id = ?', [$id]);
                $editAllergy = !empty($result) ? (array) $result[0] : null;
            } catch (\Exception $e) {
                $editFormError = 'Fout bij ophalen: ' . $e->getMessage();
            }
        }

        if (request()->isMethod('post')) {
            try {
                $id = request()->input('id');
                $naam = request()->input('naam');
                $ernst = request()->input('ernst');

                DB::update(
                    'UPDATE Allergie SET Naam = ?, Ernst = ? WHERE Id = ?',
                    [$naam, $ernst !== '' ? $ernst : null, $id]
                );

                $editFormSuccess = 'Allergie succesvol bijgewerkt!';
                
                // Reload data
                $result = DB::select('SELECT Id, Naam, Ernst FROM Allergie WHERE Id = ?', [$id]);
                $editAllergy = !empty($result) ? (array) $result[0] : null;
            } catch (\Exception $e) {
                $editFormError = 'Fout bij opslaan: ' . $e->getMessage();
            }
        }

        return view('allergie-bewerken', compact('editAllergy', 'editFormSuccess', 'editFormError'));
    }

    public function verwijderen()
    {
        // Alleen admins mogen verwijderen
        if (\Auth::user()->Rol !== 'admin') {
            return redirect()->route('allergie.overzicht')->with('error', 'Geen toegang om allergieën te verwijderen.');
        }

        $id = request()->input('id');

        if (!$id) {
            return redirect()->route('allergie.overzicht')->with('error', 'Geen allergie ID opgegeven.');
        }

        try {
            // Eerst de koppelingen verwijderen
            DB::delete('DELETE FROM Klant_Allergie WHERE Allergie_Id = ?', [$id]);
            
            // Dan de allergie zelf verwijderen
            DB::delete('DELETE FROM Allergie WHERE Id = ?', [$id]);

            return redirect()->route('allergie.overzicht')->with('success', 'Allergie succesvol verwijderd!');
        } catch (\Exception $e) {
            return redirect()->route('allergie.overzicht')->with('error', 'Fout bij verwijderen: ' . $e->getMessage());
        }
    }
}
