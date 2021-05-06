@extends('layouts.app')

@section('content')
<div class="para">
    <div class="paralax">
    </div>
    <div id=container>
        <h1>HalpyBlog</h1>
        <span>Abdelhalim LAKFIFI</span>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach($posts as $post)
    <!-- dd($post->img_path)  -->
    <div class="col">
        <div class="card h-100">
            <img src="{{ URL::asset('Blog_images/'.$post->img_path)}}" width="300" height="300" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> {{ $post->Title }} </h5>
                <p class="card-text"> {{ substr($post->article,0,150)."..." }} </p>
                    <a href="/articles/{{ $post->id }}" class="btn btn-primary">Read More</a>
            </div>
            <div class="card-footer">
                <?php $na = App\Models\User::where('id', $post->user_id)->get() ?>
                <small class="text-muted"> Created by {{ $na[0]->name }} </small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection