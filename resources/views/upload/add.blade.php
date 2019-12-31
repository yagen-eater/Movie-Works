@extends('layouts.app')

@section('content')

    <div class="center bg-white">
        <div class="text-center">
            <h1>YouTube × 求人サイト</h1>
        </div>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">求人応募</h3>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['upload.store', $jinfo->id], 'files' => 'true']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tel', '電話番号') !!}
                    {!! Form::text('tel', old('tel'), ['class' => 'form-control']) !!}
                </div><br>

                <div class="form-group">
                    {!! Form::label('resume', '履歴書') !!}
                    <br>
                    {!! Form::file('resume', ['class' => '']) !!}
                </div><br>

                <div class="form-group">
                    {!! Form::label('CV', '職務経歴書') !!}
                    <br>
                    {!! Form::file('CV', ['class' => '']) !!}
                </div><br>

                {!! Form::submit('求人へ応募する', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>

@endsection
