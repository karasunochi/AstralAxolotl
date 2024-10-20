<head>
    <link rel="stylesheet" href="{{ asset('css/Music.css') }}">
    <title>Music</title>
</head>

@extends('layouts.master')
@section('title', 'Music')

@section('content')
<div class="container-music">
    <table>
        @foreach($albums as $album)
        <tr>
            <td>
                <div class="card mb-4"> 
                    <img src="{{ asset('storage/' . $album->cover_image) }}" class="card-img-top" alt="{{ $album->title }}" width="300px">
                    <h1 class="card-title">{{ $album->title }}</h1>
                </div>
            </td>
            <td>
                <div class="tracks-list">
                    <ul>
                        @foreach($album->tracks as $track)
                            <li>{{ $track->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach 

        
    </table>
</div>
@endsection
