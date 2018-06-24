<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Font;


class FontController extends Controller
{
    public function upload() {
        return view('fonts.upload');
    }
    public function listFonts() {
        $data = Font::all();
        return view('fonts.listFont')->with('data', $data);
    }
    
    public function uploadfile(UploadFontRequest $request){
        $path = public_path("uploads/fonts");
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "Image_".$request->name."_".time().'.'.request()->image->getClientOriginalExtension();
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
}
