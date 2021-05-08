@extends('layouts.app')

@section('content')
<div class="blog-single gray-bg">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-8 m-15px-tb">
                <article class="article">
                    <div class="article-img">
                        <img src="{{ URL::asset('Blog_images/'.$post[0]->img_path) }}" width="800" height="350" title=""
                            alt="">
                    </div>
                    <div class="article-title">

                        <h2> {{ ucfirst($post[0]->Title) }} </h2>
                        <div class="media">
                            <!-- <div class="avatar"> -->
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt=""> -->
                            <!-- </div> -->
                            <div class="media-body">
                                <label> {{ $name[0]->name }} </label>
                                <span> {{ $post[0]->created_at }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        {{ $post[0]->article }}
                    </div>
                </article>
                <div class="contact-form article-comment">
                    <h4>Leave a Reply</h4>
                    <form id="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="Email" id="email" placeholder="Email *" class="form-control"
                                        type="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Your message *" rows="4"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="send">
                                    <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 m-15px-tb blog-aside">
                <!-- Author -->
                <div class="widget widget-author">
                    <div class="widget-title">
                        <h3>Author</h3>
                    </div>
                    <div class="widget-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h6>Hello, I'm<br> {{ $name[0]->name }}</h6>
                                @if( $name[0]->id != Auth::id())
                                    @if( $ifFollowed == 1)
                                        <button type="submit" onclick="unfollow()" class="btn btn-outline-danger float-right" id="follow" >Unfollow</button>
                                    @else
                                        <button type="submit" onclick="follow()" class="btn btn-outline-success float-right" id="follow" >Follow</button>   
                                    @endif
                                    
                                    <!-- /follow/{{$name[0]->id}} -->
                                    <script>
                                        function follow(){
                                            var id = {{ $name[0]->id }};
                                            var data = { idfollow: id };
                                            $.ajax({
                                                url: "/follow",
                                                method: "post",
                                                data: data,
                                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                
                                                success: function (result){
                                                    document.getElementById("follow").className = "btn btn-danger float-right";
                                                    document.getElementById("follow").innerHTML = "Unfollow";
                                                    document.getElementById("follow").onclick = unfollow;
                                                    
                                                }
                                            });
                                        }
                                        function unfollow(){
                                            var author_id = {{ $name[0]->id }};
                                            var data = { author_id: author_id };
                                            $.ajax({
                                                url: "/unfollow",
                                                method: "post",
                                                data: data,
                                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                
                                                success: function (result){
                                                    document.getElementById("follow").className = "btn btn-success float-right";
                                                    document.getElementById("follow").innerHTML = "follow";
                                                    document.getElementById("follow").onclick = follow;   
                                                }
                                            });
                                        }
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Author -->
                <!-- Latest Post -->
                <div class="widget widget-latest-post">
                    <div class="widget-title">
                        <h3>Latest Post</h3>
                    </div>
                    <div class="widget-body">
                        @foreach($latests as $latest)

                        <div class="latest-post-aside media">
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h5><a href="#"> {{ $latest->Title }} </a></h5>
                                </div>
                                <div class="lpa-meta">
                                    <p class="date" href="#">
                                    {{ $latest->created_at }}
                                </p>
                                </div>
                            </div>
                            <div class="lpa-right">
                                <a href="#">
                                
                                    <img src=" {{ URL::asset('Blog_images/'.$latest->img_path ) }} " title="" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Latest Post -->
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
@endsection
