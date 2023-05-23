@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Your RIASEC Results') }}</div>

        <div class="card-body">
            <p>{{ __('Your answers have been saved, and here are your RIASEC results:') }}</p>
            <h1>{{ $result['result'] }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('RIASEC') }}</th>
                        <th>{{ __('Description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('R') }}</td>
                        <td>{{ __('Realistic') }} - {{ __('practical, hands-on, physical tasks') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('I') }}</td>
                        <td>{{ __('Investigative') }} - {{ __('analytical, logical, scientific tasks') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('A') }}</td>
                        <td>{{ __('Artistic') }} - {{ __('creative, innovative, imaginative tasks') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('S') }}</td>
                        <td>{{ __('Social') }} - {{ __('helping, teaching, nurturing tasks') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('E') }}</td>
                        <td>{{ __('Enterprising') }} - {{ __('persuading, leading, managing tasks') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('C') }}</td>
                        <td>{{ __('Conventional') }} - {{ __('detail-oriented, organizing, clerical tasks') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
