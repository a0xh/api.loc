<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->comment('Роли');

            $table->uuid('id')->primary();
            $table->string('name', 55);
            $table->string('slug', 60)->unique();
            $table->enum('status', ['active', 'inactive'])
                ->default('inactive');
            $table->json('data')->nullable()
                ->comment('Доп. данные');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps(precision: 0);
            $table->softDeletes();

            $table->index(['created_at']);
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
