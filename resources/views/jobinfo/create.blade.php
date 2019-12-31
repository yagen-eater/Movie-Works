@extends('layouts.app')

@section('content')


    <div class="text-right">

        {{ Auth::user()->name }}

    </div>

        <h2 class="mt-5">求人を登録する</h2>

        {!! Form::open(['route'=>'jobinfo.store']) !!}
            <div class="form-group mt-5">

                {!! Form::label('url','求人PR動画登録（YouTube動画 "ID" を入力）') !!}
                    <br>例）登録したいYouTube動画のURLが <span>https://www.youtube.com/watch?v=1zua76Q0R9U なら</span>
                    <div>  "v="の直後にある "<span class="text-success">1zua76Q0R9U</span>" を入力</div>
                {!! Form::text('url',null,['class'=>'form-control']) !!}

                {!! Form::label('supplement','PRコメント',['class'=> 'mt-3']) !!}
                {!! Form::text('supplement',null,['class'=>'form-control']) !!}

                {!! Form::label('occupation','職種',['class'=> 'mt-3']) !!}
                {!! Form::text('occupation',null,['class'=>'form-control']) !!}

                {!! Form::label('work_location','勤務地',['class'=> 'mt-3']) !!}
                {!! Form::text('work_location',null,['class'=>'form-control']) !!}

                {!! Form::label('employment_status','雇用形態',['class'=> 'mt-3']) !!}
                {!! Form::text('employment_status',null,['class'=>'form-control']) !!}

                {!! Form::label('job_description','仕事内容',['class'=> 'mt-3']) !!}
                {!! Form::text('job_description',null,['class'=>'form-control']) !!}

                {!! Form::label('salary','給与',['class'=> 'mt-3']) !!}
                {!! Form::text('salary',null,['class'=>'form-control']) !!}

                {!! Form::label('working_hours','勤務時間',['class'=> 'mt-3']) !!}
                {!! Form::text('working_hours',null,['class'=>'form-control']) !!}

                {!! Form::label('holiday','休日',['class'=> 'mt-3']) !!}
                {!! Form::text('holiday',null,['class'=>'form-control']) !!}

                {!! Form::label('welfare','福利厚生',['class'=> 'mt-3']) !!}
                {!! Form::text('welfare',null,['class'=>'form-control']) !!}


                {!! Form::submit('求人を新規登録する',['class'=> 'button btn btn-primary mt-5 mb-5']) !!}

            </div>
        {!! Form::close() !!}

        <h2 class="mt-5">登録済み求人一覧</h2>

        @include('users.jobinfo', ['jobinfo'=>$jobinfo])

@endsection
