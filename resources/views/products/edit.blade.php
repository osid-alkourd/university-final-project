@extends('layouts.dashboard')

@section('header' , 'osid')

@section('breadcrum')
    @parent
    <li class="breadcrumb-item active">Starter Page</li>
@stop

@section('content')

    <form action="{{route('product.update' , [$product->id])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label for="">Store</label>
            <select name="store_id"  class="form-control">
                <option value="">Select Store</option>
                @foreach($stores as $store)
                    <option value="{{$store->id}}" @if($product->store_id == $store->id) selected @endif>{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control">{{$product->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="">Base Price</label>
            <input type="number" name="base_price" class="form-control" value="{{ $product->base_price }}">
        </div>


        <div class="form-group">
            <label for="">Discount</label>
            <input type="number" name="discount" class="form-control" value="{{ $product->discount }}">
        </div>

         
        <div class="form-group">
            <label for="">purchasing_flag</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="purchasing_flag" value="base" @if($product->purchasing_flag == 'base') checked @endif>
                <label class="form-check-label">base</label>
            </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purchasing_flag" value="discount" @if($product->purchasing_flag == 'discount') checked @endif>
                <label class="form-check-label">discount</label>
             </div>
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