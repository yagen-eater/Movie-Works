<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\JobInfo;
use Validator;

class UsersController extends Controller
{

  public function index(Request $request)
    {
      $occupation = $request->input('occupation');
      $work_location = $request->input('work_location');

      if(!empty($occupation) or !empty($work_location)){
        $jobinfo = JobInfo::where('occupation', 'like', '%' . $occupation . '%')->where('work_location', 'like', '%' . $work_location . '%')->orderBy('id','desc')->paginate(9);
      }else{
        $jobinfo = JobInfo::orderBy('id','desc')->paginate(9);
      }

      return view('welcome', [
          'jobinfo' => $jobinfo,
          'occupation' => $occupation,
          'work_location' => $work_location,
      ]);
    }

  public function show($id)
    {
        $user = User::find($id);
        $jobinfo = $user->jobinfo()->orderBy('id', 'desc')->paginate(3);

        $data=[
            'user' => $user,
            'jobinfo' => $jobinfo,
        ];

        $data += $this->counts($user);

        return view('users.show',$data);
    }

  public function edit()
    {
      $user=\Auth::user();

      $data=[
          'user' => $user,
      ];

      return view('users.edit',$data);
    }

  public function update(Request $request)
    {
        $rules = [
          'name' => 'required|max:30',
          'details' => 'required|max:800',
        ];

        $messages = [
          'name.required' => '企業名は必ず入力してください',
          'name.max' => '企業名は30字以下で入力してください',
          'details.required' => '企業詳細は必ず入力してください',
          'details.max' => '企業詳細は800字以下で入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
          return back()->withErrors($validator)->withInput();
        }

        $this->validate($request,[
            'name' => 'required|max:30',
            'details' => 'required|max:800',
        ]);

        $user=\Auth::user();
        $jobinfo = $user->jobinfo()->orderBy('id', 'desc')->paginate(3);

        $user->name = $request->name;
        $user->details = $request->details;
        $user->save();

        $data=[
            'user' => $user,
            'jobinfo' => $jobinfo,
        ];

        $data += $this->counts($user);

        return view('users.show',$data);
    }
}
