<?php

namespace App\Http\Controllers;
use App\Filename;
use Illuminate\Http\Request;

class FileNameController extends Controller
{
    public function uploadFilename() {
        return view('filenames.upload');
    }
    public function list() {
        $data = Filename::all();
        return view('filenames.listFilename')->with('data', $data);
    }
    public function postUploadFilename(Request $request){
        $path = public_path("uploads/files");    
            $filename = $request->file('filename');
            $fileName = "filename_".time().'.'.request()->filename->getClientOriginalExtension();
            $filePath = $path. "/".  $fileName;
            $filename->move($path, $fileName);
            $filename = new Filename;
            $filename->file_name = $request->name;
            $filename->temp_id =  substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 10);;
            $filename->file_path = '/'.$fileName;
            $filename->save();
        
      return back()
            ->with('success','Upload file thành công!');
    }
    
    public function filenameDelete($id) {
        $data_delete = Filename::find($id)->delete();
        return back()->with('success','Delete file name thành công!');
    }
}
