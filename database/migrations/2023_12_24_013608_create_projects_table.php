<?php

declare(strict_types=1);

use App\Enums\Projects\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('status')->default(Status::ACTIVE->value);

            $table->foreignUlid('team_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
