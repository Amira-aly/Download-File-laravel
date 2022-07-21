@extends("layouts.app")

@section("content")
<h1 class="text-center">Show File</h1>
<div class="container col-6">
    <div class="card">
        File Title : {{$file->title}}
        <div class="card-body">
            File Description : {{$file->description}}
            File Name : {{$file->file}}
        </div>
        <a href="{{route('file.download', $file->id)}}" class="btn btn-success"><i class="fa-solid fa-download"></i> Download</a>
    </div>
</div>
@endsection
