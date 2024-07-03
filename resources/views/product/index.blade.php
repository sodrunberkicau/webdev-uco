@extends('layouts.app')
{{--@section('title', $viewData["title"])--}}
{{--@section('subtitle', $viewData["subtitle"])--}}
@section('content')
    <div class="row">
        @foreach ($viewData["products"] as $product)
            {{--            <div class="col-md-4 col-lg-3 mb-2">--}}
            {{--                <div class="card">--}}
            {{--                    <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">--}}
            {{--                    <div class="card-body text-center">--}}
            {{--                        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"--}}
            {{--                           class="btn bg-primary text-white">{{ $product->getName() }}</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $product['image'] }}" class="card-img-top object-fit-cover" alt="...">
                    <div class="card-body">
                        {{--                        <h5 class="card-title">{{ $product['name']}}</h5>--}}
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
@endsection
