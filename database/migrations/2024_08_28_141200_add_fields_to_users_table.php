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
            // Добавляем столбец photo, только если он не существует
            if (!Schema::hasColumn('users', 'photo')) {
                $table->string('photo')->nullable()->after('position_id');
            }

            // Столбцы phone и position_id уже существуют, их добавление не требуется
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Удаляем столбец photo, если он существует
            if (Schema::hasColumn('users', 'photo')) {
                $table->dropColumn('photo');
            }

            // Мы не удаляем столбцы phone и position_id, так как они могут быть добавлены ранее и не относятся к этой миграции
        });
    }
};

