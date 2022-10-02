@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>By : <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> in
                    <a href="/blog?category={{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p>

                {{-- lakukan pengecekan, jika user tidak upload gambar, maka gunakan gambar dari unsplash
                jika user upload gambar, maka gunakan gambar yang diupload tersebut --}}
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}"alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}"alt="{{ $post->category->name }}" class="img-fluid">
                @endif


                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/blog">Back to Post</a>
            </div>
        </div>
    </div>
@endsection
