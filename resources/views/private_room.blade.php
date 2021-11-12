@extends('template')
@section('room_number')
    {{$number}}
@endsection
@section('component')
    <example-component csrf="{{ csrf_token() }}" :number="{{$number}}"></example-component>
@endsection

@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
