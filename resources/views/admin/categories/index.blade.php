@extends('master.admin')
@section('title', 'Category Manager')
@section('main')
    <form action="" method="POST" class="form-inline">
        <div class="form-group">
            <label for="" class="sr-only">Label</label>
            <input type="email" class="form-control" name="" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
        <a href="{{ route('categories.create') }}" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i>Add new
        </a>
    </form>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Categories Name</th>                
                <th></th>
            </tr>
        </thead>
        <tbody> 
            @foreach($data as $model)           
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $model->name }}</td>                
                    <td class="text-right">
                        <form action="{{ route ('categories.destroy', $model->id) }}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('categories.edit', $model->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>Edit
                            </a>
                            <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Do you want to delete this category?')">
                                <i class="fa fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop()