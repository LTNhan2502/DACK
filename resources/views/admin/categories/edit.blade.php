@extends('master.admin')
@section('title', 'Edit Category ' . $category->name)
@section('main')
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="">
                </div>                
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>Save
                </button>
            </form>
        </div>
    </div>
   
    

@stop()