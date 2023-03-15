@extends('app')
@section('content')

<style>
    .card {
        background-color: #CCE5FF;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,.2);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 16px;
        line-height: 1.5;
        color: #000;
    }

    img {
        width: 50%;
        height: auto;
        border: 1px solid black;
        margin: 10px;
        padding: 5px;
        float: left;
        margin-right: 10px;
        opacity: 1.0;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class = "card">
                <h1 class="display-one">{{ ucfirst($posts->title) }}</h1>
                <img class="img" src="{{ asset('/image/'.$posts->image) }}" alt="blog image">
                <p>{!! $posts->body !!}</p> 
                </div>
                <hr>
                <a href="/blog/{{ $posts->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection