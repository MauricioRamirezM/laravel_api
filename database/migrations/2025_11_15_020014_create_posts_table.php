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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('tilte');
            $table->text('body');
            /*THERE AREA TWO WAYS TO CREATE A NEW FK FOR OUR DB:
            -WHEN TOI USE THEM:
             1ST.-  when we are setting a FK for other/different  table
             2ND .- we can use the class name when is the table of the same model, so in our example below, if we were in the users's migration we would be allowed to use this way.
            */
            $table->foreignId('author_id')
                ->references('users')
                ->cascadeOnDelete();
            //THIS IS THE 2ND WE HAVE TO PAS THE CLASS AND THE COLUMN NAME
            // $table->foreignIdFor(User::class, ' author_id);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
