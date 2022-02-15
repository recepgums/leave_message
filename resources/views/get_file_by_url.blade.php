@extends('template')
@section('component')
    <div class="container">
       <div class="card col-6 text-center mx-auto mt-5 pt-5">
           <div class="col-12 text-center mx-auto py-2">
               <h3 class="text-center text-accent">Download File</h3>
               <form action="{{route('download_file_attempt')}}" method="post" >
                   @csrf
                   <input type="hidden" name="file_id" value="{{$file->id}}">
                   <input type="text" placeholder="Password..." name="password" class="form-control">
                   <button type="submit" class="btn-lg btn-success float-right mt-5">Download</button>
               </form>
           </div>
       </div>
    </div>

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
