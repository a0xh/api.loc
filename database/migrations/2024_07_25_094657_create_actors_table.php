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
        Schema::create('actors', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->comment('Актеры');

            $table->uuid('id')->primary();
            $table->string('avatar', 255)->nullable();
            $table->string('name', 65)->unique();
            $table->string('slug', 70)->unique();
            $table->string('country', 45)->nullable();
            $table->date('birthday')->nullable();
            $table->enum('status', ['active', 'inactive'])
                ->default('inactive');
            $table->foreignUuid('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps(precision: 0);
            $table->softDeletes();

            $table->index('created_at');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
