@extends('layouts.app')

@section('content')

    <div class="center bg-white">

        <div class="text-center">
            <h1>YouTube × 求人サイト</h1><br>
            <div class="center">
              {!! Form::open(['action'=>'UsersController@index']) !!}
                <label for="occupation">職種：</label>
                <input id="occupation" type="text" name="occupation" value="{{$occupation}}">
                <label for="work_location">　勤務地：</label>
                <input id="work_location" type="text" name="work_location" value="{{$work_location}}">
                <div class="center">
                  <input class="btn btn-primary mt-2" type="submit" name="submit" value="検索">
                </div>
              {!! Form::close() !!}
            </div>
        </div>

        <div class="text-right">

        @if(Auth::check())
            <p class="border-bottom pb-3">企業名：{{ Auth::user()->name }}</p>
        @endif

        </div>

    </div>

    @include('users.jobinfo', ['jobinfo'=>$jobinfo])

@endsection
