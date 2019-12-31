<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\JobInfo;
use App\Upload;

class UploadController extends Controller
{

    public function add($id)
    {
      $jinfo = JobInfo::find($id);
      $data=[
          'jinfo' => $jinfo,
      ];

      return view('upload.add', $data);
    }

    public function store(Request $request, $id)
    {
      $resume = $request->file('resume')->getClientOriginalName();
      $CV = $request->file('CV')->getClientOriginalName();

      $this->validate($request,[
          'name' => 'required|max:15',
          'email' => 'required|max:255',
          'tel' => 'required|max:11|min:10',
      ]);

      $jinfo = JobInfo::find($id);
      $jinfo->uploads()->create([
          'name' => $request->name,
          'email' => $request->email,
          'tel' => $request->tel,
          'resume' => $resume,
          'CV' => $CV,

      ]);

      $request->file('resume')->storeAs('public/resume',$resume);
      $request->file('CV')->storeAs('public/CV',$CV);

      return view('upload.completion');
    }

    public function show($id)
    {
        $jinfo = JobInfo::find($id);
        $uploads = Upload::where('job_info_id', $id)->orderBy('id','desc')->paginate(5);

        $data=[
            'jinfo' => $jinfo,
            'uploads' => $uploads,
        ];

        return view('upload.show',$data);
    }
}
