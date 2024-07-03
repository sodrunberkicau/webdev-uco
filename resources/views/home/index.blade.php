@extends('layouts.app')
@section('content')

    <div class="grid gap-3 gap-row-3 row justify-content-center">
        @foreach($viewData["products"] as $product)
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $product['image'] }}" class="card-img-top object-fit-cover" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name']}}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <a href="#" class="btn btn-primary">{{ $product['price'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
