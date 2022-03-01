<div class="card-body">
    @foreach ($posts as $item)
        {{ $item->name }} 

        {{ $item->active }} <br>
    @endforeach
 </div>
{!! $posts->appends(request()->input())->links()  !!}