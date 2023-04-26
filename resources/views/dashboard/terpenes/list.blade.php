@extends('layouts.dashboard')

@section('content')
    <section class="pt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Колір</th>
                            <th>Заголовок</th>
                            <th>Опис</th>
                            <th>Слаг</th>
                            <th>Дата</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($terpenes as $terpene)
                            <tr>
                                <td>{{ $terpene->id }}</td>
                                <td>{{ $terpene->hex_color }}</td>
                                <td>{{ $terpene->title }}</td>
                                <td>
                                    @if($terpene->description)
                                        <div class="badge bg-success">заповнено</div>
                                    @else
                                        <div class="badge bg-warning text-dark">немає</div>
                                    @endif
                                </td>
                                <td>{{ $terpene->slug }}</td>
                                <td>
                                    @if($terpene->created_at)
                                        {{ $terpene->created_at->format('d/m/Y') }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if($terpene->active)
                                        <div class="badge bg-success">опубліковано</div>
                                    @else
                                        <div class="badge bg-warning text-dark">в архіві</div>
                                    @endif
                                </td>
                                <td align="right">
                                    <a href="{{ route('dashboard.terpene.edit', $terpene->id) }}" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <path d="M13.5 6.5l4 4"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
