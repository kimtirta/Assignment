<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Categories</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Event Categories List')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Event Categories</h1>
        <a href="{{ route('event_categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Create</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th>No</th>
                <th>Event Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
            <tr>
                <td class="py-2 px-4 border-b hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('event_categories.show', $category->id) }}'">{{ $key + 1 }}</td>
                <td class="py-2 px-4 border-b hover:bg-gray-100 cursor-pointer" onclick="window.location='{{ route('event_categories.show', $category->id) }}'">{{ $category->name }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('event_categories.edit', $category->id) }}" class="text-yellow-500 mr-2">✏️</a>
                    <form action="{{ route('event_categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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
