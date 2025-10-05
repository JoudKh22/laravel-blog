@extends('layouts.admin')

@section('title', 'All Projects - Admin Panel')

@section('content')
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
        @foreach($projects as $project)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px 15px;">{{ $project->id }}</td>
            <td style="padding: 12px 15px;">{{ $project->title }}</td>
            <td style="padding: 12px 15px;">{{ Str::limit($project->description, 100) }}</td>
            <td style="padding: 12px 15px;">
                <img src="{{ asset('img/'.$project->image) }}" style="width: 100px; height: 100px;">
            </td>
            <td style="padding: 12px 15px;">
                <form action="{{ route('admin.editproject', $project->id) }}" method="GET">
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-colors duration-300 flex items-center gap-2">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                </form>
            </td>
            <td style="padding: 12px 15px;">
                <form action="{{ route('admin.deleteproject', $project->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this project?');">
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

@endsection