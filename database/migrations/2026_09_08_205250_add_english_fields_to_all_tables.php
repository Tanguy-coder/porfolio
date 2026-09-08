<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
            $table->string('client_en')->nullable()->after('client');
            $table->string('type_en')->nullable()->after('type');
            $table->string('link_label_en')->nullable()->after('link_label');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('category_en')->nullable()->after('category');
        });

        Schema::table('certifications', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('issuer_en')->nullable()->after('issuer');
            $table->string('date_en')->nullable()->after('date');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('date_range_en')->nullable()->after('date_range');
            $table->string('company_en')->nullable()->after('company');
            $table->string('location_en')->nullable()->after('location');
            $table->json('tasks_en')->nullable()->after('tasks');
        });

        Schema::table('about_values', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('contact_infos', function (Blueprint $table) {
            $table->string('label_en')->nullable()->after('label');
            $table->string('value_en')->nullable()->after('value');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en', 'client_en', 'type_en', 'link_label_en']);
        });
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'category_en']);
        });
        Schema::table('certifications', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'issuer_en', 'date_en']);
        });
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'date_range_en', 'company_en', 'location_en', 'tasks_en']);
        });
        Schema::table('about_values', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });
        Schema::table('contact_infos', function (Blueprint $table) {
            $table->dropColumn(['label_en', 'value_en']);
        });
    }
};
