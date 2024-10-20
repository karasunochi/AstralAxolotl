<head>
    <link rel="stylesheet" href="{{ asset('css/Events.css') }}">
    <title>Events</title>
</head>

@extends('layouts.master')
@section('title', 'Events')

@section('content')
    <div class="container-events">
        <h1>Luminous Journey</h1>
        <h3>Upcoming Events 2025</h3>
        <table class="table-events">
            @isset($events)
                @foreach($events as $event)
                <tbody>
                    <tr>
                        <td>
                            {{ date('d M', strtotime($event->event_date)) }}
                            - {{ date('H:i', strtotime($event->event_time)) }}
                        </td>
                        <td>
                            "{{ $event->venue }}" - {{ $event->city }}
                        </td>
                        <td><a href="{{ $event->buy_tickets_url }}"  target="_blank">buy tickets</a></td>
                    </tr>
                </tbody>
                 @endforeach
            @endisset
        </table>
        <a 
            class="download_poster"
            href="{{ asset('images/style/Poster.png') }}"  
            target="_blank" download class="download_poster_btn"
        >
            download poster
        </a>
    </div>
@endsection