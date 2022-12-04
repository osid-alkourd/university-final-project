@extends('layouts.dashboard')

@section('header' , 'stores')

@section('breadcrum')
   
    <li class="breadcrumb-item active">Starter Page</li>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Store</th>
            <th>Logo</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($stores))
        @foreach($stores as $store)
            <tr>
                <td><a href="{{ route('making_purchase.store.products' , [$store->id]) }}">{{$store->name}}</a></td>
                <td>{{$store->logo}}</td>
            </tr>
        @endforeach 
        @else
            <tr>
                <td colspan="10">No Stores Defined</td>
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