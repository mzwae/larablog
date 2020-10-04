<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-12">
        @auth
        <form method="post" action="{{ route('comment.store', ['article' => $article->id]) }}" class="mb-3">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="comment"></label>
                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="" rows="3" placeholder="Add your comment here..."></textarea>
                    @error('comment')
                    <p class="text-danger">{{ $errors->first('comment') }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="rating">Rate it</label>
                <select class="custom-select" name="rating" id="">
                    <option value="1">1 - lowest rating</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5" selected>5 - highest rating</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endauth


        @if(count($comments) > 0)
            <h2 class="text-center font-weight-lighter m-5">Latest Comments</h2>
            @else
            <h2 class="text-center font-weight-lighter">Be the first to comment &#128522;</h2>
        @endif

        @foreach($comments as $comment)
        <div class="media border p-3 m-5">
            <img src="{{$user->find($comment->commented_id)->avatar}}?set=set2" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
                <h4>{{ $user->find($comment->commented_id)->name }} <small> commented on <i>{{ $comment->created_at }}</i></small></h4>
                <p>{{ $comment->comment }}</p>

                @for($i = $comment->rate; $i > 0; $i--)
                <span class="fa fa-star text-success"></span>
                @endfor
                @for($i = 5-$comment->rate; $i > 0; $i--)
                <span class="fa fa-star"></span>
                @endfor
            </div>
        </div>
        @endforeach
    </div>
</div>
