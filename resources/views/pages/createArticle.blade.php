@extends('layouts.app')

@section('content')

<div class="creatediv">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    @endif
    <form action="/create" method="post" enctype="multipart/form-data">
        @csrf
        <p class="h1">Title:</p>
        <input type="text" id="title" name="title" class="txtitle" placeholder="Title...">
        <p class="h1">Article:</p>
        <textarea name="article" class="txtarea" placeholder="Write your article here..." rows="6" ></textarea>        
        <label class="file-upload">
            <input type="file" name="image" ><br>
        </label>
        <input type="submit" class="" value="Add Article">
    </form>
</div>

<br>
<br>
<br>
<br>
<br>


@endsection
