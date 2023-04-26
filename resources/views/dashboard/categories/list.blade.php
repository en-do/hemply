@extends('layouts.dashboard')

@section('content')

    <section>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="button text-end mb-4">
            <a href="{{ route('dashboard.category.add') }}" class="btn btn-primary">Додати категорію</a>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Слаг</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @switch($category->status)
                                        @case('published')
                                            <div class="badge bg-success">опубліковано</div>
                                            @break
                                        @case('draft')
                                            <div class="badge bg-warning text-dark">в чернетціnp</div>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="text-muted opacity-75">
                                        {{ $category->updated_at }}
                                    </div>
                                </td>
                                <td align="right">
                                    <a href="{{ route('dashboard.category.edit', $category->id) }}" class="btn btn-primary btn-sm">
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
                                Categories not found
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{ $categories->links() }}
    </section>

@endsection
