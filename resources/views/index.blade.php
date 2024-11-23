@extends('layouts.app');
@section('title','HomePage')

@section('content')
@push('post-style')
    <style>
                .post-item-image{
                  height: 250px;
                }
                .post-content {
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2; /* number of lines to show */
                        line-clamp: 2; 
                -webkit-box-orient: vertical;
              }
              .post-title{
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 1; /* number of lines to show */
                        line-clamp: 1; 
                -webkit-box-orient: vertical;
              }

    </style>
@endpush
<div class="row">
        <div class="col-lg-8">
            <div class="row">
               @if($posts -> count())
                          @foreach ($posts as $post)
                            <div class="col-lg-6 ">
                              <!-- Blog post-->
                              <div class="card mb-4 "  >
                                  <a href="{{route('article',['id' => $post->id])}}"><img class="card-img-top post-item-image"  src="{{ $post-> image }}" alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted">{{ $post -> created_at->format('F d , Y') }}</div>
                                            <h2 class="card-title h4 post-title">{{ $post-> title }}</h2>
                                            <p class="card-text post-content">{{ $post-> content }}</p>
                                            <a class="btn btn-primary" href="{{route('article',['id' => $post->id])}}">Read more →</a>
                                        </div>
                                </div>
                              </div>
                          @endforeach
                  @else
                    <h1>Not Found</h1>
                  @endif
              </div>
          </div>
        <div class="col-lg-4">
           @include('components.search-form')
           @include('components.tag')
        </div>
    </div>
   {{ $posts->links() }}
@endsection