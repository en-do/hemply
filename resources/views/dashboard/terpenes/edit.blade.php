@extends('layouts.dashboard')

@section('content')
    <section class="pt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.terpene.update', $terpene->id) }}" method="post">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-body">

                    <div class="mb-4">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $terpene->title }}">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Опис</label>
                        <editor-component name="description" content="{{ old('description') ?? $terpene->description }}"></editor-component>

                        @error('description')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">Слаг</label>
                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $terpene->slug }}">

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
                            <option value="1" @selected($terpene->active == 1)>Опубліковано</option>
                            <option value="0" @selected($terpene->active == 0)>Архів</option>
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
                        <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') ?? $terpene->meta->title ?? null }}">

                        @error('meta_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="meta_description" class="form-label">Meta description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') ?? $terpene->meta->description ?? null }}</textarea>

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
                        <input class="form-check-input @error('nofollow') is-invalid @enderror" type="checkbox" name="nofollow" value="1" id="nofollow" @checked(old('nofollow') ?? $terpene->meta->nofollow ?? false)>

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
                        <input class="form-check-input @error('noindex') is-invalid @enderror" type="checkbox" name="noindex" value="1" id="noindex" @checked(old('noindex') ?? $terpene->meta->noindex ?? false)>

                        @error('noindex')
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
