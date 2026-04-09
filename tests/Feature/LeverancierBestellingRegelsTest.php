<?php

namespace Tests\Feature;

use App\Models\Leverancier;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LeverancierBestellingRegelsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('Leverancier', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Bedrijfsnaam', 100);
            $table->string('Adres', 255);
            $table->string('ContactNaam', 100);
            $table->string('ContactEmail', 100);
            $table->string('Telefoon', 15)->nullable();
            $table->dateTime('EerstvolgendeLevering')->nullable();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('Leverancier');

        parent::tearDown();
    }

    public function test_leverancier_kan_niet_bewerkt_worden_met_actieve_bestelling(): void
    {
        $leverancier = Leverancier::create([
            'bedrijfsnaam' => 'Groente BV',
            'adres' => 'Dorpsstraat 1',
            'contact_naam' => 'Jan Jansen',
            'contact_email' => 'jan@groente.nl',
            'telefoon' => '0612345678',
            'eerstvolgende_levering' => now()->addDay(),
        ]);

        $response = $this
            ->from(route('leveranciers.edit', $leverancier))
            ->put(route('leveranciers.update', $leverancier), [
                'bedrijfsnaam' => 'Nieuwe Naam BV',
                'adres' => 'Dorpsstraat 1',
                'contact_naam' => 'Jan Jansen',
                'contact_email' => 'jan@groente.nl',
                'telefoon' => '0612345678',
                'eerstvolgende_levering' => now()->addDay()->format('Y-m-d H:i:s'),
            ]);

        $response
            ->assertRedirect(route('leveranciers.edit', $leverancier))
            ->assertSessionHas('error', 'Leverancier kan niet worden bewerkt omdat er een actieve bestelling aan gekoppeld is');

        $this->assertDatabaseHas('Leverancier', [
            'Id' => $leverancier->id,
            'Bedrijfsnaam' => 'Groente BV',
        ]);
    }

    public function test_leverancier_kan_niet_verwijderd_worden_met_actieve_bestellingen(): void
    {
        $leverancier = Leverancier::create([
            'bedrijfsnaam' => 'Fruit BV',
            'adres' => 'Markt 5',
            'contact_naam' => 'Piet Pieters',
            'contact_email' => 'piet@fruit.nl',
            'telefoon' => '0687654321',
            'eerstvolgende_levering' => now()->addDay(),
        ]);

        $response = $this->delete(route('leveranciers.destroy', $leverancier));

        $response
            ->assertRedirect(route('leveranciers.index'))
            ->assertSessionHas('error', 'Leverancier kan niet worden verwijderd omdat er nog actieve bestellingen aan gekoppeld zijn');

        $this->assertDatabaseHas('Leverancier', [
            'Id' => $leverancier->id,
        ]);
    }

    public function test_leverancier_kan_wel_verwijderd_worden_met_voltooide_bestelling(): void
    {
        $leverancier = Leverancier::create([
            'bedrijfsnaam' => 'Brood BV',
            'adres' => 'Bakkerstraat 9',
            'contact_naam' => 'Klaas Bakker',
            'contact_email' => 'klaas@brood.nl',
            'telefoon' => '0600000000',
            'eerstvolgende_levering' => now()->subDay(),
        ]);

        $response = $this->delete(route('leveranciers.destroy', $leverancier));

        $response
            ->assertRedirect(route('leveranciers.index'))
            ->assertSessionHas('status', 'Leverancier succesvol verwijderd');

        $this->assertDatabaseMissing('Leverancier', [
            'Id' => $leverancier->id,
        ]);
    }
}
