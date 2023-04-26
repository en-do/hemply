@extends('layouts.client')

@section('title', $post->title . ' | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'HEMPLY.CLUB - Інформаційний ресурс про коноплі українською.' . $post->title)


@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">{{ $post->title }}</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>

                <div class="post-meta d-flex">
                    <div class="author me-3 d-flex">
                        <div class="image">
                            <img src="/storage/images/author.jpg" alt="author">
                        </div>
                        <div class="username">
                            Andy Kh
                        </div>
                    </div>

                    <div class="date me-3 d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 12l3 2"></path>
                            <path d="M12 7v5"></path>
                        </svg>
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="pt-4 pb-5">
        <div class="container">
            @if($post->image)
                <div class="post-image">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
                </div>
            @endif

            <div class="content">
                {!! $post->description !!}
            </div>

            <div class="tags d-flex pt-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z"></path>
                    <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                    <path d="M6 9h-.01"></path>
                </svg>

                <div class="content ms-1">
                    <div class="badge bg-primary me-1">THC</div>
                    <div class="badge bg-primary me-1">THC</div>
                    <div class="badge bg-primary me-1">THC</div>
                    <div class="badge bg-primary me-1">THC</div>
                </div>
            </div>

        </div>
    </section>

    <section class="content bg-light pt-5 pb-5">
        <div class="container">
            <div class="heading pb-4">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('articles') }}" class="btn-link fw-bold">Всі публікації</a>
                        <h2 class="title fw-bold">Схожі публікації</h2>
                    </div>

                    <div class="col-6 text-end">
                    </div>
                </div>
            </div>

            <div class="content">
                @if($posts->count() > 0)
                    <div class="row">

                        @foreach($posts as $post)
                            <div class="col-12 col-md-4 mb-4">
                                <div class="card card-post">
                                    <div class="image">
                                        <a href="{{ route('category.articles', $post->category->slug) }}" class="badge bg-primary category">
                                            <span>{{ $post->category->title }}</span>
                                        </a>
                                        <a href="{{ route('article', $post->slug) }}">
                                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <a href="{{ route('article', $post->slug) }}">{{ $post->title }}</a>
                                        </div>

                                        <div class="intro">
                                            <p class="mb-0">Якщо тобі 30+ років, то революція в галузі легалізації марихуани розгортається прямо в...</p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex">
                                            <div class="author d-flex">
                                                <div class="image">
                                                    <img src="/storage/images/author.jpg" alt="author">
                                                </div>
                                                <div class="username">
                                                    Andy Kh
                                                </div>
                                            </div>

                                            <div class="date text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                                    <path d="M12 12l3 2"></path>
                                                    <path d="M12 7v5"></path>
                                                </svg>
                                                <span class="ps-1 mt-1">{{ $post->created_at->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">
                        Записів не знайдено
                    </div>
                @endif
            </div><!-- .content -->
        </div>
    </section>
@endsection
