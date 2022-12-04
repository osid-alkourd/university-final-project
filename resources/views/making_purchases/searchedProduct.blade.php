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
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($product))
        
            <tr>
                <td>{{$product->name}}</td>
                @if($product->purchasing_flag == 'discount')
                   <td>{{ $product->discount_price }}</td>
                   <td>discount price</td>
                @else
                <td>{{ $product->base_price }}</td>
                <td>base price</td>
                @endif
                
               <td>
                <form action="{{route('making_purchase.product.purchase')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                    <input type="hidden" name="price" @if($product->purchasing_flag == 'discount') value="{{ $product->discount_price }}" @else value="{{ $product->base_price }}" @endif />
                    <button type="submit" class="btn btn-sm btn-outline-danger">purchase</button>
                </form>
              </td>  
            </tr>
           
        @else
            <tr>
                <td colspan="10">No product Defined</td>
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