@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mt-5">
                <h2>Manage News Points</h2>
                <a href="{{route('news_point.create')}}" class="btn btn-primary mb-3">Add News Point</a>
                @if(count($news_points) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($news_points as $news_point)
                                <tr>
                                    <td>{{$news_point->latitude}}</td>
                                    <td>{{$news_point->longitude}}</td>
                                    <td>{{$news_point->address}}</td>
                                    <td class="d-flex">
                                        <form class="mx-3" action="{{ route('news_point.edit', $news_point->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                        </form>
                                        <form action="{{ route('news_point.delete', $news_point->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
