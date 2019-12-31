@extends('layouts.app')

@section('content')


    <div class="text-right">

        {{ Auth::user()->name }}

    </div>

        <h2 class="mt-5">求人を編集する</h2>

        {!! Form::open(['route'=> ['jobinfo.update', $jinfo->id], 'method' => 'put']) !!}
            <div class="form-group mt-5">

                {!! Form::label('url','新規登録YouTube動画 "ID" を入力する',['class'=>'text-success']) !!}
                    <br>例）登録したいYouTube動画のURLが <span>https://www.youtube.com/watch?v=-bNMq1Nxn5o なら</span>
                    <div>  "v="の直後にある "<span class="text-success">-bNMq1Nxn5o</span>" を入力</div>
                {!! Form::text('url',$jinfo->url,['class'=>'form-control']) !!}

                {!! Form::label('supplement','PRコメント',['class'=> 'mt-3']) !!}
                {!! Form::text('supplement',$jinfo->supplement,['class'=>'form-control']) !!}

                {!! Form::label('occupation','職種',['class'=> 'mt-3']) !!}
                {!! Form::text('occupation',$jinfo->occupation,['class'=>'form-control']) !!}

                {!! Form::label('work_location','勤務地',['class'=> 'mt-3']) !!}
                {!! Form::text('work_location',$jinfo->work_location,['class'=>'form-control']) !!}

                {!! Form::label('employment_status','雇用形態',['class'=> 'mt-3']) !!}
                {!! Form::text('employment_status',$jinfo->employment_status,['class'=>'form-control']) !!}

                {!! Form::label('job_description','仕事内容',['class'=> 'mt-3']) !!}
                {!! Form::text('job_description',$jinfo->job_description,['class'=>'form-control']) !!}

                {!! Form::label('salary','給与',['class'=> 'mt-3']) !!}
                {!! Form::text('salary',$jinfo->salary,['class'=>'form-control']) !!}

                {!! Form::label('working_hours','勤務時間',['class'=> 'mt-3']) !!}
                {!! Form::text('working_hours',$jinfo->working_hours,['class'=>'form-control']) !!}

                {!! Form::label('holiday','休日',['class'=> 'mt-3']) !!}
                {!! Form::text('holiday',$jinfo->holiday,['class'=>'form-control']) !!}

                {!! Form::label('welfare','福利厚生',['class'=> 'mt-3']) !!}
                {!! Form::text('welfare',$jinfo->welfare,['class'=>'form-control']) !!}


                {!! Form::submit('求人を更新する',['class'=> 'button btn btn-primary mt-5 mb-5']) !!}

            </div>
        {!! Form::close() !!}

@endsection
