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
        Schema::create('genres', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';

            $table->comment('Жанры');

            $table->uuid('id')->primary();
            $table->string('title', 73);
            $table->string('slug', 78)->unique();
            $table->string('description', 200)->nullable();
            $table->string('keywords', 200)->nullable();
            $table->text('content')->fulltext()->nullable();
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
        Schema::dropIfExists('genres');
    }
};
