<?php

namespace App\Traits;

use File;
use Exception;
use Illuminate\Support\Facades\Auth;

trait ImageTrait
{
    public static function deleteImage($file)
    {
        if (Storage::exists($file)) {
            Storage::delete($file);

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
                    throw  new ApiOperationFailedException('invalid image', Response::HTTP_BAD_REQUEST);
                }
                $date = Carbon::now()->format('Y-m-d');
                $fileName = $date.'_'.uniqid().'.'.$extension;
                Storage::putFileAs($path, $file, $fileName, 'public');
            }

            return $fileName;
        } catch (Exception $e) {
            Log::info($e->getMessage());
            throw new ApiOperationFailedException($e->getMessage(), $e->getCode());
        }
    }

}
