@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Minat UKM') }}</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ukms as $ukm)
                        <tr>
                            <td>{{ $ukm->name }}</td>
                            <td>
                                @if ($ukm->isJoinedBy(auth()->user()))
                                    <form action="{{ route('mahasiswa.ukm.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ukm_id" value="{{ $ukm->id }}">
                                        <button type="submit" class="btn btn-danger">{{ __('Hapus') }}</button>
                                    </form>
                                @else
                                    <form action="{{ route('mahasiswa.ukm.choose') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ukm_id" value="{{ $ukm->id }}">
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
