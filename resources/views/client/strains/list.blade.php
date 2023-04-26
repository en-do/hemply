@extends('layouts.client')

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">Сорти</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Сорти</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <section class="pt-4 pb-4">
        <div class="container">

            <div class="content pt-4">
                <p class="fs-6 lead">
                    Індика, рудераліс і сатива – три види конопель, від яких бридери за недовго отримали величезну кількість гібридів і сортів. Такі можливості відкрилися завдяки розвитку селекції (слово «бридер» від англ. breeding – селекція) – науки, яка охоплює методи створення та вдосконалення вже існуючих сортів рослин із заданими ознаками.
                </p>

                <div class="row mt-4">
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="category">
                            <ul class="nav justify-content-center justify-content-md-start nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link py-2 px-4 {{ request()->is("strains") ? 'active' : '' }}" aria-current="page" href="{{ route('strains') }}">Всі</a>
                                </li>
                                @foreach($phenotypes as $phenotype)
                                    @if($phenotype->strains->count() > 0)
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 {{ request()->is("*phenotype/$phenotype->slug") ? 'active' : '' }}" href="{{ route('phenotype.strains', $phenotype->slug) }}">{{ $phenotype->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-3">
                        <form action="" class="search pt-3 pt-md-0">
                            <input type="text" class="form-control">
                        </form>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-12">
                            @if($strains->count() > 0)
                                <div class="row">
                                    @foreach($strains as $strain)
                                        <div class="col-12 col-md-4 col-lg-3 mb-4">
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
                                <div class="alert text-muted text-center">Таких сортів нажаль не знайдено :(</div>
                            @endif
                    </div>

                </div>

                {{ $strains->links() }}
            </div><!-- .content -->
        </div>
    </section>
@endsection
