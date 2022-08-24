<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait UpdateSubtitleTrait
{
    
    public function uploadsubtitle($subtitle, $newname, $folder)
    {
        if (file($subtitle)) {
            $file_name = $subtitle->getClientoriginalName();
            $file_name = explode(".", $file_name);
            $ext = end($file_name);
            $new_name = $newname . uniqid() . '.' . $ext;
            $subtitle->storeAs($folder, $new_name, 'public');
            $subtitle = $new_name;
        }
        return $subtitle;
    }

    public function deletesubtitle($pathImg, $folder)
    {
        if ($pathImg) {
            $destinationPath = 'public/' . $folder . '/' . $pathImg;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
        }
    }
}
