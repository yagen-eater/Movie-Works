<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_infos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->index();
          $table->string('url');
          // 職種
          $table->string('occupation');
          // 職種
          $table->string('work_location');
          // 雇用形態
          $table->string('employment_status');
          // 仕事内容
          $table->string('job_description');
          // 給与
          $table->string('salary');
          // 勤務時間
          $table->string('working_hours');
          // 休日
          $table->string('holiday');
          // 福利厚生
          $table->string('welfare')->nullable();
          // 動画PRコメント
          $table->string('supplement')->nullable();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
        Schema::dropIfExists('job_infos');
    }
}
