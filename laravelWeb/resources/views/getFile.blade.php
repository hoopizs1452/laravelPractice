@extends('base.index')
@section('content')

<h1>getAllFile</h1><br /><br />

<div>
    <?php
        //::的第一種用法，Controller的function需加static
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\UploadController;

        // echo UploadController::getAllFile();

        //::的第二種用法，Controller的function需加static
        //echo App\Http\Controllers\UploadController::getAllFile();

        //Controller不用static
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\UploadController;

        $file = new UploadController();
        echo $file->getAllFile();
        
    ?>
</div>

@endsection