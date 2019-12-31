@extends('layouts.app')

@section('content')

<h1 class="mb-5">企業名：{{ $user->name }}</h1>

  <h3>企業詳細</h3>
  <p class="border-left ml-3">{!! nl2br($user->details) !!}</p>

{!! Form::open(['route' => ['users.edit'], 'method' => 'get']) !!}
    {!! Form::submit('企業情報を編集する', ['class' => 'button btn btn-primary']) !!}
{!! Form::close() !!}

<ul class="nav nav-tabs nav-justified mt-5 mb-2">
        <li class="nav-item nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show',['id'=>$user->id]) }}">公開中の求人<br><div class="badge badge-secondary">{{ $count_jobinfo }}</div></a></li>
</ul>

@include('jobinfo.jobinfo', ['jobinfo' => $jobinfo])

@endsection
