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
        Schema::create('document_user_permissions', function (Blueprint $table) {
            $table->integer("document_id");
            $table->integer("user_id");
            $table->integer("permission_id");
            $table->foreign("document_id")->references("id")->on("documents");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("permission_id")->references("id")->on("permissions");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_user_permissions');
    }
};
