@extends('layouts.app')

@section('content')

  <div class="row mt-5 text-center">

      <div class="col-lg-6 mb-5 border-right">
          <h2 class="border-bottom pb-3">応募された求人</h2><br>

          <div class="text-left ml-4">
              @if($jinfo)
                  <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$jinfo->url }}?controls=1&loop=1&playlist={{ $jinfo->url }}" frameborder="0"></iframe>
              @else
                  <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
              @endif
          </div>

          <p class="text-left ml-4">
              @if(isset($jinfo->supplement))
                     {{ $jinfo->supplement }}
              @endif
          </p><br>
          <p class="text-left ml-4">【職種】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->occupation))
                     {{ $jinfo->occupation }}
              @endif
          </p><br>
          <p class="text-left ml-4">【勤務地】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->work_location))
                     {{ $jinfo->work_location }}
              @endif
          </p><br>
          <p class="text-left ml-4">【雇用形態】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->employment_status))
                     {{ $jinfo->employment_status }}
              @endif
          </p><br>
          <p class="text-left ml-4">【仕事内容】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->job_description))
                     {{ $jinfo->job_description }}
              @endif
          </p><br>
          <p class="text-left ml-4">【給与】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->salary))
                     {{ $jinfo->salary }}
              @endif
          </p><br>
          <p class="text-left ml-4">【勤務時間】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->working_hours))
                     {{ $jinfo->working_hours }}
              @endif
          </p><br>
          <p class="text-left ml-4">【休日】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->holiday))
                     {{ $jinfo->holiday }}
              @endif
          </p><br>
          <p class="text-left ml-4">【福利厚生】</p>
          <p class="text-left ml-4">
              @if(isset($jinfo->welfare))
                     {{ $jinfo->welfare }}
              @endif
          </p><br>

      </div>

      <div class="col-lg-6 mb-5">
          <h2 class="border-bottom pb-3">応募状況</h2><br>

          @foreach ($uploads as $key => $upload)

          <div class="border-bottom mt-3">
              <p class="text-left ml-4">
                  【応募日時】
                  @if(isset($upload->created_at))
                         {{ $upload->created_at }}
                  @endif
              </p>

              <p class="text-left ml-4">
                  【名前】
                  @if(isset($upload->name))
                         {{ $upload->name }}
                  @endif
              </p>

              <p class="text-left ml-4">
                  【メールアドレス】
                  @if(isset($upload->email))
                         {{ $upload->email }}
                  @endif
              </p>

              <p class="text-left ml-4">
                  【電話番号】
                  @if(isset($upload->tel))
                         {{ $upload->tel }}
                  @endif
              </p>

              <p class="text-left ml-4"><a href="{{ $upload->resume }}">履歴書ダウンロード</a></p>
              <p class="text-left ml-4"><a href="{{ $upload->CV }}">職務経歴書ダウンロード</a></p>

          </div>

          @endforeach

      </div>

  </div>

  {{ $uploads->links('pagination::bootstrap-4') }}

@endsection
