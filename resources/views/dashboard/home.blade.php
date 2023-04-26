@extends('layouts.dashboard')

@section('content')

<section class="pt-4">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-0">Публікацій</h5>
                    <div class="text-muted opacity-75">Всього користувачів</div>
                    <div class="badge bg-primary mt-2">0</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-0">Категорії</h5>
                    <div class="text-muted opacity-75">Всього категорій</div>
                    <div class="badge bg-primary mt-2">0</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-0">Сорти</h5>
                    <div class="text-muted opacity-75">Всього сортів</div>
                    <div class="badge bg-primary mt-2">0</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-0">Користувачі</h5>
                    <div class="text-muted opacity-75">Всього користувачів</div>
                    <div class="badge bg-primary mt-2">0</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
