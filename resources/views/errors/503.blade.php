@extends('layouts.background')

@section('content')
    <section class="d-flex align-items-center justify-content-center vh-100">
        <div class="container">

            <div class="pt-5 pb-5">
                <div class="heading pb-1">
                    <div class="fw-bold opacity-75">503</div>
                    <h2 class="fs-1 fw-bold text-uppercase mb-0">Помилка запиту</h2>
                </div>

                <div class="description">
                    <p>Сталась помилка, повторіть спробу пізніше</p>
                </div>

                <div class="button mt-4">
                    <a href="{{ route('home') }}" class="btn btn-primary text-uppercase">На головну</a>
                </div>
            </div>

        </div>
    </section>
@endsection
