@extends('layouts.background')

@section('content')
<section class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-lg-5 col-xxl-4">

                <div class="text-center mb-5">
                    <a class="fs-3 navbar-brand fw-bolder text-white text-uppercase py-1" href="{{ url('/') }}">
                        HEMPLY <span class="badge bg-primary text-lowercase">club</span>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body pb-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label text-dark">Ел. пошта</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label text-dark">Пароль</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label text-dark" for="remember">
                                    Запам'ятати мене
                                </label>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary w-100">
                                    Авторизуватись
                                </button>


                                @if (Route::has('password.request'))
                                    <div class="text-center mt-2">
                                        <a class="btn btn-link fw-bold" href="{{ route('password.request') }}">
                                            Відновити пароль
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
