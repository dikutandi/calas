<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Response;
use Validator;

class UploadController extends Controller
{
    public function storeZip(Request $request)
    {
        $input = Input::all();

        $rules = [
            'files' => 'max:10000|mimes:application/zip,application/x-rar,application/x-7z-compressed',
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            //return Response::make($validation->errors->first(), 400);
            return Response::json('Format File Salah', 400);
        }

        // try {
        //     $upload->process($file);
        // } catch (Exception $exception) {
        //     // Something went wrong. Log it.
        //     Log::error($exception);
        //     $error = [
        //         'name'  => $file->getClientOriginalName(),
        //         'size'  => $file->getSize(),
        //         'error' => $exception->getMessage(),
        //     ];
        //     // Return error
        //     return Response::json($error, 400);
        // }

        // // If it now has an id, it should have been successful.
        // if ($upload->id) {
        //     $newurl = URL::asset($upload->publicpath() . $upload->filename);

        //     // this creates the response structure for jquery file upload
        //     $success               = new stdClass();
        //     $success->name         = $upload->filename;
        //     $success->size         = $upload->size;
        //     $success->url          = $newurl;
        //     $success->thumbnailUrl = $newurl;
        //     $success->deleteUrl    = action('UploadController@delete', $upload->id);
        //     $success->deleteType   = 'DELETE';
        //     $success->fileID       = $upload->id;

        //     return Response::json(['files' => [$success]], 200);
        // } else {
        //     return Response::json('Error', 400);
        // }
    }
}
