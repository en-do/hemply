@extends('layouts.dashboard')

@section('content')
    <section class="pt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.cannabinoid.update', $cannabinoid->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-body">

                    <div class="mb-4">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $cannabinoid->title }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Опис</label>
                        <editor-component name="description" content="{{ old('description') ?? $cannabinoid->description }}"></editor-component>

                        @error('description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">Слаг</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $cannabinoid->slug }}">

                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Статус</label>
                        <select name="status" id="status" class="form-select">
                            <option value="" hidden></option>
                            <option value="1" @selected($cannabinoid->active == 1)>Опубліковано</option>
                            <option value="0" @selected($cannabinoid->active == 0)>Архів</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="button mt-4 text-end">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </section>
@endsection
