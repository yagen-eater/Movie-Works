<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\JobInfo;
use Validator;

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
       $rules = [
           'url' => 'required',
           'occupation' => 'required|max:20',
           'work_location' => 'required|max:20',
           'employment_status' => 'required|max:20',
           'job_description' => 'required|max:50',
           'salary' => 'required|max:30',
           'working_hours' => 'required|max:30',
           'holiday' => 'required|max:30',
           'welfare' => 'max:50',
           'supplement' => 'max:60',
       ];
       $messages = [
         'url.required' => 'Youtube動画IDは必ず入力してください',
         'occupation.required' => '職種は必ず入力してください',
         'occupation.max' => '職種は20字以下で入力してください',
         'work_location.required' => '勤務地は必ず入力してください',
         'work_location.max' => '勤務地は20字以下で入力してください',
         'employment_status.required' => '雇用形態は必ず入力してください',
         'employment_status.max' => '雇用形態は20字以下で入力してください',
         'job_description.required' => '仕事内容は必ず入力してください',
         'job_description.max' => '仕事内容は50字以下で入力してください',
         'salary.required' => '給与は必ず入力してください',
         'salary.max' => '給与は30字以下で入力してください',
         'working_hours.required' => '勤務時間は必ず入力してください',
         'working_hours.max' => '勤務時間は30字以下で入力してください',
         'holiday.required' => '休日は必ず入力してください',
         'holiday.max' => '休日は30字以下で入力してください',
         'welfare.max' => '福利厚生は50字以下で入力してください',
         'supplement.max' => 'PRコメントは60字以下で入力してください',
       ];

       $validator = Validator::make($request->all(), $rules, $messages);
       if($validator->fails()){
         return back()->withErrors($validator)->withInput();
       }

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
        $rules = [
            'url' => 'required',
            'occupation' => 'required|max:20',
            'work_location' => 'required|max:20',
            'employment_status' => 'required|max:20',
            'job_description' => 'required|max:50',
            'salary' => 'required|max:30',
            'working_hours' => 'required|max:30',
            'holiday' => 'required|max:30',
            'welfare' => 'max:50',
            'supplement' => 'max:60',
        ];
        $messages = [
          'url.required' => 'YoutubeIDは必ず入力してください',
          'occupation.required' => '職種は必ず入力してください',
          'occupation.max' => '職種は20字以下で入力してください',
          'work_location.required' => '勤務地は必ず入力してください',
          'work_location.max' => '勤務地は20字以下で入力してください',
          'employment_status.required' => '雇用形態は必ず入力してください',
          'employment_status.max' => '雇用形態は20字以下で入力してください',
          'job_description.required' => '仕事内容は必ず入力してください',
          'job_description.max' => '仕事内容は50字以下で入力してください',
          'salary.required' => '給与は必ず入力してください',
          'salary.max' => '給与は30字以下で入力してください',
          'working_hours.required' => '勤務時間は必ず入力してください',
          'working_hours.max' => '勤務時間は30字以下で入力してください',
          'holiday.required' => '休日は必ず入力してください',
          'holiday.max' => '休日は30字以下で入力してください',
          'welfare.max' => '福利厚生は50字以下で入力してください',
          'supplement.max' => 'PRコメントは60字以下で入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
          return back()->withErrors($validator)->withInput();
        }

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
