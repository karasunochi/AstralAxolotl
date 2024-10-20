<head>
    <link rel="stylesheet" href="{{ asset('css/Archive.css') }}">
    <title>Archive</title>
</head>

@extends('layouts.master')
@section('title', 'Archive')
@section('content')

<div class="container-archive">
    <div class="sidebar">
        <ul>
            <li><a href="{{ route('archive.index', ['category' => 'photo']) }}">Photo</a></li>
            <li><a href="{{ route('archive.index', ['category' => 'arts']) }}">Art</a></li>
            <li><a href="{{ route('archive.index', ['category' => 'backstage']) }}">Backstages</a></li>
        </ul>
    </div>

    <div class="media-gallery">
        @foreach($mediaItems as $item)
            <div class="media-item" onclick="openMedia('{{ asset('storage/' . $item->path) }}')">
                @if(str_contains($item->path, '.jpg') || str_contains($item->path, '.png') || str_contains($item->path, '.gif'))
                    <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->title }}">
                @endif </div>
        @endforeach
    </div>
    
</div>

<div id="mediaModal" class="modal" style="display:none;">
    <span class="close" onclick="closeMedia()">&times;</span>
    <img id="modalImage" class="modal-content" style="display:none;">
</div>

<script>
    function openMedia(src) {
        const modal = document.getElementById('mediaModal');
        const modalImage = document.getElementById('modalImage');

        modalImage.src = src;
        modalImage.style.display = 'block';
        
        modal.style.display = 'block';
    }

    function closeMedia() {
        const modal = document.getElementById('mediaModal');
        modal.style.display = 'none';
        document.getElementById('modalImage').style.display = 'none';
    }
</script>

@endsection
