@extends('layouts.dashboard')

@section('content')

<section>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="button text-end mb-4">
        <a href="{{ route('dashboard.strain.add') }}" class="btn btn-primary">Додати сорт</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Зображення</th>
                        <th>Назва</th>
                        <th>Фенотип</th>
                        <th>Слаг</th>
                        <th>Коментарі</th>
                        <th>Рейтинг</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($strains->count() > 0)
                        @foreach($strains as $strain)
                            <tr>
                                <td>{{ $strain->id }}</td>
                                <td>
                                    @if($strain->image)
                                        <img src="{{ $strain->image }}" alt="" class="img-fluid" width="60">
                                    @else
                                        <div class="badge bg-warning">немає</div>
                                    @endif
                                </td>
                                <td>
                                    {{ $strain->title }}
                                    <div class="text-muted">{{ $strain->sub_title }}</div>
                                </td>
                                <td>
                                    {{ $strain->type->name }}
                                </td>
                                <td>
                                    {{ $strain->slug }}
                                </td>
                                <td>
                                    0
                                </td>
                                <td>
                                    {{ $strain->rating }}
                                </td>
                                <td>
                                    {{ $strain->status }}
                                </td>
                                <td></td>
                                <td align="right">
                                    <a href="{{ route('dashboard.strain.edit', $strain->id) }}" class="btn btn-primary btn-sm">
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
                            <td colspan="9" align="center">
                                Сортів не знайдено
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $strains->links() }}
    </div>
</section>

@endsection
