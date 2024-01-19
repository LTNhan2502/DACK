@extends('master.admin')
@section('title', 'Product Manager')
@section('main')
    <form action="" method="POST" class="form-inline">
        <div class="form-group">
            <label for="" class="sr-only">Label</label>
            <input type="email" class="form-control" name="" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
        <a href="{{ route('product.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i>Add new
        </a>
    </form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Content</th>
                <th>Product Category</th>
                <th></th>
            </tr>
        </thead>
        <tbody>  
            @foreach($data as $model)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>
                        <img src="public/img/{{ $model->img }}" width="40px" alt="">
                    </td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->price }}</td>
                    <td>{{ $model->content }}</td>
                    <td>{{ $model->category->name }}</td>
                    <td class="text-right">
                        <a href="{{ route('product.edit', 1) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>Edit
                        </a>
                        <a href="" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>Delete
                        </a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@stop()