@extends('master.admin')
@section('title', 'Edit Category')
@section('main')
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Category Status</label>                    
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id=""
                            value="1"                            
                        />Publish                        
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id=""
                            value="0"                            
                        />Hidden                       
                    </div>                    
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>Save
                </button>
            </form>
        </div>
    </div>
   
    

@stop()