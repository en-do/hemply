@extends('layouts.dashboard')

@section('content')

<section>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="button text-end mb-4">
        <a href="{{ route('dashboard.post.add') }}" class="btn btn-primary">Додати публікацію</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Автор</th>
                        <th>Заголовок</th>
                        <th>Слаг</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                @if($post->user)
                                    <a href="#" class="fw-bold">{{ $post->user->first_name }}</a>
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                @switch($post->status)
                                    @case('published')
                                        <div class="badge bg-success">published</div>
                                        @break
                                    @case('draft')
                                        <div class="badge bg-secondary">draft</div>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-muted">{{ $post->updated_at->format('d-m-Y H:i') }}</td>
                            <td align="right">
                                <a href="{{ route('dashboard.post.edit', $post->id) }}" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" align="center">
                            Записів не знайдено
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    {{ $posts->links() }}
</section>

@endsection
