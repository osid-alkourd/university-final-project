@extends('layouts.dashboard')

@section('header' , 'Create Store')

@section('breadcrum')
    <li class="breadcrumb-item active">Starter Page</li>
@stop

@section('content')
@foreach ($errors->all() as $message)
  <div class="alert alert-danger">{{ $message }}</div>
@endforeach


    <form action="{{route('store.store')}}" method="post" enctype="multipart/form-type">
        @csrf
        <div class="form-group">
            <label for="">Store Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="">Store Logo</label>
            <input type="file" name="logo" class="form-control"/>
        </div>

       
        <button type="submit" class="form-group btn btn-primary">Save</button>
        <!-- /.form-group btn btn-primary -->
    </form>
    <!-- /.row -->
@stop


{{--
   @push('style')
       <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
   @endpush
   --}}

{{-- append to style not override
    @push('style')
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    @endpush
--}}

@push('scripts')

@endpush