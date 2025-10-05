@extends('layouts.admin')

@section('title', 'All Posts - Admin Panel')

@section('content')
    <h1 style="margin-bottom:20px;">All Posts</h1><x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
                {{ __('Admin Dashboard') }}
            @else
                {{ __('User Dashboard') }}
            @endif
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('status'))
                        <div style="background-color: lightgreen; padding:10px; margin-bottom:15px;" class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      
                    <!-- Posts Table -->
                    <h1 style="color: #333; text-align: center; margin-bottom: 30px;">Posts Management</h1>
                       <div class="flex items-center gap-4 mb-6">
   

</div>



                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                            <thead>
                                <tr style="background-color: #4CAF50; color: white;">
                                    <th style="padding: 12px 15px; text-align: left;">ID</th>
                                    <th style="padding: 12px 15px; text-align: left;">Title</th>
                                    <th style="padding: 12px 15px; text-align: left;">Description</th>
                                    <th style="padding: 12px 15px; text-align: left;">Image</th>
                                    <th style="padding: 12px 15px; text-align: left;">Update</th>
                                    <th style="padding: 12px 15px; text-align: left;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 12px 15px;">{{ $post->id }}</td>
                                        <td style="padding: 12px 15px;">{{ $post->title }}</td>
                                        <td style="padding: 12px 15px;">{{ Str::limit($post->description, 100) }}</td>
                                        <td style="padding: 12px 15px;">
                                            <img style="width: 100px; height: 100px;" src="{{ asset('img/'.$post->image) }}" alt="{{ $post->image }}">
                                        </td>
                                       <td style="padding: 12px 15px;">
    <form action="{{ route('admin.update', $post->id) }}" method="GET">
        <button type="submit"
            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-colors duration-300 flex items-center gap-2">
            <i class="fa fa-edit"></i> Update
        </button>
    </form>
</td>
<td style="padding: 12px 15px;">
    <form action="{{ route('admin.deletepost', $post->id) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this post?');">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition-colors duration-300 flex items-center gap-2">
            <i class="fa fa-trash"></i> Delete
        </button>
    </form>
</td>






                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
@endsection