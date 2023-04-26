@extends('layouts.client')

@section('title', 'Терпени | HEMPLY.CLUB - Інформаційний ресурс про коноплі українською')
@section('description', 'HEMPLY.CLUB - Терпени та їх потенційний вплив. Інформаційний ресурс про коноплі українською. Актуальні новини та тренди конопляного світу')

@section('content')
    <header class="header-page">
        <div class="container">
            <div class="heading pt-4">
                <h1 class="fs-2 fw-bold text-white">Терпени</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="fw-bold">Головна</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Терпени</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <section class="pt-5 pb-5">
        <div class="container">

            <p class="fs-6 lead"><b>Терпе́ни (англ. terpenes)</b> — ненасичені вуглеводні загального складу (С5Н8)n, де n = 2,3,4…, з вуглецевими скелетами, які формально можна розглядати як продукти полімеризації ізопрену, (СН2=С(СН3)СН=СН2), переважно мають рослинне походження (складові, що визначають смак та запах продуктів отриманих з рослин). Можуть бути ациклічними й циклічними, з подвійними зв‘язками й без подвійних зв'язків (трициклічні). Розрізняють гемітерпени С5, монотерпени С10, сесквітерпени С15, дитерпени С20, сестертерпени С25, тритерпени С30, тетратерпени (каротеноїди) С40, політерпени С5n</p>

            <div class="pt-3">
                @foreach($terpenes as $terpene)
                    <a href="{{ route('terpene.view', $terpene->slug) }}" class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-0 fw-bold">{{ $terpene->title }}</h5>
                        </div>
                    </a>
                @endforeach
            </div>

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
