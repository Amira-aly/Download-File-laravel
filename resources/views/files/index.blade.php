@extends("layouts.app")

@section("content")
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
<h1 class="text-center">All Files</h1>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>File Title</td>
                    <td colspan="3">Action</td>
                </tr>
                @foreach ($files as $item)
                <tr>
                    <td> {{$item->title }} </td>
                    <td><a href="{{route('file.show', $item->id)}}" class="text-primary"><i class="fa-solid fa-eye"></i></a></td>
                    <td><a href="{{route('file.edit', $item->id)}}" class="text-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('file.destroy', $item->id)}}" class="text-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
