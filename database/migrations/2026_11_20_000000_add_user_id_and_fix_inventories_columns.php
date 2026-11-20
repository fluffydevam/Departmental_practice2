<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
        });

        DB::statement('ALTER TABLE `inventories` CHANGE `Equipment_name` `equipment_name` VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE `inventories` CHANGE `Category` `category` VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE `inventories` MODIFY `description` TEXT NULL');
        DB::statement("ALTER TABLE `inventories` MODIFY `availability_status` VARCHAR(255) NOT NULL DEFAULT 'available'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE `inventories` MODIFY `availability_status` VARCHAR(255) NOT NULL");

        Schema::table('inventories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        DB::statement('ALTER TABLE `inventories` CHANGE `equipment_name` `Equipment_name` VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE `inventories` CHANGE `category` `Category` VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE `inventories` MODIFY `description` VARCHAR(255) NOT NULL');
    }
};
