@extends('layouts.master')
@section('content')
    @include('partials.errors')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group {{$errors->has('body')?'has-error':''}}">
                    <textarea name="body" id="new-post" cols="30" rows="10" placeholder="Your Post" class="form-control"></textarea>

                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                {{csrf_field()}}
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{$post->id}}">
                    <p>
                        {{$post['body']}}
                    </p>
                    <div class="info">
                        Posted by {{$post->user->first_name}} on {{$post['created_at']}}
                    </div>
                    <div class="interaction">
                        <a href="#" class="like">Like</a>|
                        <a href="#" class="like">Dislike</a>
                        @if(Auth::user()==$post->user)
                        |
                        <a href="#" class="edit-post">Edit</a>|
                        <a href="{{route('post.delete',['post_id'=>$post['id']])}}">Delete</a>
                            @endif
                    </div>
                </article>
            @endforeach

            <article class="post">
                <p>
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut blanditiis deserunt dolor dolorum eum, fugit illum iste labore nemo nisi, nulla perspiciatis quidem quod recusandae sit tempora. Aliquid, nihil!
                </p>
                <div class="info">
                    Posted by Max on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a>|
                    <a href="#">Dislike</a>|
                    <a href="#">Edit</a>|
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post">
                <p>
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut blanditiis deserunt dolor dolorum eum, fugit illum iste labore nemo nisi, nulla perspiciatis quidem quod recusandae sit tempora. Aliquid, nihil!
                </p>
                <div class="info">
                    Posted by Max on 12 feb 2016
                </div>
                <div class="interaction">
                    <a href="#">Like</a>|
                    <a href="#">Dislike</a>|
                    <a href="#">Edit</a>|
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog"id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body"
                                      id="post-body" cols="30" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        var url="{{route('edit')}}";
        var token="{{csrf_token()}}";
        var urlLike="{{route('like')}}"
    </script>
@endsection

