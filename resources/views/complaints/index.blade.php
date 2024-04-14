@extends('layouts.app')
@section('content')
<!-- <a href='/complaints/create' class="btn btn-outline-dark btn-md mb-3 mt-0 mr-3 ml-3 w-100">New complaint</a> -->

<h5 class="my-4 text-muted">You have {{$complaints->count()}} complaints </h5>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Description</th>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Timestamp</th>
                    {{-- only for admins --}}
                    {{-- @if (Auth::user()->role == 1) --}}
                    <th>actions</th>
                    {{-- @endif --}}

                </tr>
            </thead>
            <tbody>
            @if ($complaints->count() > 0)
                @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->category }}</td>
                    <td>{{ $complaint->description }}</td>
                    <td>{{ $complaint->user_id }}</td>
                    <td>{{ $complaint->status == 0 ? 'Pending':'Approved'  }}</td>
                    <td class="text-muted"> {{$complaint->updated_at->diffForHumans()}} </td>

                    <td style="display: flex;flex-direction:row;justify-content:space-between;">
                        @if(Auth::user()->role == 1)
                            @if ($complaint->status == 0)
                                <a href="/complaints/{{ $complaint->id }}/approve" class="btn btn-outline-success" style="text-decoration:none;">Approve</a>
                            @endif
                        @endif
                        @if (Auth::user()->role == 0)
                        <a href="/complaints/{{ $complaint->id }}/edit" class="btn btn-outline-primary" style="text-decoration:none;">Edit</a>
                        <form action="/complaints/{{$complaint->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                        @endif

                        {{-- <a href="/complaints/{{ $complaint->id }}/edit" class="btn btn-outline-danger" style="text-decoration:none;">Delete</a> --}}

                    </td>

                </tr>
            @endforeach
                @else
                    <tr>
                        <td colspan="6">No Complaints yet submitted.</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

{{--
@if (Auth::user()->role == 1)
@if ($complaints->count() > 0)
@foreach($complaints as $complaint)

<div class = "card m-3">
    <!-- <p>{{$complaint->user_name}}</p> -->
    <div class="card-body text-center">
        <h6 class="card-title text-uppercase">{{$complaint->category}} </h6>
        <hr>
        <p class="card-text">{{$complaint->description}} </p>
        <a href="/complaints/{{ $complaint->id }}/edit" class="btn btn-outline-primary mb-2" style="text-decoration:none;">Edit</a>
    </div>
    <div class="card-footer text-muted"> {{$complaint->updated_at->diffForHumans()}} </div>
</div>
@endforeach
@endif
@endif --}}
@endsection
