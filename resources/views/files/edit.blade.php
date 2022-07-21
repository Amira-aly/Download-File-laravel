@extends("layouts.app")

@section("content")

@if ($errors->any())
    <div class="container col-8">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if (Session::has("done"))
    <div class="container col-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get("done") }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
<h1 class="text-center">Edit File</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >File Tilte</label>
                    <input type="text" class="form-control" value="{{$file->title}}" name="title">
                </div>
                <div class="form-group">
                    <label >File Description</label>
                    <input type="text" class="form-control" value="{{$file->description}}" name="description">
                </div>
                <div class="form-group">
                    <label>Upload Your File</label>
                    <input type="file" class="form-control" value="{{$file->file}}" name="file">
                </div>
                <button class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </div>
</div>
@endsection
