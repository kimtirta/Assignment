<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>events</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'event List')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">event</h1>
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Create</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th >No</th>
                <th >Event Name</th>
                <th >Date</th>
                <th >Location</th>
                <th >Organizer</th>
                <th >about</th>
                <th >Tags</th>
                <th >Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach($events as $key => $event)
                <tr class="hover:bg-gray-100 cursor-pointer">
                    <!-- Event Number -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $key + 1 }}</td>

                    <!-- Event Name -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->title }}</td>

                    <!-- Date -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->date }} | {{ $event->start_time }}</td>

                    <!-- Location -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->venue }}</td>

                    <!-- Organizer -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->organizer->name }}</td>

                    <!-- About This Event -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ Str::limit($event->description, 50) }}</td>
                    <!-- Tags -->
                    <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">
                        @php
                            $tags = explode(',', $event->tags);
                        @endphp
                        @foreach($tags as $index => $tag)
                            <span class=" text-black-700 px-2 py-1 border-full text-xs border-2 border-black-300">
                                {{ trim($tag) }}
                                
                            </span>
                        @endforeach
                    </td>

                <td class="py-2 px-4 border-b">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 mr-2">✏️</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


</body>
</html>