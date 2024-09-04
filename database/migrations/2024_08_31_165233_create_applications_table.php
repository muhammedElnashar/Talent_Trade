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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId("candidate_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId("job_post_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('work_type', ['On-site', 'Remote', 'Hybrid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
