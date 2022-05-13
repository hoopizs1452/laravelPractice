<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Factory;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Salary;

class UploadController extends Controller
{
    public function index(Request $req){
        $fileName = $req->file('file')->getClientOriginalName();
        $req->file('file')->storeAs('img', $fileName);
        return redirect()->to('/getFile');
    }

    public function show($value){
        return response()->json([
            'status'=>200,
            'test'=>$value,
        ]);
    }

    public function filter(Request $request)
    {
        $request->validate([
            'fil' => 'required'
        ]);

        // $month = $request->fil;
        $value = $request->input('fil');
        // $salaries = Salary::whereRaw('MONTH(date) = '.$month)->orderBy('date', 'ASC')->paginate(7);
        // return view('ptSalary', compact('salaries'));
        return view('welcome', compact('value'));
        // return redirect()->route('wel')->with( ['value' => $value] );
    }

    public function getAllFile(){
        $entry = scandir(storage_path("app/img"));
        $fileList = array();

        foreach ($entry as $key => $value) {
            if ($value != "." && $value != "..") {
                //echo "$value <br>\n";
                array_push($fileList, $value);
            }
        }

        return $fileList;
    }

    public function downloadFile($file){//string $file
        $fileExtension = substr($file, -4);
        $filePath = storage_path("app/img/$file");//
    	$headers = ['Content-Type: application/JPEG'];
    	// $fileName = time().$fileExtension;
        $fileName = $file;

    	return response()->download($filePath, $fileName, $headers);
    }
}
