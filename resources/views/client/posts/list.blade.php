@extends('layouts.client')

@section('title', 'Терпени | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'HEMPLY.CLUB - Актуальні новини та тренди конопляного світу. Інформаційний ресурс про коноплі українською')

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">Публікації</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Публікації</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <section class="pt-4 pb-4">
        <div class="container">

            <div class="content pt-4">
                <div class="row">

                    <div class="row">
                        <div class="col-12">

                            <div class="category mb-5">
                                <ul class="nav justify-content-center nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 {{ (isset($category)) ? "" : "active" }}" aria-current="page" href="{{ route('articles') }}">Всі</a>
                                    </li>

                                    @foreach($categories as $item)
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 {{ (isset($category) && $item->id == $category->id) ? 'active' : '' }}" href="{{ route('category.articles', $item->slug) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="row">
                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                        <div class="card card-post">
                                            <div class="image">
                                                <a href="{{ route('category.articles', $post->category->slug) }}" class="badge bg-primary category">
                                                    <span>{{ $post->category->title }}</span>
                                                </a>
                                                <a href="{{ route('article', 'marijuana') }}">
                                                    <img src="{{ $post->image ?? '/storage/images/default.jpg' }}" alt="{{ $post->title }}" class="img-fluid">
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
                                                        20.04.2023
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-warning">Публікацій не знайдено</div>
                            @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .content -->
        </div>
    </section>
@endsection
