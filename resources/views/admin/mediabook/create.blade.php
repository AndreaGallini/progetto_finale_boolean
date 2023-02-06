@extends('layouts.admin')


@section('content')
<div class="container">


    <h1>Create mediabooks</h1>

    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.mediabooks.store') }}" method="POST" enctype="multipart/form-data"
                class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">img</label>
                    <input type="file" name="img" id="img" class="form_control @error('img') is-invalid @enderror">r
                    @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>













                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
</div>
@endsection