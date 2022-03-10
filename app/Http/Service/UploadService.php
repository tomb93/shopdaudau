<?php

namespace App\Http\Service;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');
            dd($path);
        }
    }
}
