<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFontRequest;
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
        if($request->hasFile('font')) {
            $font = $request->file('font');
            $fontName = "Font_".time().'.'.request()->font->getClientOriginalExtension();
            $fontPath = $path. "/".  $fontName;
            $font->move($path, $fontName);
            $font = new Font;
            $font->font_name = $request->name;
            $font->temp_id =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 10);;
            $font->font_path = '/'.$fontName;
            $font->save();
        }
      return back()
            ->with('success','Upload font thành công!');
    }
}
