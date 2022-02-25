<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
                /**
         * @OA\Property(
         *     title="ID",
         *     description="ID",
         *     format="int64",
         *     example=1
         * )
         *
         * @var integer
         */
            $table->id();


            /**
         * @OA\Property(
         *      title="Name",
         *      description="Name of the new Employee",
         *      example="Pedro"
         * )
         *
         * @var string
         */
            $table->string('name');


             /**
         * @OA\Property(
         *      title="Email",
         *      description="Email address of the  Employee",
         *      example="Pedro@gmail.com"
         * )
         *
         * @var string
         */
            $table->string('email');


             /**
         * @OA\Property(
         *      title="Nationality",
         *      description=" Employee's Nationality",
         *      example="Rwandan"
         * )
         *
         * @var string
         */
            $table->string('nationality');

             /**
         * @OA\Property(
         *      title="status",
         *      description=" Employee's marital status",
         *      example="Married"
         * )
         *
         * @var string
         */
            $table->string('status');

            
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
};
