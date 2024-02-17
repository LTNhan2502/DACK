@extends('master.admin')
@section('title', 'Order Manager')
@section('main')
    <form action="" method="POST" class="form-inline">
        <div class="form-group">
            <label for="" class="sr-only">Label</label>
            <input type="email" class="form-control" name="" id="" placeholder="Input field">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>        
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer ID</th>                   
                <th>Product Information</th>  
                <th>Status</th>           
                <th></th>
            </tr>
        </thead>
        <tbody>  
            {{-- @foreach($data as $model)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>                    
                    <td>{{ $model->id }}</td>                   
                    <td>{{ $model->customers->id }}</td>
                    <td>{{ $model->status }}</td>
                    <td class="text-right">
                        <form action="{{ route('orders.destroy', $model->id) }}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('orders.edit', $model->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>Edit
                            </a>
                            <button class="btn btn-sm btn-danger" type="submit"
                            onclick="return confirm('Do you want to delete?')">
                                <i class="fa fa-trash"></i>Delete
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach --}}
            
        </tbody>
    </table>

@stop()