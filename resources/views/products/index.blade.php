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
            <th>Name</th>
            <th>Store</th>
            <th>Description</th>
            <th>Base Price</th>
            <th>Discount Price</th>
            <th>Purchasing Flag</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>operation</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($products))
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->store->name}}</td>
                <td>{{$product->description }}</td>
                <td>{{$product->base_price }}</td>
                <td>{{$product->discount_price}}</td>
                <td>{{$product->purchasing_flag }}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at }}</td>
                <td>
                    <a href="{{route('product.edit' , [$product->id])}}" class="btn btn-sm btn-outline-success">edit</a>
                    <!-- /.btn btn-sm btn-outline-success -->
                </td>
               <td>
                <form action="{{route('product.destroy' , [$product->id])}}" method="post">
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
                <td colspan="10">No Categories Defined</td>
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