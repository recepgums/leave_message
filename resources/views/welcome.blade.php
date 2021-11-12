@extends('template')
@section('component')
    <example-component csrf="{{ csrf_token() }}"></example-component>
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
