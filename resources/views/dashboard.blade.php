<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           @if(Auth::user() && Auth::user()->usertype == 'admin')
    <div class="mt-4 flex gap-2">
        <a href="{{ route('admin.addpost') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Post</a>
        <a href="{{ route('admin.allpost') }}" class="bg-green-600 text-white px-4 py-2 rounded">Manage Posts</a>
    </div>
@endif

        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    @if(Auth::check() && Auth::user()->usertype == 'admin')
                        {{ __("You're logged in as Admin!") }}
                    @else
                        {{ __("You're logged in as User!") }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
