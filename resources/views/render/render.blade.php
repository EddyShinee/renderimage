@extends('layouts.master')

@section('content')

<div class="row justify-content-md-center uploadform">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<div class="col-4 uploadform">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/render" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ Session::token() }}">
      <div class="form-group">
        <label for="exampleFormControlFile1">Tên file hình</label>
		<select name="image_select" id="image_select">
		<option value="">Chọn tên hình</option>
			@foreach ($image_data as $key => $value)
			<option value="{{ $value->image_path }}">
				{{$value->image_name}}
				</option>
			@endforeach
		</select>
      </div>

	  <div class="form-group">
        <label for="exampleFormControlFile1">Tên file Font</label>
		<select name="font_select">
		<option value="">Chọn tên font</option>
			@foreach ($font_data as $key => $value)
				
				<option value="{{ $value->font_path }}">
				{{$value->font_name}}
				</option>
			
			@endforeach
		</select>
      </div>
	  <div class="form-group">
        <label for="exampleFormControlFile1">Chọn màu</label>
        <input class="form-control" type="text" name='sub_color1' placeholder="input mã màu" default="0">
		<input class="form-control" type="text" name='sub_color2' placeholder="input mã màu" default="0">
		<input class="form-control" type="text" name='sub_color3' placeholder="input mã màu" default="0">
      </div>

	  <div class="form-group">
        <label for="exampleFormControlFile1">Input Font Size</label>
        <input class="form-control" type="text" name='font_size' placeholder="Input font size" default="50">
      </div>

	  <div class="form-group">
        <label for="exampleFormControlFile1">Tên file Tên</label>
		<select name="filename_select">
		<option value="">Chọn tên File</option>
			@foreach ($file_data as $key => $value)
				<option value="{{ $value->file_path }}">
				{{$value->file_name}}
				</option>
			@endforeach
		</select>
      </div>

	   <div class="form-group">
        <label for="exampleFormControlFile1">Tọa độ Chữ</label>
        <input class="form-control" type="number" name='toadoX' placeholder="Tọa độ X" default="100">
		<input class="form-control" type="number" name='toadoY' placeholder="Tọa độ Y" default="100">
      </div>

        <!-- <div class="form-group">
        <label for="exampleFormControlFile1">Chọn file tên</label>
        <input type="file" class=" form-control-file" id="file_ten" name='file_ten'>
      </div> -->
      <div style="float: right;">
      <button type="submit" class="btn btn-primary mb-2">Upload</button>
      </div>
    </form>
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
</div>
<div class="col-8 uploadform">
  <h2>Xem trước ảnh</h2>
  <h5>Ảnh dưới đây đã scale tạm thời để dễ nhìn</h6>  
<img id="preview" style="width:50%; height:75%;">

</div>
</div>
<script>
	
$(document).ready(function(){
	$("#image_select").change(function(){
		var index = $("#image_select").val();
		$('#preview').attr('src', "http://render.io/uploads/images" + index);
});
});

function readURL(input) {
	if (input.image && input.image[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		$('#preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.image[0]);
	}
	}

$("#image").change(function() {
  readURL(this);
});
</script>
@stop 