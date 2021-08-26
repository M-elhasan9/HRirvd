<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->date('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();

            $table->string('image')->nullable();
            $table->string('Id_card')->nullable();
            $table->string('cv')->nullable();
            $table->string('self_doc')->nullable();

            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('supervisior')->nullable();
            $table->string('hr')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('salary')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('project_name')->nullable();
            $table->text('not')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
