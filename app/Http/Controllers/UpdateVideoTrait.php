<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Throwable;

trait UpdateVideoTrait
{

    public function uploadvideo($video, $newname, $folder)
    {
        if (file($video)) {
            $file_name = $video->getClientoriginalName();
            $file_name = explode(".", $file_name);
            $ext = end($file_name);
            $new_name = $newname . uniqid() . '.' . $ext;
            $video->storeAs($folder, $new_name, 'public');
            $video = $new_name;
        }

        return $video;
    }

    public function deleteVideo($pathImg, $folder)
    {
        if ($pathImg) {
            $destinationPath = 'public/' . $folder . '/' . $pathImg;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
        }
    }
}
