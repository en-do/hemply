@extends('layouts.client')

@section('title', $strain->title . ' | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', "Сорт $strain->title | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською")

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">{{ $strain->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('strains') }}" class="fw-bold">Сорти</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $strain->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <section class="pt-5 pb-4">
        <div class="container">

            <div class="row justify-content-center pt-4">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <img src="{{ $strain->image }}" alt="{{ $strain->title }}" class="img-fluid">
                        </div>

                        <div class="col-12 col-md-7">
                            <div class="d-flex">
                                @if($strain->type)
                                    <div class="mb-2 me-2">
                                        <div class="badge bg-primary text-uppercase text-decoration-none">{{ $strain->type->name }}</div>
                                    </div>
                                @endif

                                <div class="mb-2">
                                    @foreach($strain->cannabinoid as $item)
                                        <div class="badge text-dark border border-2 me-1">{{ $item->cannabinoid->title }} {{ $item->value }}</div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-2">
                                <h2 class="fs-2 fw-bold text-primary mb-0">{{ $strain->title }}</h2>
                                <div class="lead">{{ $strain->sub_title }}</div>
                            </div>

                            <div class="rating mb-4">
                                <span class="fw-bold pe-1" style="position: relative; top: 3px">{{ $strain->source_rating }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20" fill="#ffc220">
                                    <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </div>

                            @if($strain->primaryTerpene)
                                <div class="badge bg-warning text-dark">{{ $strain->primaryTerpene->terpene->title }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-5">
                    @if($strain->terpene->count() > 0)
                    <div class="mt-4 mb-4">
                        <div class="form-label fw-bold text-uppercase">Терпени</div>
                        @foreach($strain->terpene as $item)
                            <div class="mb-3">
                                <div>
                                    @if($strain->primaryTerpene->id == $item->id)
                                        <div class="badge bg-warning text-dark me-2">{{ $item->terpene->title }}</div>
                                    @else
                                        <div class="badge text-dark border border-2 me-2">{{ $item->terpene->title }}</div>
                                    @endif
                                    <span class="badge bg-secondary text-white">{{ $item->terpene->flavor }}</span>
                                </div>
                                <div class="form-text">{{ $item->terpene->intro }}</div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="col-12 col-md-7">
                    @if($strain->description)
                        <div class="mt-4 mb-4">
                            <div class="form-label fw-bold text-uppercase">Опис сорту</div>
                            {{ $strain->description }}
                        </div>
                    @endif

                    @if($strain->effect->count() > 0)
                        <div class="mt-4 mb-4">
                            <div class="form-label fw-bold text-uppercase">Ефекти</div>
                            @foreach($strain->effect as $item)
                                <div class="badge text-dark border border-2 mb-1 me-2">{{ $item->effect->title }}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="content strains pt-5 pb-5">
        <div class="container">
            <div class="heading pb-5">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('strains') }}" class="btn-link fw-bold mt-2 pt-1">Всі сорти</a>
                        <h2 class="title fw-bold mb-1">Схожі сорти</h2>
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
                                        <a href="{{ route('phenotype.strains', $strain->type->slug) }}" class="badge type bg-primary text-uppercase">
                                            {{ $strain->type->name }}
                                        </a>
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

                            <form-subscribe-component></form-subscribe-component>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
