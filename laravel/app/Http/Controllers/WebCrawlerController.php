<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebCrawlerController extends Controller
{
    public function index(){
        $array = array();
        if ($file = fopen("/home/hawkpoter/Desktop/output.txt", "r")) {
            while(!feof($file)) {
                $line = fgets($file);
            // echo ($line);
            array_push($array, $line);
            }
            fclose($file);
        }
        return $array;
    }
}
