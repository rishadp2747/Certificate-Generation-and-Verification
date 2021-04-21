<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Imports\UsersImport;



class ImageController extends Controller
{
    public function textOnImage()  
    {  
       
        

       $img = Image::make('images/certificate.jpg');  
       $img->text('Hello coderMen', 120, 100, function($font) {  
          $font->file('font/f.ttf');  
          $font->size(28);  
          $font->color('#4285F4');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
       $img->save('images/text_with_image.jpg');  
    }
}
