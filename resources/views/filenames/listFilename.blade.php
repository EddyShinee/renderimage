@extends('layouts.master')

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
<table class="table table-hover table-striped">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên file</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
      @foreach($data as $key)
    <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->file_name}}</td>
      <td>{{$key->created_at}}</td>
      <td>
      <a href="{{url('/filename').'/'.$key->id.'/delete'}}"<button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@stop 
