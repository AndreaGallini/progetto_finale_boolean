@extends('layouts.admin')

@section('content')
<h1>Edit mediabook: {{$mediabook->title}}</h1>
<div class="row bg-white">
    <div class="col-12">
        <form action="{{route('admin.mediabooks.update', $mediabook->slug)}}" method="POST"
            enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex">
                <div class="media me-4">
                    <img class="shadow" width="150" src="{{asset('storage/' . $mediabook->img)}}"
                        alt="{{$mediabook->img}}">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">img</label>
                    <input type="file" name="img" id="img" class="form-control  @error('img') is-invalid @enderror">
                    @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
</div>

@endsection