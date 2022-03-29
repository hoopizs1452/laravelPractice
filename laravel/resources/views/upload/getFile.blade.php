@extends('layouts.app')

@section('content')

<div>
    
<!-- <img src="http://192.168.230.128:8015/storage/6O6Ijeq.png"> -->
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>All File</h2><br /><br />

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
                //echo $file->getAllFile();
                $fileList = $file->getAllFile();
                $count = 1;
                for ($i=0; $i < count($fileList); $i++ ) { 
                    
            ?>
            <!-- <img src="http://192.168.66.81:8013/storage/<?php //echo $fileList[$i]; ?>" width="600" heigh="400"> -->
            <form class="form-horizontal" role="form" action="downloadFile/<?php echo $fileList[$i]; ?>" method="GET">
                <div class="form-group">
                    <input type="image" src="http://192.168.66.81:8013/storage/<?php echo $fileList[$i]; ?>" name="imgName" width="100" heigh="80" />
                </div>
                
            </form>

        <?php } ?>
        </div>
    </div>
</div>

@endsection