@extends('layouts.background')

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100">
        <div class="container">

            <div class="pt-5 pb-5">
                <div class="heading pb-1">
                    <div class="fw-bold opacity-75">404</div>
                    <h2 class="fs-1 fw-bold text-uppercase mb-0">Сторінка не знайдена</h2>
                </div>

                <div class="description">
                    <p>Неправильно набрана адреса або такої сторінки не існує</p>
                </div>

                <div class="button mt-4">
                    <a href="{{ route('home') }}" class="btn btn-primary text-uppercase">На головну</a>
                </div>
            </div>

        </div>
    </section>
@endsection
