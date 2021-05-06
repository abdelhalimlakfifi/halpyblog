@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($posts as $post)
    <div class="col-sm-6 h-100">
        <div class="card">
            <img class="card-img-top" src="{{ URL::asset('Blog_images/'.$post->img_path)}}" height="300" alt="Card image cap">

            <div class="card-body">
                <h5 class="card-title">{{ $post->Title }}</h5>
                <p class="card-text"> {{ substr($post->article,0,150)."..." }}</p>
                <a href="/articles/{{ $post->id }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
