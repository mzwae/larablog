<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-6">
        @auth
        <form method="post" action="{{ route('comment.store', ['article' => $article->id]) }}" class="mb-3">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="comment"></label>
                    <textarea class="form-control" name="comment" id="" rows="3" placeholder="Add your comment here..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="rating">Rate it</label>
                <select class="form-control" name="rating" id="">
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
        <div class="card">
            <div class="card-body text-center">
                @if(count($comments) > 0)
                <h4 class="card-title">Latest Comments</h4>
                @else
                <h4 class="card-title">Be the first to comment &#128522;</h4>
                @endif
            </div>
            <div class="m-3">
                <!-- Comment Row -->
                @foreach ($comments as $comment)
                <div class="d-flex">
                    <div class="p-2">
                        <img src="{{$user->find($comment->commented_id)->avatar}}?set=set2" alt="profile image" class="rounded-circle mr-2" width="50" height="50">
                    </div>
                    <div class="w-100">
                        <h5>{{ $user->find($comment->commented_id)->name }}</h5>
                        <small class="text-muted float-right">{{ $comment->created_at }}</small>
                        <p>{{ $comment->comment }}</p>
                        <p>Rate: {{ $comment->rate }} out of 5</p>

                        @for($i = $comment->rate; $i > 0; $i--)
                        <span class="fa fa-star checked text-success"></span>
                        @endfor

                    </div>
                </div>
                <hr>
                @endforeach

            </div> <!-- Card -->
        </div>
    </div>
</div>
