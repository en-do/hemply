@extends('layouts.dashboard')

@section('content')

    <section>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('dashboard.category.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card">
                <div class="card-body">

                    <div class="mb-4">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">Слаг</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">

                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Статус</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="" hidden>Вибрати статус</option>
                            <option value="published" @selected(old('status') == 'published')>Опубліковано</option>
                            <option value="draft" @selected(old('status') == 'draft')>В чернетку</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header py-3 bg-light">
                    <h6 class="mb-0 fw-bold text-uppercase">Мета дані</h6>
                </div>
                <div class="card-body">

                    <div class="mb-4">
                        <label for="meta_title" class="form-label">Meta title</label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}">

                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="meta_description" class="form-label">Meta description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>

                        @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="nofollow">
                            nofollow
                        </label>
                        <input class="form-check-input @error('nofollow') is-invalid @enderror" type="checkbox" name="nofollow" value="1" id="nofollow" @checked(old('nofollow') ?? false)>

                        @error('nofollow')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="noindex">
                            noindex
                        </label>
                        <input class="form-check-input @error('noindex') is-invalid @enderror" type="checkbox" name="noindex" value="1" id="noindex" @checked(old('noindex') ?? false)>

                        @error('noindex')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="button text-end mt-4">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </section>

@endsection
