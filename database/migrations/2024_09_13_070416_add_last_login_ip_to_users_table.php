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
        Schema::table('users', function (Blueprint $table) {
            // Aggiungi la colonna per salvare l'IP dell'ultimo login
            $table->string('last_login_ip')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rimuovi la colonna se si esegue il rollback della migrazione
            $table->dropColumn('last_login_ip');
        });
    }
};
