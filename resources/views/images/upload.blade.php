@extends('layouts.master')

@section('content')
<div class="row justify-content-md-center uploadform">
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
<form action="/upload" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ Session::token() }}">
      <div class="form-group">
        <label for="exampleFormControlFile1">Tên file hình</label>
        <input class="form-control" type="text" name='name' placeholder="Tên file hình">
      </div>
        <div class="form-group">
        <label for="exampleFormControlFile1">Chọn file hình</label>
        <input type="file" class=" form-control-file" id="image" name='image' onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
      </div>
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