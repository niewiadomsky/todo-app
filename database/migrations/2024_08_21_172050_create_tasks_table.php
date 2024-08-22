<?php

use App\Models\Category;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_completed')->default(false);
            $table->integer('estimated_minutes');
            $table->foreignIdFor(Category::class)->nullable()->constrained();
            $table->foreignId('created_by')->references('id')->on('users')->constrained();
            $table->foreignId('assigned_to')->nullable()->references('id')->on('users')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
