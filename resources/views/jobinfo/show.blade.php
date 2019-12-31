@extends('layouts.app')

@section('content')

    <h1 class="border-bottom pb-3">企業名：{{ $jinfo->user->name }}</h1><br>

    <div class="text-large col-lg-12 mb-5 text-center border-left border-right">

        <div>
            @if($jinfo)
                <iframe width="580" height="326.25" src="{{ 'https://www.youtube.com/embed/'.$jinfo->url }}?controls=1&loop=1&playlist={{ $jinfo->url }}" frameborder="0"></iframe>
            @else
                <iframe width="580" height="326.25" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
            @endif
        </div>

        <p>
            【PR】
            @if(isset($jinfo->supplement))
                   {{ $jinfo->supplement }}
            @endif
        </p><br>

        <p>【職種】</p>
        <p>
            @if(isset($jinfo->occupation))
                   {{ $jinfo->occupation }}
            @endif
        </p><br>
        <p>【勤務地】</p>
        <p>
            @if(isset($jinfo->work_location))
                   {{ $jinfo->work_location }}
            @endif
        </p><br>
        <p>【雇用形態】</p>
        <p>
            @if(isset($jinfo->employment_status))
                   {{ $jinfo->employment_status }}
            @endif
        </p><br>
        <p>【仕事内容】</p>
        <p>
            @if(isset($jinfo->job_description))
                   {{ $jinfo->job_description }}
            @endif
        </p><br>
        <p>【給与】</p>
        <p>
            @if(isset($jinfo->salary))
                   {{ $jinfo->salary }}
            @endif
        </p><br>
        <p>【勤務時間】</p>
        <p>
            @if(isset($jinfo->working_hours))
                   {{ $jinfo->working_hours }}
            @endif
        </p><br>
        <p>【休日】</p>
        <p>
            @if(isset($jinfo->holiday))
                   {{ $jinfo->holiday }}
            @endif
        </p><br>
        <p>【福利厚生】</p>
        <p>
            @if(isset($jinfo->welfare))
                   {{ $jinfo->welfare }}
            @endif
        </p><br>

        @if(Auth::id() == '')
          <p>{!! link_to_route('upload.add','求人に応募する',['id'=>$jinfo->id]) !!}</p>
        @endif

    </div>

@endsection
