@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>顯示卡資訊</h2><br /><br />

            <?php
                
                use Illuminate\Support\Facades\Route;
                use App\Http\Controllers\WebCrawlerController;

                $file = new WebCrawlerController();
                $fileList = $file->index();
                $count = 0;

                foreach ($fileList as $vga) {
                    echo $vga;
                    echo "<br />";
                }
            ?>
            <!-- <table border=0>
            <tr>
            <?php
                // foreach ($fileList as $img) { 
                //     if($count%5==0) echo '</tr><tr>';

            ?>
            <td>
                <form action="downloadFile/<?php //echo $img; ?>" method="GET">
                    <input type="image" src="http://192.168.66.81:8013/storage/<?php //echo $img; ?>" width="100" heigh="80" style="object-fit: cover" />
                </form>
            </td>
            <?php
                    // $count++;
                //}
            ?>
            </tr>
            </table> -->
        </div>
    </div>
</div>

@endsection