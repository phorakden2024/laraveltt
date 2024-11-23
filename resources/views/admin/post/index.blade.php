@extends('layouts.app')
@section('title','Post List')
@section('content')

       <div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>POST LIST</h3>
          <a class="btn btn-success" href="{{route('admin.post.create')}}" role="button"
            >Create</a
          >
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
          <div class="card p-3">
            <table
              id="datatable"
              class="table table-striped"
              style="width: 100%"
            >
              <thead>
                <tr  style="text-align:center">
                  <th>No</th>
                  <th>Author</th>
                  <th>Post Date</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
          
              <tbody>
                    @foreach ($post as $posts)
                      <tr>
                          <!-- Auto-increment Numbers in Pagination -->
                            <td>{{$loop-> iteration + ($post-> currentPage()-1) * $post-> perPage() }}</td>
                            <td>{{$posts ->user?-> name}}</td>
                            <td>{{$posts -> created_at->format('M d, Y')}}</td>
                            <td><img src="{{ $posts -> image}}" style="width:50px"></td>
                            <td>{{$posts->title}}</td>
                            <td>{{$posts-> Category-> name}}</td>
                            <td>
                                <ul s> 
                                    @foreach ($posts->tags as $tag)
                                    {{ $tag->name}} 
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                  <a class="btn btn-primary "  style="border-right-width: 20px " href="{{ route('admin.post.edit',['id'=>$posts->id])  }}}" role="button" >Edit </a >
                                    <form method="POST" action="{{ route ('admin.post.destroy',['id'=>$posts->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                      <button type="submit" role="button " class="btn btn-danger " >
                                      Delete 
                                      </button>
                                    </form>
                            </td>
                       </tr>
                    @endforeach
              </tbody>
            </table>
             
          </div>
        </div>
      </div>
    </div>
      </div>
       {{ $post->links() }}
@endsection