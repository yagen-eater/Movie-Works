<div class="row mt-5 text-center">

    @foreach ($jobinfo as $key => $jinfo)

        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)

            </div>

            <div class="row text-center mt-3">

        @endif

            <div class="col-lg-4 mb-5">

                <div class="movie text-left d-inline-block">

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

                    @if(Auth::id() == $jinfo->user_id)
                        {!! Form::open(['route' => ['upload.show', $jinfo->id], 'method' => 'get']) !!}
                            {!! Form::submit('この求人への応募を確認する', ['class' => 'button btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @endif

                    <br>

                    @if(Auth::id() == $jinfo->user_id)
                        {!! Form::open(['route' => ['jobinfo.edit', $jinfo->id], 'method' => 'get']) !!}
                            {!! Form::submit('この求人を編集する', ['class' => 'button btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @endif

                    <br>

                    @if(Auth::id() == $jinfo->user_id)
                        {!! Form::open(['route' => ['jobinfo.destroy', $jinfo->id], 'method' => 'delete']) !!}
                            {!! Form::submit('この求人を削除する', ['class' => 'button btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endif

                </div>

            </div>

    @endforeach

</div>

{{ $jobinfo->links('pagination::bootstrap-4') }}
