@extends('layouts.app')
{{--@section('title', $viewData["title"])--}}
{{--@section('subtitle', $viewData["subtitle"])--}}
@section('content')
    <div class="row">
        @foreach ($viewData["products"] as $product)
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/product/'.$product['image']) }}" class="card-img-top object-fit-cover" alt="...">
                    <div class="card-body">
                        <a href="{{ route('product.show', ['id'=> $product['id']]) }}">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                        </a>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <a href="#" class="btn btn-primary">{{ $product['price'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="position-fixed end-0 bottom-0 pe-3 pb-3">
        <a href="{{ route('product-create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            Add product
        </a>
    </div>
@endsection
