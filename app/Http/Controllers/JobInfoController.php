<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Jobinfo;

class JobInfoController extends Controller
{
  public function create()
    {
        $user = \Auth::user();
        $jobinfo = $user->jobinfo()->orderBy('id', 'desc')->paginate(9);

        $data=[
            'user' => $user,
            'jobinfo' => $jobinfo,
        ];

        return view('jobinfo.create', $data);
    }

    public function store(Request $request)
      {
       $this->validate($request,[
           'url' => 'required|max:11',
           'occupation' => 'required|max:50',
           'work_location' => 'required|max:50',
           'employment_status' => 'required|max:20',
           'job_description' => 'required|max:50',
           'salary' => 'required|max:50',
           'working_hours' => 'required|max:50',
           'holiday' => 'required|max:50',
           'welfare' => 'max:50',
           'supplement' => 'max:60',
       ]);

       $request->user()->jobinfo()->create([
           'url' => $request->url,
           'occupation' => $request->occupation,
           'work_location' => $request->work_location,
           'employment_status' => $request->employment_status,
           'job_description' => $request->job_description,
           'salary' => $request->salary,
           'working_hours' => $request->working_hours,
           'holiday' => $request->holiday,
           'welfare' => $request->welfare,
           'supplement' => $request->supplement,
       ]);

       return back();
      }

    //求人詳細表示
    public function show($id)
      {
          $jinfo = JobInfo::find($id);

          $data=[
              'jinfo' => $jinfo,
          ];

          return view('jobinfo.show',$data);
      }

    public function edit($id)
      {
        $jinfo = JobInfo::find($id);

        $data=[
            'jinfo' => $jinfo,
        ];

        return view('jobinfo.edit',$data);
      }

    public function update(Request $request, $id)
      {
         $this->validate($request,[
             'url' => 'required|max:11',
             'occupation' => 'required|max:50',
             'work_location' => 'required|max:50',
             'employment_status' => 'required|max:20',
             'job_description' => 'required|max:50',
             'salary' => 'required|max:50',
             'working_hours' => 'required|max:50',
             'holiday' => 'required|max:50',
             'welfare' => 'max:50',
             'supplement' => 'max:60',
         ]);

         $request->user()->jobinfo()->where('id', $id)->update([
             'url' => $request->url,
             'occupation' => $request->occupation,
             'work_location' => $request->work_location,
             'employment_status' => $request->employment_status,
             'job_description' => $request->job_description,
             'salary' => $request->salary,
             'working_hours' => $request->working_hours,
             'holiday' => $request->holiday,
             'welfare' => $request->welfare,
             'supplement' => $request->supplement,
         ]);

         $jinfo = JobInfo::find($id);

         $data=[
             'jinfo' => $jinfo,
         ];

         return view('jobinfo.show',$data);
      }

    public function destroy($id)
      {
          $jinfo = JobInfo::find($id);

          if (\Auth::id() == $jinfo->user_id) {
              $jinfo->delete();
          }

          return back();
      }
}
