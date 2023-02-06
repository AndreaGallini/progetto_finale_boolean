@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <div>
            <a class="back-btn btn btn-dark" href="{{route('admin.apartments.index')}}">BACK</a>
            <h1>{{ $apartment->title }}</h1>
            {{-- @if($activity->categories && count($activity->categories) > 0)
            @foreach ($activity->categories as $category)
                <span>{{$category->name}}</span>
            @endforeach
            @endif --}}
            <div class="image">
                @if($apartment->cover_image)
                <img src="{{ asset('storage/' . $apartment->cover_image) }}">
                @else
                <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="">
                @endif
            </div>
            <div class="infos d-flex flex-column">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Price:</span>
                        <span>{{$apartment->price}}</span>
                    </div>
                    <div class="info-col d-flex justify-content-between">
                        <span>Slug:</span>
                        <span>{{$apartment->slug}}</span>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Category:</span>
                        @if($apartment->category)
                        <span>{{$apartment->category->name}}</span>
                        @else
                        <span>Category not specified</span>
                        @endif
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Services:</span>
                        <div class="tags">
                            @if($apartment->services && count($apartment->services) > 0)
                                @foreach ($apartment->services as $service)
                                    <small class="d-inline">{{$service->name}}</small>
                                @endforeach
                            @else
                                <span>No services Specified</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span>Sponsors:</span>
                        <div>
                            @if($apartment->sponsors && count($apartment->sponsors) > 0)
                                @foreach ($apartment->sponsors as $sponsor)
                                    <small class="d-inline p-2 rounded-pill text-white">{{$sponsor->name}}</small>
                                @endforeach
                            @else
                                <span>No Sponsors Specified</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
