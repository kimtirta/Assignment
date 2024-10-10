<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($organizer) ? 'Edit Organizer' : 'Create Organizer' }}</title>
</head>
<body>
@extends('layouts.app')

@section('title', isset($organizer) ? 'Edit Organizer' : 'Create Organizer')

@section('content')
    <h1 class="text-3xl font-bold mb-6">{{ isset($organizer) ? 'Edit Organizer' : 'Create Organizer' }}</h1>

    <!-- Form to handle both Create and Update actions -->
    <form action="{{ isset($organizer) ? route('organizers.update', $organizer->id) : route('organizers.store') }}" method="POST" class="space-y-6">
        @csrf
        @if(isset($organizer))
            @method('PUT') <!-- Update method for edit -->
        @endif

        <!-- Organizer Name -->
        <div>
            <label for="name" class="block text-gray-700">Organizer Name</label>
            <input type="text" name="name" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($organizer) ? $organizer->name : old('name') }}" required>
        </div>

        <!-- Facebook and X Links (in one row) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <div>
                <label for="facebook_link" class="block text-gray-700">Facebook</label>
                <input type="url" name="facebook_link" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($organizer) ? $organizer->facebook_link : old('facebook_link') }}">
            </div>
            <div>
                <label for="x_link" class="block text-gray-700">X</label>
                <input type="url" name="x_link" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($organizer) ? $organizer->x_link : old('x_link') }}">
            </div>
        </div>

        <!-- Website Link -->
        <div>
            <label for="website_link" class="block text-gray-700">Website</label>
            <input type="url" name="website_link" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($organizer) ? $organizer->website_link : old('website_link') }}">
        </div>

        <!-- Description (About Organizer) -->
        <div>
            <label for="description" class="block text-gray-700">About</label>
            <textarea name="description" class="mt-1 block w-full h-48 border border-black focus:border-black rounded-md shadow-sm">{{ isset($organizer) ? $organizer->description : old('description') }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 font-bold py-2 px-4 rounded">
                {{ isset($organizer) ? 'Update' : 'Create' }} Organizer
            </button>
            <a href="{{ route('organizers.index') }}" class="border-black border bg-white-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
@endsection

</body>
</html>
