@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(App::isLocale('en'))

                @foreach($enPosts as $enPost)
                    <div class="card mt-5">
                        <div class="card-header">{{ $enPost->title_in_english }}</div>

                        <div class="card-body">
                            <p>{{ $enPost->body_in_english }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($mmPosts as $mmPost)
                    <div class="card mt-5">
                        <div class="card-header">{{ $mmPost->title_in_myanmar }}</div>

                        <div class="card-body">
                            <p>{{ $mmPost->body_in_myanmar }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
