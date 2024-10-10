<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizers</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Organizer List')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Organizer</h1>
        <a href="{{ route('organizers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Create</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th >No</th>
                <th >Organizer Name</th>
                <th >About</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organizers as $key => $organizer)
            <tr class=>
                <td class="py-2 px-4 border-b hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('organizers.show', $organizer->id) }}'">{{ $key + 1 }}</td>
                <td class="py-2 px-4 border-b hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('organizers.show', $organizer->id) }}'">{{ $organizer->name }}</td>
                <td class="py-2 px-4 border-b hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('organizers.show', $organizer->id) }}'">{{ Str::limit($organizer->description, 50) }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('organizers.edit', $organizer->id) }}" class="text-yellow-500 mr-2">✏️</a>
                    <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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