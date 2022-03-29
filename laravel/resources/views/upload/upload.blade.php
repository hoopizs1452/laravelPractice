@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Upload File</h2>

            <form action="upload" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file"><br/><br/>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </div>
</div>

@endsection