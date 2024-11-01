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
            $table->string('dob')->after('email')->nullable();
            $table->string('id_type')->after('phone')->nullable();
            $table->string('idno')->after('id_type')->nullable();
            $table->text('address')->after('idno')->nullable();
            $table->string('image')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('id_type');
            $table->dropColumn('idno');
            $table->dropColumn('address');
            $table->dropColumn('image');
        });
    }
};
