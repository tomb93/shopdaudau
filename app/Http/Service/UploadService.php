<?php

namespace App\Http\Service;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $pathFull = 'uploads/' . date("Y/m/d");
                $name = $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $ex) {
                return false;
            }
        }
    }
}
