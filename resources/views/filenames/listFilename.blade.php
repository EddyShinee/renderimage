@extends('layouts.master')

@section('content')
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
      <button type="button" class="btn btn-primary">Edit</button>
      <button type="button" class="btn btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@stop 
