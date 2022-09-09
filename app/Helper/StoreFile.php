<?php

namespace App\Helper;

use Image;
use Illuminate\Support\Facades\Storage;

class StoreFile
{
    public static function storeFile($file, $path, $allowedfileExtension = ['pdf'], $old_file = '')
    {
        $allowedfileExtension = $allowedfileExtension;

        $nameDoc = date('mdYHis') . uniqid();
        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);

        if ($check) {

            Storage::delete('public/' . $path . '/' . $old_file);

            $data = $nameDoc . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs($path, $data, 'public');

            return [
                'name' => $data,
                'filePath' => $filePath,
            ];
        } else {
            return [
                'name' => 'File not allowed',
            ];
        }
    }
}
