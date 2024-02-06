@extends('master.admin')
@section('title', 'Create New Product')
@section('main')
    <div class="row">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9">                
                
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" name="name" id="">
                    @error('name')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>          
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($category as $cate)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>   
                <div class="form-group">
                    <label for="">Product Description</label>
                    <textarea name="content" class="form-control" placeholder="Product Content"></textarea>
                </div>                
                                
            </div>
            <div class="col-md-3">                
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" class="form-control" placeholder="Price" name="price" id="">
                    @error('price')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product Sale Price</label>
                    <input type="text" class="form-control" placeholder="Sale Price" name="sale_price" id="">
                    @error('sale_price')
                        <span class="badge text-bg-warning">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="file" class="form-control" placeholder="Image" name="img" id="">
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