@extends('layouts.admin')

@section('title', 'Add Project - Admin Panel')

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
                <div class="p-6 text-gray-900" style="text-align: center; border: 1px solid blue">
                 @if (session('status'))
                 <div style="background-color: lightgreen;" class="alert alert-success">
                  {{ session('status') }}
                    </div>
                    @endif
                  <form action="{{route('admin.createpost')}}" method="post" enctype="multipart/form-data">
                   @csrf 
                  <input type="text" name="title" placeholder="Enter Post Title here!"> <br><br><br>
                  <textarea style="width: 400px; height: 400px;" name="description" id="">write post here!</textarea> <br><br><br>
                  <input type="file" name="image"> <br><br><br>
                  <input style="border: 1px solid blue; text-align: center; padding: 10px" type="submit" name="submit" value="add post ">
                 </form>
                </div>
            </div>
        </div>
    </div>
     @endsection
</x-app-layout>
@endsection