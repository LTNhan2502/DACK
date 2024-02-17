@extends('master.admin')
@section('title', 'Create New Category')
@section('main')
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="name" id="">
                    @error('name')
                        <span class="badge text-bg-warning">{{ $message }}</span>   
                    @enderror
                </div>                
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>Save
                </button>
            </form>
        </div>
    </div>
   
    

@stop()