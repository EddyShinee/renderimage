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
<form action="/font-upload" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ Session::token() }}">
      <div class="form-group">
        <label for="exampleFormControlFile1">Tên file font</label>
        <input class="form-control" type="text" name='name' placeholder="Tên file font">
      </div>
        <div class="form-group">
        <label for="exampleFormControlFile1">Chọn file font</label>
        <input type="file" class=" form-control-file" id="font" name='font'  onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
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
<!-- <div class="col-8 uploadform">
  <h2>Xem trước font</h2>
<div id="preview" class="preview">
awdawdaw
</div> -->


</div>
</div>
<script>
  function previewfonts(input) {
        if (input.font && input.font[0]) {
            var reader = new FileReader();
         
            // reader.onload = function (e) {
            //     $('<style>'+
            //          '@font-face{'+
            //              'font-family: document.getElementById("name").value;'+
            //              'src: url('+e.target.result+');'+
            //           '}'+
            //       '</style>'+
            //       '.preview {font-family: document.getElementById("name").value !important;}'
            //       ).appendTo("#preview2");

            // }
            reader.onload = function (e) {
                $('#preview').css('font-size', '50px;');

            }


           reader.readAsDataURL(input.font[0]);
        }
     }

     $("#font").change(function() {
      previewfonts(this);
     });

</script>
@stop 