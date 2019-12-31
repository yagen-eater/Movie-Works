@extends('layouts.app')

@section('content')

    <div class="center bg-white">
        <div class="text-center">
            <h1>YouTube × 求人サイト</h1>
        </div>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">企業情報編集</h3>
    </div>

    <div class="form-group mt-5">

        {!! Form::open(['route' => 'users.update']) !!}
            <div class="form-group">
                {!! Form::label('name', '企業名') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('details', '企業詳細') !!}
                {!! Form::textarea('details', $user->details, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('企業情報更新', ['class' => 'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}

    </div>

@endsection
