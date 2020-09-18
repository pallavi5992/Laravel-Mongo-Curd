@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('saveItem')}}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="type" class="form-control" placeholder="Type">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Qty:</strong>
                <input type="number" name="qty" class="form-control" placeholder="Qty">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
   
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
           <p class="text-success">{{Session::get('message')}}</p>
            <div class="pull-right">
                <a class="btn btn-danger" href=""  data-toggle="modal" data-target="#basicExampleModal"> Create new Items</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Item</div>

                <div class="card-body">
                <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Qty</th>
            <th width="250px">Action</th>
        </tr>
        <?php $i=1 ?>
        @foreach ($allitem as $item)
        <tr>
            <td>{{$i++}}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->qty }}</td>
            <td>
                <form action="" method="POST">
   
                    <!-- <a class="btn btn-info" href="">Show</a> -->
    
                    <a class="btn btn-primary" href="{{route('editItem',['id'=>$item->id])}}">Edit</a>
   
                   
                    <a class="btn btn-danger" href="{{route('deleteItem',['id'=>$item->id])}}"  onclick="return confirm('Are you sure want to delete')">Delete</a>
                
                </form>
            </td>
        </tr>
        @endforeach
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
