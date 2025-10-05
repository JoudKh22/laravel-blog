@extends('layouts.admin')

@section('title', 'Messages - Admin Panel')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Messages
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('status'))
                        <div style="background-color: lightgreen; padding:10px; margin-bottom:15px;" class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 style="color: #333; text-align: center; margin-bottom: 30px;">All Contact Messages</h1>

                    @if($messages->isEmpty())
                        <p class="text-gray-500 text-center">No messages found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                <thead>
                                   <tr style="background-color: #4CAF50; color: white;">
                                        <th style="padding: 12px 15px; text-align: left;">ID</th>
                                        <th style="padding: 12px 15px; text-align: left;">Name</th>
                                        <th style="padding: 12px 15px; text-align: left;">Email</th>
                                        <th style="padding: 12px 15px; text-align: left;">Message</th>
                                        <th style="padding: 12px 15px; text-align: left;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $msg)
                                        <tr class="border-b hover:bg-gray-100 text-center">
                                            <td style="padding: 12px 15px;">{{ $msg->id }}</td>
                                            <td style="padding: 12px 15px;">{{ $msg->name }}</td>
                                            <td style="padding: 12px 15px;">{{ $msg->email }}</td>
                                            <td style="padding: 12px 15px;">{{ $msg->message }}</td>
                                            <td style="padding: 12px 15px;">{{ $msg->created_at->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
@endsection