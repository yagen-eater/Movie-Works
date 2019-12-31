@extends('layouts.app')

@section('content')

    <div class="center bg-white">
        <div class="text-center">
            <h1>YouTube × 求人サイト</h1>
        </div>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">新規ユーザー登録</h3>
    </div>

    <div class="form-group mt-5">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '企業名') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('details', '企業詳細') !!}
                    {!! Form::textarea('details', old('details'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('新規登録', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

    </div>

@endsection
