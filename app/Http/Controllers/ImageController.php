<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use App\Image;

class ImageController extends Controller
{
    public function upload() {
        return view('images.upload');
    }
    public function listImages() {
        $data = Image::all();
        return view('images.listImage')->with('data', $data);
    }
    
    public function uploadfile(UploadImageRequest $request){
        $path = public_path("uploads/images");
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "Image_".time().'.'.request()->image->getClientOriginalExtension();
            $imagePath = $path. "/".  $imageName;
            $image->move($path, $imageName);
            $image = new Image;
            $image->image_name = $request->name;
            $image->image_path = '/'.$imageName;
            $image->save();
        }
      return back()
            ->with('success','Upload ảnh thành công!');
    }
    public function imageDelete($id) {
        $data_delete = Image::find($id)->delete();
        return back()->with('success','Delete ảnh thành công!');
    }
}
