<div class="mt-5">
    <h5>Historiques :</h5>
    @foreach ($ticket->statuses as $status)
        <div class="d-flex py-3 border-bottom">
            {{--<div class="flex-shrink-0 me-3">
                <div class="avatar-xs">
                    <span class="avatar-title bg-primary bg-soft text-primary rounded-circle font-size-16">
                        N
                    </span>
                </div>
            </div>--}}

            <div class="flex-grow-1">
                {{--<h5 class="mb-1 font-size-15">Neal</h5>--}}
                <p class="text-muted"> {{$status->reason}}.
                </p>
                <ul class="list-inline float-sm-end mb-sm-0">
                    {{--<li class="list-inline-item">
                        <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                    </li>--}}
                </ul>
                <div class="text-muted font-size-12"><i
                        class="far fa-calendar-alt text-primary me-1"></i>
                    {{$status->created_at->format('d-m-Y')}}
                </div>
            </div>
        </div>
    @endforeach

</div>
