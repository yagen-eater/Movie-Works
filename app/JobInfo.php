<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobInfo extends Model
{
  protected $fillable = ['user_id','url','occupation','work_location','employment_status','job_description','salary','working_hours','holiday','welfare','supplement'];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function uploads()
  {
      return $this->hasMany(Upload::class);
  }

}
