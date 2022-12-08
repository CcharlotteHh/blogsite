<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post{
    
    public static function all(){
        return File::files(resource_path("posts/"));
    }
    public static function find($slug) {

        base_path();
           
   if(! file_exists($path = resource_path("posts/{$slug}.html"))){
    ddd('error');
}

   return cache()->remember("posts.{$slug}", 5,function() use ($path){
    return file_get_contents($path);
   });
    
 
    }
}