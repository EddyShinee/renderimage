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
      <th scope="col">Tên hình ảnh</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
      @foreach($data as $key)
    <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->image_name}}</td>
      <td><img src="{{url('/uploads/images/').$key->image_path}}" style="width:200px; height: 200px;"/></td>
      <td>{{$key->created_at}}</td>
      <td>
      <a href="{{url('/images').'/'.$key->id.'/delete'}}"<button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@stop 
