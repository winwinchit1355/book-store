<?php

namespace App\Traits;


use Exception;
use Storage;
use Illuminate\Support\Carbon;

trait ImageTrait
{
    public static function deleteImage($file)
    {
        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);

            return true;
        }
        return false;
    }

    public static function makeImage($file, $path)
    {
        try {
            $fileName = '';
            if (! empty($file)) {
                $extension = $file->getClientOriginalExtension(); // getting image extension
                if (! in_array(strtolower($extension), ['jpg', 'gif', 'png', 'jpeg'])) {
                    return redirect()->back()->with('fail','Invalid image');
                }
                $date = Carbon::now()->format('Y-m-d');
                $fileName = $path.$date.'_'.uniqid().'.'.$extension;
                Storage::disk('public')->put($fileName,file_get_contents($file));
            }

            return $fileName;
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

}
