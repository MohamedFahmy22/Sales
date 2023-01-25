<?php

use Illuminate\Support\Facades\Config;

function saveImage($folder, $image)
{
    /* $file_extension = $photo->getClientOriginalExtension(); // jpg , png ...   + name of photo
    $file_name = time() . '.' .$file_extension;                     //  تغيير اسم الصوره بال الداله time  علشان الاسم ميتكررش
    $path = $folder;                            // الباس اللي هخزن فيه ع الجهاز او السرفر الملفات او الصور
    $photo->move($path,$file_name);    //     شيل الصوره من الريكويست اللي جاي منن الفورم وحطه فى الباس اللي انا معرفة
    return $file_name; */


    $extension = strtolower($image->extension());
    $filename = time() . rand(100, 999) . '.' . $extension;
    $image->getClientOriginalName = $filename;
    $image->move($folder, $filename);
    return $filename;

}


?>
