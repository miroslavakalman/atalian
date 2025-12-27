<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('career_submissions', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('vacancy_name')->nullable()->after('message');
            $table->string('status')->default('new')->after('vacancy_name');
            $table->text('notes')->nullable()->after('status');
            $table->boolean('consent_pd')->default(false);
            $table->boolean('consent_marketing')->default(false);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('career_submissions', function (Blueprint $table) {
            $table->dropColumn(['phone', 'vacancy_name', 'status', 'notes', 
                'consent_pd', 'consent_marketing', 'deleted_at']);
        });
    }
};