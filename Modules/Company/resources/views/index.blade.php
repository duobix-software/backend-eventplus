@extends('company::layouts.app')



@section('content')
    <div class="container min-h-screen mx-auto py-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Create a New Event</h2>

        <form action="{{ route('events.create') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
            @csrf
          

            <div class="grid grid-cols-1">
                <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                <input type="text" name="slug" id="slug" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            

            <div class="grid grid-cols-1">
                <label for="banner" class="block text-gray-700 font-semibold mb-2">Banner</label>
                <input type="file" name="banner" id="banner" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

     
            <div class="grid grid-cols-1">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

           

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Create Event</button>
            </div>


            
      
        </form>
    </div>
@endsection
