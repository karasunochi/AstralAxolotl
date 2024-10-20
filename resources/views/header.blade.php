<head>
    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>


<div class="header">
    <a class="sitelogo" href="/">
        <img class="logo" src="{{ asset('images/style/logo.png') }}" alt="logo">
    </a>

    <ul class="actions">
        <li>
            <a class="navigateBtn {{ Request::route()->getName() == 'events.index' ? 'active' : '' }}" href="{{ route('events.index') }}">Events</a>
        </li>
        <li>
            <a class="navigateBtn  {{ Request::route()->getName() == 'store.index' ? 'active' : '' }}" href="{{ route('store.index') }}">Store</a>
        </li>
        <li>
            <a class="navigateBtn  {{ Request::route()->getName() == 'albums.index' ? 'active' : '' }}" href="{{ route('albums.index') }}">Music</a>
        </li>
        <li>
            <a class="navigateBtn {{ Request::route()->getName() == 'archive.index' ? 'active' : '' }}" href="{{ route('archive.index') }}">Archive</a>
        </li>
    </ul>

</div>
