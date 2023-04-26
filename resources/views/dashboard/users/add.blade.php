@extends('layouts.dashboard')

@section('content')

<section>
    <form action="{{ route('dashboard.user.create') }}" method="post">
        @csrf
        @method('post')

        <div class="card">
            <div class="card-header py-3 bg-light">
                <h6 class="mb-0 fw-bold text-uppercase">Новий користувач</h6>
            </div>
            <div class="card-body">

                <div class="mb-4">
                    <label for="role" class="form-label">Роль</label>
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                        <option value="" hidden>Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </select>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="form-label">Нікнейм</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="first_name" class="form-label">Ім'я</label>
                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror">

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
        </div>

        <div class="button text-end mt-4">
            <button type="submit" class="btn btn-primary">Зберегти дані</button>
        </div>
    </form>
</section>

@endsection
