@extends('layouts.app')

@section('title','Article Blogs')
@section('content')
    <div class="row">
        <div class="col-lg-8">
          <!-- Post content-->
          <article>
            <!-- Post header-->
            <header class="mb-4">
              <!-- Post title-->
              <h1 class="fw-bolder mb-1">{{ $post -> title }}</h1>
              <!-- Post meta content-->
              <div class="text-muted fst-italic mb-2">
                Posted on {{$post -> created_at->format('F d, Y')}} by {{$post ->user?->name}}
              </div>
              <!-- Post categories-->
                @foreach ($post->tags as $tag)
                  <a
                  class="badge bg-secondary text-decoration-none link-light"
                  >  {{ $tag->name}} </a>  
                @endforeach
              
             
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4">
              <img
                class="img-fluid rounded"
                src="{{ $post -> image}}"
                alt="..."
              />
            </figure>
            <!-- Post content-->
            <section class="mb-5">
              <p class="fs-5 mb-4">
              {{ $post-> content }}
              </p>
            </section>
          </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
          <!-- Search widget-->
         @include('components.search-form')
          <!-- Tags widget-->
          @include('components.tag')
        </div>
      </div>
@endsection