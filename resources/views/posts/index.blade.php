@extends('pages.layout.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    {{-- <div class="well">
                <div class="row">
                    <div class="col -md-4 col-sm-4">
                        <img style="width:100%" src="{{ asset('/storage/cover_images/' . $post->cover_image) }}" alt="">
                        {{-- <img style="width:100%" src="/storage/cover_images{{$post->cover_image}}" alt=""> --}}
    {{-- </div>
                    <div class="col -md-8 col-sm-8">
                        <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                        <small>Written on {{ date('d-M-Y', strtotime($post->created_at)) }} by {{ $post->user->name }}</small>

                    </div>

                </div> --}}

    {{-- </div> --}}
    {{-- this is the template --}}
    @if (count($posts) > 0)
        <section class="py-5">

            <div class="container px-5">
                <h1 class="fw-bolder fs-5 mb-4">Company Blog</h1>
                <div class="card border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row gx-0">
                            @foreach ($posts as $post)
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                        <div class="h2 fw-bolder">{{ $post->title }}</div>
                                        <p> {!! $post->body !!}</p>
                                        <a class="stretched-link text-decoration-none" href="/posts/{{ $post->id }}">
                                            Read more
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7">
                                    <div class="bg-featured-blog"
                                        style="background-image: url('{{ asset('/storage/cover_images/' . $post->cover_image) }}')">
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="py-5 bg-light">
            <div class="container px-5">
                <div class="row gx-5">
                    @foreach ($posts as $post)
                        <div class="col-xl-8">
                            <h2 class="fw-bolder fs-5 mb-4">News</h2>
                            <!-- News item-->
                            <div class="mb-4">
                                <div class="small text-muted">{{ date('d-M-Y', strtotime($post->created_at)) }}</div>
                                <a class="link-dark" href="#!">
                                    <h3>Start Bootstrap releases Bootstrap 5 updates for templates and themes</h3>
                                </a>
                            </div>
                            <!-- News item-->

                            <div class="mb-5">
                                <div class="small text-muted">{{ date('d-M-Y', strtotime($post->created_at)) }}</div>
                                <a class="link-dark" href="#!">
                                    <h3>This is another news article headline, but this one is a little bit longer</h3>
                                </a>
                            </div>
                            <div class="text-end mb-5 mb-xl-0">
                                <a class="text-decoration-none" href="#!">
                                    More news
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card border-0 h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex h-100 align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="h6 fw-bolder">Contact</div>
                                            <p class="text-muted mb-4">
                                                For press inquiries, email us at
                                                <br />
                                                <a href="#!">press@domain.com</a>
                                            </p>
                                            <div class="h6 fw-bolder">Follow us</div>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i
                                                    class="https://www.facebook.com/"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                            <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5">
                <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
                <div class="row gx-5">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!">
                                        <div class="h5 card-title mb-3"> </div>
                                    </a>
                                    <p class="card-text mb-0"> </p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3"
                                                src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold"> </div>
                                                <div class="text-muted">
                                                    &middot; 6 min
                                                    read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- //////////////////////////////////////////////////////////////////// --}}

                </div>
                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-decoration-none" href="#!">
                        More stories
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        {{-- {{ $posts->links() }} --}}
    @else
        <p>NO posts found</p>
    @endif
@endsection
