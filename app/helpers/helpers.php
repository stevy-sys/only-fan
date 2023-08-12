<?php

use App\Models\MediaHome;

function isExistInMediaHome($media_id) {
    $exist = MediaHome::where('media_id',$media_id)->first();
    if (isset($exist)) 
        return true;
    return false;
}