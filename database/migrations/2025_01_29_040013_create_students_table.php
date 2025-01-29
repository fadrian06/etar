<?php

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('first_last_name');
            $table->string('second_last_name')->nullable();
            $table->enum('nationality', ['V', 'E']);
            $table->integer('id_card')->unique();
            $table->foreignIdFor(State::class, 'birthplace_state_id');
            $table->foreignIdFor(City::class, 'birthplace_city_id');
            $table->date('birthdate');
            $table->timestamps();
            $table->unique(['first_name', 'second_name', 'first_last_name', 'second_last_name']);
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
