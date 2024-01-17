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
                <th>STT</th>
                <th>Categories Name</th>
                <th>Categories Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td scope="row">1</td>
                <td>Lining</td>
                <td>Publish</td>
                <td class="text-right">
                    <a href="{{ route('categories.edit', 1) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i>Edit
                    </a>
                    <a href="" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>Delete
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

@stop()