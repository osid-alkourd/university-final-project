@extends('layouts.dashboard')

@section('header' , 'Products')

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
            <td>Product name</td>
            <th>total purchases</th>
        </tr>
        </thead>
        <tbody>
        @if(isset( $total_product_purchases))
        @foreach( $total_product_purchases as $pro)
            <tr>
                <td>{{$pro->name}}</td>
                <td>{{$pro->purchases_sum_price}}</td>
            </tr>
           @endforeach 
        @else
            <tr>
                <td colspan="10">No purchases Defined</td>
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