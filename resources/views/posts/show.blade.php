@extends('pages.layout.app')
@section('content')
    <a href="\posts" class="btn btn-primary">Go Back</a>
    {{-- <h1>{{ $post->title }}</h1>
    <img style="width:100%" src="{{ asset('/storage/cover_images/' . $post->cover_image) }} " alt="blog image">
    
    <br><br>

    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Written on  {{ date('d-M-Y', strtotime($post->created_at)) }} by {{ $post->user->name }}</small>
     --}}
    {{-- ////////////////////this is the template parts////////////// --}}
    <!-- Page Content-->

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="    "
                            alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold"> {{ $post->user->name }}</div>
                            <div class="text-muted">News, Tech</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"> {{ date('d-M-Y', strtotime($post->created_at)) }}
                            </div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded"
                                src="{{ asset('/storage/cover_images/'.$post->cover_image)}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"></p>
                            <p class="fs-5 mb-4"> {!! $post->body !!} </p>
                        </section>
                    </article>
                    
                    <!-- Comments section-->
                    <section>
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4">
                                    <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                </form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        ........
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle"
                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                               ......
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle"
                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                               ..................
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        .......................
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    @if (!Auth::guest())
    <div class="row gx-5">
        @if (Auth::user()->id == $post->user_id)
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">Edit</a>
            <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        @endif
    </div>
    @endif


@endsection
