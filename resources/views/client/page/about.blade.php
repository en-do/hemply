@extends('layouts.client')

@section('title', 'Про проект | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'Місія та ціль проекту | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">Проект</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Проект</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <section class="pt-5 pb-5">
        <div class="container">

            <div class="text-center">
                <h1 class="fs-3 text-primary fw-bold text-uppercase mb-4">Ваша подорож світом конопель розпочинається!</h1>

                <p>Проект <span class="fw-bold text-uppercase">Hemply</span> є найбільш надійним місцем в Україні, де можна знайти структуровано інформацію про властивості чи актуальні новини. Понад 100 мільйонів людей щороку відвідують різні ресурс, аби дізнатися більше про коноплі.</p>

                <h2 class="fs-4 fw-bold">Культивування чесної та справедливої спільноти</h2>

                <p>Ми віримо, що коноплі можуть бути силою позитивних змін у нашому світі — і що ми несемо унікальну відповідальність за створення індустрії конопель, в якій можуть процвітати спільноти.</p>
            </div>

            <div class="row justify-content-center pt-4">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-2 text-uppercase fw-bold">Всього сортів</h5>
                            <div class="badge bg-primary fs-6">1000</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-2 text-uppercase fw-bold">Всього публікацій</h5>
                            <div class="badge bg-primary fs-6">100</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="content pt-5 pb-5">
        <div class="container">
            <div class="heading pb-4">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('articles') }}" class="btn-link fw-bold">Всі публікації</a>
                        <h2 class="title fw-bold">Публікації</h2>
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
                                                {{ $post->created_at->format('d-m-Y') }}
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
