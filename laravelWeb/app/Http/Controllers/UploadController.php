<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Factory;

class UploadController extends Controller
{
    public function index(Request $req){
        $fileName = $req->file('file')->getClientOriginalName();
        return $req->file('file')->storeAs('img', $fileName);
    }

    public function getAllFile(){
        $entry = scandir(storage_path("app/img"));

        foreach ($entry as $key => $value) {
            if ($value != "." && $value != "..") {
                echo "<img src='http://192.168.230.128:8015/storage/$value'><br>\n";
            }
        }
    }

    public function downloadFile($file){
        
        $filePath = storage_path("app\\img\\$file");//IMG_3698.jpg
    	$headers = ['Content-Type: application/JPEG'];
    	$fileName = time().'.img';

    	return response()->download($filePath, $fileName, $headers);
    }
}
