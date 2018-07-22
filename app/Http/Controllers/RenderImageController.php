<?php

namespace App\Http\Controllers;
use App\Image;
use App\Font;
use App\Filename;
use File;
use Illuminate\Http\Request;

class RenderImageController extends Controller
{
    public function index() {
        return view("index");
     }
    public function render() {
        $font_data = Font::all();
        $image_data = Image::all();
        $file_data = Filename::all();
       return view("render.render")->with(['font_data'=> $font_data,'image_data'=>$image_data,'file_data'=>$file_data]);
    }
   

    function processImage(Request $request){
            $path_filename = public_path("uploads/files");
            $filename_link = $path_filename."".$request->filename_select;
            $content = File::get($filename_link);
            $path_image = public_path("uploads/images");
            $path_font = public_path("uploads/fonts");
           
            $font_link = $path_font."".$request->font_select;
            $image_link = $path_image."".$request->image_select;
          
            $text_color1 = $request->sub_color1;
            $text_color2 = $request->sub_color2;
            $text_color3 = $request->sub_color3;
            


        
// Add text to image
            $font_size = $request->font_size;
            $textname = $request->textname;
            $fontname;	
            $quality = 100;
            $data_contents = explode("\r\n", $content);
            header("Content-type: image/png");   
            for($i=0; $i<count($data_contents); $i++) {
                $im[$i] = imagecreatefrompng($image_link);
                imagealphablending($im[$i], false);
                imagesavealpha($im[$i], true);
                // Get image dimensions
                $image_width = imagesx($im[$i]);
                $image_height = imagesy($im[$i]);
                $text_bound = imageftbbox($font_size, 0, $font_link,  $data_contents[$i]);
                // //Get the text upper, lower, left and right corner bounds
                $lower_left_x =  $text_bound[0]; 
                $lower_left_y =  $text_bound[1];
                $lower_right_x = $text_bound[2];
                $lower_right_y = $text_bound[3];
                $upper_right_x = $text_bound[4];
                $upper_right_y = $text_bound[5];
                $upper_left_x =  $text_bound[6];
                $upper_left_y =  $text_bound[7];
                // //Get Text Width and text height
                $toadoX = $request->toadoX;
                $toadoY = $request->toadoY;
                $text_width =  abs($lower_right_x - $lower_left_x); //or  $upper_right_x - $upper_left_x
                $text_height = abs($lower_right_y - $upper_right_y); //or  $lower_left_y - $upper_left_y

                $x = $toadoX - ($text_width /2);
                $y = $toadoY + ($text_height /2);

                $color['green'] = imagecolorallocate($im[$i],  $text_color1, $text_color2, $text_color3);
                imagettftext($im[$i], $font_size, 0, $x, $y,  $color['green'], $font_link, $data_contents[$i]);
                $file[] = "covers/".$data_contents[$i]."_".time().$i.".png";	
                imagepng($im[$i], $file[$i], 0);
                imagedestroy($im[$i]);
            }
       
            return back()
            ->with(['success','Upload ảnh thành công! Vui lòng vào thư mục covers để lấy ảnh']);
}


public function createImage() {
    return "AWDAWd";
}
}
