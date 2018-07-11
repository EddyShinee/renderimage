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
      <th scope="col">Tên font</th>
      <th scope="col">Font</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
      @foreach($data as $key)
    <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->font_name}}</td>
      <style>
          @font-face {
            font-family: '{{$key->temp_id}}';
            src: url({{Asset('uploads/fonts'.$key->font_path)}});
        }
        #{{$key->temp_id}} {
          font-family: '{{$key->temp_id}}' !important;
          color: green !important;
          font-size: 20px;

        }
        </style>
      <td><div id="{{$key->temp_id}}">A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T	U	V	W	X	Y	Z  1 2 3 4 5 6 7 8 9 0</div></td>
      <td>{{$key->created_at}}</td>
      <td>
      <a href="{{url('/fonts').'/'.$key->id.'/delete'}}"<button type="button" class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@stop 
