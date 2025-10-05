<x-app-layout>
    <x-slot name="header">{{ $project->title }}</x-slot>

    @section('content')
    <div class="max-w-3xl mx-auto py-12">
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $project->title }}</h1>

        <!-- Image -->
        @if($project->image)
            <img src="{{ asset('img/'.$project->image) }}" 
                 class="w-full h-72 object-cover rounded-lg shadow mb-6" 
                 alt="{{ $project->title }}">
        @endif

        <!-- Description -->
        <p class="text-gray-700 leading-relaxed mb-6">
            {{ $project->description }}
        </p>

        <!-- Download File -->
       @if($project->file)
    <div class="text-center">
        <a href="{{ asset('files/'.$project->file) }}" 
           target="_blank"
           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition transform hover:scale-105">
            <i class="fa fa-file-pdf mr-2"></i> Download Project File
        </a>
    </div>
@endif

    </div>
    @endsection
</x-app-layout>
