<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->boolean('status')->default(1);
            $table->string('parent_id')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('icon_image')->nullable();
            $table->string('dark_icon')->nullable();
            $table->string('icon')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('product_subcategories');
    }
}
