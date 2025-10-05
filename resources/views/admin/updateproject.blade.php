@extends('layouts.admin')

@section('title', 'Update Project - Admin Panel')

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
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900" style="text-align: center; border: 1px solid blue;">

                @if (session('status'))
                    <div style="background-color: lightgreen; padding:10px; margin-bottom:15px;" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('admin.updateproject', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  

                    <input type="text" name="title" value="{{ $project->title }}" 
                           style="width: 400px; padding: 8px; border: 1px solid blue; margin-bottom: 20px;"> 
                    <br>

                    <textarea name="description" 
                              style="width: 400px; height: 200px; padding: 8px; border: 1px solid blue; margin-bottom: 20px;">{{ $project->description }}</textarea> 
                    <br>

                    @if($project->image)
                        <label style="background-color: lightgreen; padding: 5px;">Current Image</label><br>
                        <img src="{{ asset('img/'.$project->image) }}" 
                             style="width: 100px; height: 100px; margin: 15px auto; display:block;" 
                             alt="{{ $project->image }}">
                        <br>
                    @endif

                    <label style="background-color: lightgreen; padding: 5px;">Upload New Image</label>
                    <input type="file" name="image" style="margin-bottom: 20px;"> 
                    <br>

                    @if($project->file)
                        <label style="background-color: lightgreen; padding: 5px;">Current File</label><br>
                        <a href="{{ asset('files/'.$project->file) }}" target="_blank" 
                           style="color: blue; text-decoration: underline; display:block; margin-bottom: 15px;">
                           {{ $project->file }}
                        </a>
                    @endif

                    <label style="background-color: lightgreen; padding: 5px;">Upload New File</label>
                    <input type="file" name="file" style="margin-bottom: 20px;"> 
                    <br>

                    <input type="submit" value="Update Project" 
                           style="border: 1px solid blue; text-align: center; padding: 10px; cursor:pointer; background:#f0f8ff;">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
</x-app-layout>
@endsection