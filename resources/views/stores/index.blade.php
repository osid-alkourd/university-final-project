@extends('layouts.dashboard')

@section('header' , 'Stores')

@section('breadcrum')
   
    <li class="breadcrumb-item active">Starter Page</li>
@stop

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
    <table class="table">
        <thead>
        <tr>
            <th>store id</th>
            <th>Name</th>
            <th>store logo</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>operation</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($stores))
        @foreach($stores as $store)
            <tr>
                <td>{{$store->id }}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->logo}}</td>
                <td>{{$store->created_at}}</td>
                <td>{{$store->updated_at }}</td>
                <td>
                    <a href="{{route('store.edit' , [$store->id])}}" class="btn btn-sm btn-outline-success">edit</a>
                    <!-- /.btn btn-sm btn-outline-success -->
                </td>
                <td>
                <form action="{{route('store.destroy' , [$store->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                    <!-- /.btn btn-sm btn-outline-danger -->
                </form>
            </td>
            </tr>
           @endforeach 
        @else
            <tr>
                <td colspan="10">No stores Defined</td>
            </tr>
        @endif 
        </tbody>
    </table>
    <!-- /.table -->

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