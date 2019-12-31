<h2 class="mt-5 mb-5">求人一覧</h2>

<div class="jobinfo row mt-5 text-center">

    @foreach ($jobinfo as $key => $jinfo)

        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)

            </div>

            <div class="row text-center mt-3">

        @endif

            <div class="col-lg-4 mb-5">

                <div class="jobinfo text-left d-inline-block">

                    <p>企業名：{!! link_to_route('users.show',$jinfo->user->name,['id'=>$jinfo->user->id]) !!}</p>

                    <div>
                        @if($jinfo)
                            <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$jinfo->url }}?controls=1&loop=1&playlist={{ $jinfo->url }}" frameborder="0"></iframe>
                        @else
                            <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
                        @endif
                    </div>

                    <p class="pr">
                        【PR】
                        @if(isset($jinfo->supplement))
                               {{ $jinfo->supplement }}
                        @endif
                    </p>
                    <p>
                        【職種】
                        @if(isset($jinfo->occupation))
                               {{ $jinfo->occupation }}
                        @endif
                    </p>
                    <p>
                        【勤務地】
                        @if(isset($jinfo->work_location))
                               {{ $jinfo->work_location }}
                        @endif
                    </p>


                    <p>{!! link_to_route('jobinfo.show','求人詳細を表示',['id'=>$jinfo->id]) !!}</p>

                </div>

            </div>

    @endforeach

</div>

{{ $jobinfo->links('pagination::bootstrap-4') }}
