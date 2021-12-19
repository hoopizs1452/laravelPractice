@extends('base.index')
@section('content')

<h1>Upload File</h1>
<form action="upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"><br/><br/>
    <button type="submit" class="btn btn-primary">Upload File</button>
</form>

@endsection