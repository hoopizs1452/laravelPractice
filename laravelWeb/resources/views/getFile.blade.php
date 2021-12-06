@extends('base.index')
@section('content')

<h1>getAllFile</h1><br /><br />

<div>
    <?php
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\UploadController;

        // echo UploadController::getAllFile();

        echo App\Http\Controllers\UploadController::getAllFile();
        
    ?>
</div>

@endsection