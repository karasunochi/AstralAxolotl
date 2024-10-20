<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/Home.css') }}">
    <title>Astral Axolotl</title>
</head>
<body>
    @extends('layouts.master')

    @section('title', 'Home')

    @section('content')
        <div class="container-home">
            <h1>Welcome to Astral Axolotl</h1>
            <p>New album is available now</p>
            <img src="{{ asset('images/style/StarlightGlimmer.png') }}" alt="logo">
            <a href="store"><button>Buy Album now</button></a>
            <a href="https://music.yandex.ru/home" target="_blank"><button>Listen on Yandex Music</button></a>
            <a href="https://music.vk.com/" target="_blank"><button>Listen on VK Music</button></a>
        </div>    
    @endsection

</body>
</html>