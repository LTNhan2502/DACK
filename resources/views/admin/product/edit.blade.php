@extends('master.admin')
@section('title', 'Edit Product ' . $product->name)
@section('main')
    <div class="row">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="col-md-9">                
                
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" placeholder="Product Name" name="name">
                    @error('name')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>          
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($category as $cate)
                            <option value="{{ $cate->id }}" {{ $cate->id == $product->category_id ? 'selected' : '' }}>
                                {{ $cate->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>   
                <div class="form-group">
                    <label for="">Product Description</label>
                    <textarea name="content" class="form-control" placeholder="Product Content">
                        {{ $product->content }}
                    </textarea>
                    @error('content')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>                
                                
            </div>
            <div class="col-md-3">                
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" class="form-control" value="{{ $product->price }}" placeholder="Price" name="price">
                    @error('price')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product Sale Price</label>
                    <input type="text" class="form-control" value="{{ $product->sale_price }}" placeholder="Sale Price" name="sale_price">
                    @error('sale_price')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="file" class="form-control" placeholder="Image" name="img">
                    <img src="uploads/product/{{ $product->img }}" width="100%" >
                    @error('img')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>Save
                </button>
            </div>
        </form>
    </div>
@stop()