<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Throwable;

trait UpdateImgageTrait
{

    public function uploadimage($image, $newname, $folder)
    {
        if (file($image)) {
            $file_name = $image->getClientoriginalName();
            $file_name = explode(".", $file_name);
            $ext = end($file_name);
            $new_name = $newname . uniqid() . '.' . $ext;
            $image->storeAs($folder, $new_name, 'public');
            $image = $new_name;
        }
        return $image;
    }

    public function deleteImage($pathImg, $folder)
    {
        if ($pathImg) {
            $destinationPath = 'public/' . $folder . '/' . $pathImg;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
        }
    }
}
