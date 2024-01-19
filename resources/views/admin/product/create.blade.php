@extends('master.admin')
@section('title', 'Create New Category')
@section('main')
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Product Image</label>
                    <input type="text" class="form-control" name="img" id="">
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>
                <div class="form-group">
                    <label for="">Product Price</label>
                    <input type="text" class="form-control" name="price" id="">
                </div>
                <div class="form-group">
                    <label for="">Product Content</label>
                    <textarea name="content" class="form-control" placeholder="Product Content"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>Save
                </button>
            </form>
        </div>
    </div>
   
    

@stop()