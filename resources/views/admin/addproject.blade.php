
@extends('layouts.admin')

@section('title', 'Add Post - Admin Panel')

@section('content')
<x-app-layout>
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
                <div class="p-6 text-gray-900" style="text-align: center; border: 1px solid blue;">
                    
                    @if (session('status'))
                        <div style="background-color: lightgreen; padding:10px; margin-bottom:15px;" class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.createproject') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="title" placeholder="Project Title" 
                               style="width: 400px; padding: 10px; border: 1px solid blue; margin-bottom: 20px;"> <br>

                        <textarea name="description" placeholder="Project Description" 
                                  style="width: 400px; height: 400px; padding: 10px; border: 1px solid blue; margin-bottom: 20px;"></textarea> <br>

                        <input type="file" name="image" style="margin-bottom: 20px;"> <br>

                        <label>Upload File</label> <br>
                        <input type="file" name="file" style="margin-bottom: 20px;"> <br>

                        <input type="submit" value="Add Project" 
                               style="border: 1px solid blue; text-align: center; padding: 10px; cursor: pointer;">
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
@endsection