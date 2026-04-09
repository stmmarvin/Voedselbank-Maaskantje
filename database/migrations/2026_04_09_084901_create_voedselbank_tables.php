<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Inlog tabel
        Schema::create('inlog', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('wachtwoord', 255);
            $table->string('rol', 20);
            $table->dateTime('laatste_login')->nullable();
            $table->timestamps();
        });

        // Klant tabel
        Schema::create('klant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inlog_id')->constrained('inlog')->onDelete('cascade');
            $table->string('gezins_naam', 100);
            $table->string('adres', 255);
            $table->string('telefoon', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('specifieke_wensen', 255)->nullable();
            $table->string('gezinssamenstelling', 255)->nullable();
            $table->timestamps();
        });

        // Leverancier tabel
        Schema::create('leverancier', function (Blueprint $table) {
            $table->id();
            $table->string('bedrijfsnaam', 100);
            $table->string('adres', 255);
            $table->string('contact_naam', 100);
            $table->string('contact_email', 100);
            $table->string('telefoon', 15)->nullable();
            $table->dateTime('eerstvolgende_levering')->nullable();
            $table->timestamps();
        });

        // Allergie tabel
        Schema::create('allergie', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 100);
            $table->string('ernst', 20)->nullable();
            $table->timestamps();
        });

        // Voorraad tabel
        Schema::create('voorraad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancier_id')->constrained('leverancier')->onDelete('cascade');
            $table->string('streepjescode', 50)->unique();
            $table->string('product_naam', 100);
            $table->string('categorie', 100);
            $table->integer('aantal');
            $table->timestamps();
        });

        // Voedselpakket tabel
        Schema::create('voedselpakket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klant')->onDelete('cascade');
            $table->date('datum_samenstelling');
            $table->date('datum_uitgifte')->nullable();
            $table->timestamps();
        });

        // Voedselpakket_item tabel
        Schema::create('voedselpakket_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voedselpakket_id')->constrained('voedselpakket')->onDelete('cascade');
            $table->foreignId('voorraad_id')->constrained('voorraad')->onDelete('cascade');
            $table->integer('aantal');
            $table->timestamps();
        });

        // Klant_Allergie tabel
        Schema::create('klant_allergie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klant_id')->constrained('klant')->onDelete('cascade');
            $table->foreignId('allergie_id')->constrained('allergie')->onDelete('cascade');
            $table->timestamps();
        });

        // Admin tabel
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inlog_id')->constrained('inlog')->onDelete('cascade');
            $table->string('naam', 100);
            $table->string('email', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('klant_allergie');
        Schema::dropIfExists('voedselpakket_item');
        Schema::dropIfExists('voedselpakket');
        Schema::dropIfExists('voorraad');
        Schema::dropIfExists('allergie');
        Schema::dropIfExists('leverancier');
        Schema::dropIfExists('klant');
        Schema::dropIfExists('inlog');
    }
};
