@extends('layouts.dashboard')

@section('content')

<section>
    <form action="{{ route('dashboard.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card">
            <div class="card-header py-3 bg-light">
                <h6 class="mb-0 fw-bold text-uppercase">Редагування публікації</h6>
            </div>

            <div class="card-body">

                <div class="mb-4">
                    <image-component image="{{ $post->image }}"></image-component>

                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="author" class="form-label">Author</label>
                    <select name="author" id="author" class="form-select @error('author') is-invalid @enderror">
                        <option value="" hidden>Вибрати автора</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @selected($post->user_id == old('author') || $post->user_id == $user->id)>({{ $user->username }}) {{ $user->first_name }}</option>
                        @endforeach
                    </select>

                    @error('author')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                        <option value="" hidden>Вибрати категорію</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected($post->category_id == old('category') || $post->category_id == $category->id)>{{ $category->title }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <editor-component name="description" content="{{ old('description') ?? $post->description }}"></editor-component>

                    @error('description')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $post->slug }}">

                    <div class="form-text">Якщо поле не заповнено, буде згенеровано автоматично</div>

                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="draft">В архіві</option>
                        <option value="published">Опублікований</option>
                        <option value="moderation">Модерація</option>
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
                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') ?? $post->meta->title ?? null }}">

                    @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="meta_description" class="form-label">Meta description</label>
                    <textarea id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') ?? $post->meta->description ?? null }}</textarea>

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
                    <input class="form-check-input @error('nofollow') is-invalid @enderror" type="checkbox" name="nofollow" value="1" id="nofollow" @checked(old('nofollow') ?? $post->meta->nofollow ?? false)>

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
                    <input class="form-check-input @error('noindex') is-invalid @enderror" type="checkbox" name="noindex" value="1" id="noindex" @checked(old('noindex') ?? $post->meta->noindex ?? false)>

                    @error('noindex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="button text-end mt-4">
            <button class="btn btn-primary">Save post</button>
        </div>
    </form>
</section>

@endsection
<script>
    import ImageComponent from "../../../js/components/ImageComponent";
    export default {
        components: {ImageComponent}
    }
</script>
