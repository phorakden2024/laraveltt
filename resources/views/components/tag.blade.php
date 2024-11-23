 <div class="card mb-4">
            <div class="card-header">Tags</div>
            <div class="card-body">
              <div class="row">
                    @foreach ($sildebar_tags as $sildebar_tag)
                                    <div class="col-sm-6">
                                    <a href="{{ route('home',['tag_id' => $sildebar_tag-> id]) }}">{{ $sildebar_tag-> name}}</a>
                                        </div>
                    @endforeach
                    
                    
                  

                </div>
              </div>
            </div>
          </div>