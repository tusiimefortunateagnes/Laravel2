@extends('layouts.app')

@section('content')
@
    <!-- <h1>Complaints</h1> -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>User ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->id }}</td>
                        <td>{{ $complaint->category }}</td>
                        <td>{{ $complaint->description }}</td>
                        <td>{{ $complaint->user_id }}</td>
                        <td>{{ $complaint->created_at }}</td>
                        <td>{{ $complaint->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
