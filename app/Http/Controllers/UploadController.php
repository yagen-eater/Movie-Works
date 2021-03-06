<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\JobInfo;
use App\Upload;
use Validator;
use Storage;

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

      if($request->file('resume')){
          $resume = $request->file('resume')->getClientOriginalName();
      }
      if($request->file('CV')){
          $CV = $request->file('CV')->getClientOriginalName();
      }

      $rules = [
        'name' => 'required|max:20',
        'email' => 'required|max:255',
        'tel' => 'required|numeric',
        'resume' => 'required',
        'CV' => 'required',
      ];

      $messages = [
        'name.required' => '名前は必ず入力してください',
        'name.max' => '名前は20字以下で入力してください',
        'email.required' => 'メールアドレスは必ず入力してください',
        'email.max' => 'メールアドレスは255字以下で入力してください',
        'tel.required' => '電話番号は必ず入力してください',
        'tel.numeric' => '電話番号は数字のみで入力してください',
        'resume.required' => '履歴書は必ず添付してください',
        'CV.required' => '職務経歴書は必ず添付してください',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()){
        return back()->withErrors($validator)->withInput();
      }

      //s3アップロード開始
      $resume = $request->file('resume');
      $CV = $request->file('CV');

      //バケットのresumeフォルダにファイルアップロード
      $resume_path = Storage::disk('s3')->putFile('resume', $resume, 'public');
      $CV_path = Storage::disk('s3')->putFile('CV', $CV, 'public');

      //アップロードしたファイルのフルパスを取得
      $resume_upload_path = Storage::disk('s3')->url($resume_path);
      $CV_upload_path = Storage::disk('s3')->url($CV_path);

      $jinfo = JobInfo::find($id);
      $jinfo->uploads()->create([
          'name' => $request->name,
          'email' => $request->email,
          'tel' => $request->tel,
          'resume' => $resume_upload_path,
          'CV' => $CV_upload_path,
      ]);

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
