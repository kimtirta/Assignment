<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? 'Edit Event Category' : 'Create Event Category' }}</title>
</head>
<body>
@extends('layouts.app')

@section('title', isset($category) ? 'Edit Event Category' : 'Create Event Category')

@section('content')
    <h1 class="text-3xl font-bold mb-6">{{ isset($category) ? 'Edit Event Category' : 'Create Event Category' }}</h1>

    <!-- Form to handle both Create and Update actions -->
    <form action="{{ isset($category) ? route('event_categories.update', $category->id) : route('event_categories.store') }}" method="POST" class="space-y-6">
        @csrf
        @if(isset($category))
            @method('PUT') <!-- Update method for edit -->
        @endif

        <!-- Event Category Name -->
        <div>
            <label for="name" class="block text-gray-700">Event Category Name</label>
            <input type="text" name="name" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($category) ? $category->name : old('name') }}" required>
        </div>

        

        <!-- Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 font-bold py-2 px-4 rounded">
                {{ isset($category) ? 'Update' : 'Create' }} Category
            </button>
            <a href="{{ route('event_categories.index') }}" class="border-black border bg-white-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
@endsection

</body>
</html>
