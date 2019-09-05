<?php

namespace App\Services;

class UploadService
{
    public function processImage($type, $request, $allowedFileTypes, $width, $height)
    {
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();

        if (!in_array($extension, $allowedFileTypes)) {
            return $this->dzError('The file you uploaded is not in the list of allowed file types (' . implode(', ', $allowedFileTypes) . ')');
        }

        $filename = $file->getClientOriginalName();
        $filenameNoExtension = str_replace('.' . $extension, '', $filename);
        $storeFilename = str_slug($filenameNoExtension) . '.' . $extension;

        // Store file
        $file->storeAs('', $storeFilename, $type);

        return response()->json([
            'filename' => $storeFilename
        ]);
    }


    protected function dzError($msg)
    {
        return response()->json([
            'error' => true,
            'message' => $msg,
            'code' => 500
        ], 500);
    }
}