@extends('layouts.app')

@section('content')

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
                $count = 0;
            ?>
            <table border=0>
            <tr>
            <!-- <img src="http://192.168.66.81:8013/storage/<?php //echo $fileList[$i]; ?>" width="600" heigh="400"> -->
            <?php
                foreach ($fileList as $img) { 
                    if($count%5==0) echo '</tr><tr>';

            ?>
            <td>
                <form action="downloadFile/<?php echo $img; ?>" method="GET">
                    <input type="image" src="http://192.168.66.81:8013/storage/<?php echo $img; ?>" width="100" heigh="80" style="object-fit: cover" />
                </form>
            </td>
            <?php
                    $count++;
                }
            ?>
            </tr>
            </table>
        </div>
    </div>
</div>

@endsection