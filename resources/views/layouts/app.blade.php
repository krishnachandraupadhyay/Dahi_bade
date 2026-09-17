@extends('layouts.admin')

@section('content')
    @if (isset($header))
        <div style="margin-bottom: 24px;">
            {{ $header }}
        </div>
    @endif

    {{ $slot ?? '' }}
@endsection
