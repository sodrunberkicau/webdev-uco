@extends('layouts.app')
    <div class="d-flex justify-content-center">
        <div class="card" style="width:500px">
            <div class="card-header">
                Add product
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('product-create')}}" class="was-validated" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name ?? old('name') }}" required>
                        @error('name')
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description">{{ $product->description ?? old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $errors->first('description') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ $product->price ?? old('price') }}" min="0" required>
                        @error('price')
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">New images</label>
                        <input type="file" class="form-control" name="images" id="images" accept="image/png, image/jpg, image/jpeg" required multiple>
                        @error('images')
                        <div class="text-danger">{{ $errors->first('images') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Save product
                        </button>
                    </div>
                    <a href="{{ route('catalog') }}" class="btn btn-secondary w-100">
                        Back to list
                    </a>
                </form>
            </div>
        </div>
    </div>
