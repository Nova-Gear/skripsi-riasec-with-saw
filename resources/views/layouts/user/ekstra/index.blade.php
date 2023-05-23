@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Ekstrakulkuler Management') }}</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ekstras as $ekstra)
                        <tr>
                            <td>{{ $ekstra->name }}</td>
                            <td>
                                @if ($ekstra->isJoinedBy(auth()->user()))
                                    <form action="{{ route('mahasiswa.ekstra.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ekstra_id" value="{{ $ekstra->id }}">
                                        <button type="submit" class="btn btn-danger">{{ __('Hapus') }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('mahasiswa.ekstra.choose') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ekstra_id" value="{{ $ekstra->id }}">
                                        <button type="submit" class="btn btn-primary">{{ __('Pilih') }}</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
