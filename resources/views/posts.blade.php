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

    .image-container {
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    img {
        width: 15%;
        height: auto;
        border: 1px solid black;
        margin: 10px;
        padding: 5px;
        float: left;
        margin-right: 10px;
        opacity: 0.8;
    }

    p {
        overflow: hidden;
    }


</style>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">My Blog!</h1>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>                
                <div>
                @forelse($posts as $post)
                    <div class="card">
                    <ul>
                        <h2><li><a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li></h2>
                    </ul>

                    <div class="image-container">
                        <img class="img" src="{{ asset('/image/'.$post->image) }}" alt="blog image">
                        <p>{!! Str::limit($post->body, 500, '...') !!}</p>
                    </div>
                    </div>
                    @empty
                    <p class="text-warning">No blog Posts available</p>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection