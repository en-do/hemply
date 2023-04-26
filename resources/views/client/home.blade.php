@extends('layouts.client')

@section('title', 'HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'HEMPLY.CLUB - Інформаційний ресурс про коноплі українською. Актуальні новини та тренди конопляного світу')

@section('content')
    @if(false)
        <section class="content strain_search">
        <div class="container">

            <div class="heading mb-2 text-center">
                <h2 class="mb-0 fs-3 fw-bold text-uppercase">Знайти сорт в каталозі</h2>
            </div>

            <div class="description text-center">
                <p>Знайти стрейн та розкрий всі седативні властивості</p>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-12 col-md-7 col-lg-5">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Введіть назву сорту">
                        <button class="btn btn-primary">Знайти</button>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif

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

    <section class="content strains pt-5 pb-5">
        <div class="container">
            <div class="heading pb-5">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('strains') }}" class="btn-link fw-bold mt-2 pt-1">Всі сорти</a>
                        <h2 class="title fw-bold mb-1">Сорти (Стрейни)</h2>
                    </div>

                    <div class="col-6 text-end">
                        <div class="pt-4 mt-2">
                            <a href="{{ route('phenotype.view', 'indica') }}" class="btn-link fw-bold me-2">Індіка</a>
                            <a href="{{ route('phenotype.view', 'sativa') }}" class="btn-link fw-bold me-2">Сатіва</a>
                            <a href="{{ route('phenotype.view', 'hybrid') }}" class="btn-link fw-bold me-2">Гібрид</a>
                            <a href="{{ route('phenotype.view', 'ruderalis') }}" class="btn-link fw-bold">Рудераліс</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                @if($strains->count() > 0)
                    <div class="row">
                        @foreach($strains as $strain)
                            <div class="col-12 col-md-3 mb-4">
                                <div class="card card-strain">
                                    <div class="image">
                                        <a href="{{ route('phenotype.strains', $strain->type->slug) }}" class="badge type bg-primary text-uppercase">{{ $strain->type->name }}</a>
                                        <a href="{{ route('strain', $strain->slug) }}">
                                            <img src="{{ $strain->image }}" alt="{{ $strain->title }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="title">
                                            <a href="{{ route('strain', $strain->slug) }}">{{ $strain->title }}</a>
                                        </div>

                                        <div class="description">
                                            @if($strain->primaryTerpene)
                                                <div class="badge text-dark border border-2 me-2"></div>
                                                <a href="{{ route('terpene.strains', $strain->primaryTerpene->terpene->slug) }}" class="badge bg-warning text-dark">{{ $strain->primaryTerpene->terpene->title }}</a>
                                            @endif

                                            @if($strain->cannabinoid->count() > 0)
                                                @foreach($strain->cannabinoid as $item)
                                                    <div class="badge text-dark border border-2 me-1">{{ $item->cannabinoid->title }} {{ $item->value }}%</div>
                                                @endforeach
                                            @else
                                                <div class="badge">
                                                    &nbsp;
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">
                        Сортів не знайдено
                    </div>
                @endif
            </div><!-- .content -->
        </div>
    </section>

    <section class="content subscribe pt-5 pb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">

                    <div class="card card-subscribe mt-5 text-center">
                        <div class="card-body p-5">
                            <h2 class="title mb-2 fw-bold">Підпишіться та будьте в курсі новинок</h2>

                            <div class="description px-lg-5">
                                <p>Ознайомтеся з актуальними новинами про коноплі, порадами, освітою та іншим.</p>
                            </div>

                            <form action="" method="post" class="pt-4 ms-auto me-auto d-none">
                                <div class="input-group">
                                    <input type="text" name="email" class="form-control py-2 px-3" placeholder="Ваш email">

                                    <button class="btn btn-primary fw-bold">Підписатись</button>
                                </div>
                            </form>

                            <form-subscribe-component></form-subscribe-component>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
