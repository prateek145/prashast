<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('sku')->nullable();
            $table->string('product_type')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->integer('show_in_featuredproduct')->default(0);
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('desiner_id')->nullable();
            $table->string('product_categories')->nullable();
            $table->string('product_subcategories')->nullable();
            $table->dateTime('publish_datetime')->nullable();
            $table->longText('featured_image', 191)->nullable();
            $table->string('image', 191)->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title', 191)->nullable();
            $table->string('cannonical_link', 191)->nullable();
            $table->string('slug', 191)->nullable();
            $table->text('meta_description', 65535)->nullable();
            $table->text('meta_keywords', 65535)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 => InActive, 1 => Published, 2 => Draft, 3 => Scheduled');
            $table->integer('created_by')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
