@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    {{-- user() : adalah nama tabel yang valuenya akan dipanggil --}}
    {{-- name : adalah nama field tabel yang ada di table user --}}
    <h1 class="h2"> Create New Post </h1>
</div> 

<div class="col-lg-8">
    <form action="/dashboard/posts" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly>
          @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
            {{-- untuk mengecek pilihan sebelumnya ketika inputan salah/ old untuk option class --}}
              @if(old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach
          </select>
        </div>

        {{-- Post Image --}}
        <div class="mb-3">
          <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>

          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
          {{-- untuk menampilkan preview gambar dengan menggunakan javascript, script js ada di bawah --}}
          <img class="img-preview img-fluid mt-3 col-sm-5">
          @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- /* Post Image --}}

        {{-- Post Body --}}
        <div class="mb-3">
          <label for="category" class="form-label">Body</label>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

{{-- untuk mengisi form slug secara otomatis --}}
<script>
  // -----------------------------------------------------> cara membuat slug 1 (menggunakan library sluggable) :
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });


  // -----------------------------------------------------> cara membuat slug 2 (menggunakan javascript biasa) :
        // const title = document.querySelector("#title");
        // const slug = document.querySelector("#slug");

        // title.addEventListener("keyup", function() {
        //     let preslug = title.value;
        //     preslug = preslug.replace(/ /g,"-");
        //     slug.value = preslug.toLowerCase();
        // });

  
  // script untuk mendisable fitur upload file di trix editor 
  document.addEventListener('trix-file-accept', function(e){
    e.prevent.default
  });

  // untuk membuat preview gambar
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection