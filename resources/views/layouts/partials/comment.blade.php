<hr>


<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Latest Comments</h4>
            </div>
            <div class="comment-widgets">
                <!-- Comment Row -->
            @foreach ($comments as $comment)
            <div class="d-flex flex-row comment-row m-t-0">
                <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                <div class="comment-text w-100">
                <h6 class="font-medium">{{ $user->find($comment->commented_id)->name }}</h6>
                <span class="m-b-15 d-block">{{ $comment->comment }}}</span>
                    <div class="comment-footer">
                    <span class="text-muted float-right">{{ $comment->created_at }}</span>
                    </div>
                </div>
            </div>
            @endforeach

            </div> <!-- Card -->
        </div>
    </div>
</div>
