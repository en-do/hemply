@extends('layouts.client')

@section('title', 'Каннабіноїди | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'Види каннабіноїдів та їх вплив | HEMPLY.CLUB - Актуальні новини та тренди конопляного світу. Інформаційний ресурс про коноплі українською')

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">Канабіноїди</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Канабіноїди</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <section class="pt-5 pb-5">
        <div class="container">

            <p class="fs-6 lead"><b>Канабіно́їди (англ. cannabinoids)</b> — група терпенфенольних сполук, похідних 2-заміщеного 5-амілрезорцина. У природі зустрічаються в рослинах родини конопляних (Cannabaceae), є діючими речовинами гашишу й марихуани. Рослинні канабіноїди є С-21 сполуками, що мають споріднену структуру. Відповідальним за психотропний ефект марихуани є дельта-9-тетрагідроканабінол, здатний селективно зв'язуватися в певних структурах головного мозку з канабіноїдними рецепторами. Рослинні канабіноїди також називають фітоканабіноїдами.</p>

            <div class="pt-3">
                @foreach($cannabinoids as $cannabinoid)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-0 fw-bold">{{ $cannabinoid->title }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
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

                            <form-subscribe-component></form-subscribe-component>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
