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
        <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i>Add new
        </a>
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th></th>
            </tr>
        </thead>
        <tbody>  
            @foreach($data as $model)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>
                        <img src="uploads/product/{{ $model->img }}" width="40px" alt="">
                    </td>
                    <td>{{ $model->name }}</td>
                    <td>
                        {{ $model->price }} 
                        <span class="badge text-bg-secondary">{{ $model->sale_price }}</span> 
                    </td>
                    <td>{{ $model->content }}</td>
                    <td>{{ $model->category->name }}</td>
                    <td class="text-right">
                        <form action="{{ route('products.destroy', $model->id) }}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('products.edit', $model->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>Edit
                            </a>
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Do you want to delete?')">
                                <i class="fa fa-trash"></i>Delete
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@stop()