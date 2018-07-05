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
            header("Content-type: image/jpeg");   
            for($i=0; $i<count($data_contents); $i++) {
                
              
            $im[$i] = imagecreatefromjpeg($image_link);
                    // Éc éc 
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
                
                $file[] = "covers/".time().$i.".jpg";	
                imagejpeg($im[$i], $file[$i], $quality);
                imagedestroy($im[$i]);
                // dd($file);
                // return $file[$i];
            }
       
            return back()
            ->with(['success','Upload ảnh thành công! Vui lòng vào thư mục covers để lấy ảnh']);
            
           
          
			
			// setup the text colours
		// 	$color['grey'] = imagecolorallocate($im, 54, 56, 60);
		// 	$color['green'] = imagecolorallocate($im, 55, 189, 102);
			
		// 	// this defines the starting height for the text block
        //     // $y = imagesy($im) - $height - 365;
        //     $y = imagesy($im) - 100 - 365;
			 
        // // loop through the array and write the text	
        // $i =30;
		// foreach ($user as $value){
		// 	// center the text in our image - returns the x value
        //     $x = center_text($value['name'], $value['font-size']);	
           
		// 	imagettftext($im, $value['font-size'], 0, $x, $y+$i, $color[$value['color']], 'C:/xampp/htdocs/render/public/uploads/fonts/Font_Avo_1530193920.ttf',$value['name']);
		// 	// add 32px to the line height for the next text block
		// 	$i = $i+32;	
			
		// }
			// create the image
           
            // return "OKat";
			
	//}
						
        
        
}


public function createImage() {
    return "AWDAWd";
}
}
