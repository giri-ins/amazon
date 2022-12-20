<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->float('rating');
            $table->text('content');
            $table->foreignId('user_id')->nullable(false);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE reviews ADD CONSTRAINT chk_rating_or_content_not_null CHECK (rating IS NOT NULL OR content IS NOT NULL)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
