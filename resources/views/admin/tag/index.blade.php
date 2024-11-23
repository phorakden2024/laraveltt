@extends('layouts.app');
@section('title','Tags List')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>tag List</h3>
          <a class="btn btn-success" href="{{route('admin.tag.create')}}" role="button"
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
                <tr>
                  <th>No</th>
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag)
                <tr>
                  <td>{{$loop -> iteration}}</td>
                  <td>{{$tag -> name}}</td>
                  <td>
                    <a class="btn btn-primary " style="border-right-width: 20px"href="{{ route('admin.tag.edit',['id'=>$tag->id])  }}"role="button">Edit </a>
           
                   <form method="POST" action="{{ route ('admin.tag.destroy',['id'=>$tag->id]) }}">
                      @method('DELETE')
                      @csrf
                    <button type="submit" role="button" class="btn btn-danger  ">
                      Delete
                    </button>
                  </form>
                   
                  </td>
                </tr>
                  @endforeach
                   @if (Session::has('CreateSuccessfully'))
                      <script>
                        swal("Message","{{ Session::get('CreateSuccessfully')}}" , 'success',{
                          button:true,
                          button:"OK",
                        });
                      </script>
                  @endif
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
@endsection