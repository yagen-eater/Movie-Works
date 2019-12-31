<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
  protected $fillable = ['job_info_id','name','email','tel','resume','CV'];

  public function jobinfo()
  {
      return $this->belongsTo(JobInfo::class);
  }
}
