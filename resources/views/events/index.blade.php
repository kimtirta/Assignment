<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizers</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Events</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
        <a href="{{ route('events.show', $event->id) }}">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <!-- Default Banner Image -->
                <img src="https://via.placeholder.com/300x200" alt="Event Banner" class="w-full h-40 object-cover mb-4">

                <h3 class="text-gray-600">{{ $event->title }}</h3>
                <p class="text-xl font-semibold mb-2">{{ $event->date }} | {{ $event->start_time }}</p>
                <p class="text-gray-700 mb-4">{{ $event->venue }}</p>

                <div class="mb-4">
                    <p class="text-grey-500 font-bold">Free</p>
                    <p class="text-gray-500">Organizer: {{ $event->organizer->name }}</p>
                    </div>
            </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">
    {{ $events->links('pagination::tailwind') }}  <!-- Tailwind-styled pagination -->
</div>
@endsection

</body>
</html>
