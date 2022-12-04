@extends('layouts.dashboard')

@section('header' , 'edit store')

@section('breadcrum')
    @parent
    <li class="breadcrumb-item active">Starter Page</li>
@stop

@section('content')

    <form action="{{route('store.update' , [$store->id])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Store Name</label>
            <input type="text" class="form-control" name="name" value="{{$store->name}}">
        </div>

        <div class="form-group">
            <label for="">Store</label>
            <input type="file" name="logo" class="form-control" value="{{ $store->logo }}"/>
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