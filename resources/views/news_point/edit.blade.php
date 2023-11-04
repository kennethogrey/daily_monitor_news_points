@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="mt-5">
                <h2>Edit News Point</h2>
                <form method="post" action="{{route('news_point.update', ['id' => $news_point->id] )}}">
                    @csrf
                    <div class="form-group my-3">
                        <label for="latitude">Latitude:</label>
                        <input type="text" class="form-control" name="latitude" value="{{ $news_point->latitude }}">
                    </div>
                    @error('latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group my-3">
                        <label for="longitude">Longitude:</label>
                        <input type="text" class="form-control" name="longitude" value="{{ $news_point->longitude }}">
                    </div>
                    @error('longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group my-3">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{ $news_point->address }}">
                    </div>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary my-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
