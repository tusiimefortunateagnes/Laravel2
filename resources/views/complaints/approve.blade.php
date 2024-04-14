@extends('layouts.app')
@section('title','Edit')

@section('content')
    <div class="col-md-8 mt-3">
        <form method="POST" action="/complaints/update/{{$complaint->id}}" class="form" >
            @method('PUT')
            @csrf
            <label for="category">Status:{{$complaint->status == 0  ? 'Pending' : 'Approved' }}</label>
            <br>
    <select name="status" id="category" class="form-control">
        <optgroup label="Complaint categories">
            <option value="1" class="dropdown-item">Approve</option>
            <option value="0" class="dropdown-item">Decline</option>
        </optgroup>
    </select>
    <br>
            <div class="mb-4 form-group">
                <button class="btn btn-outline-primary m-1">Update</button>
                <a href="/home" class="btn btn-outline-dark m-1">Cancel</a>
            </div>
        </form>

    </div>
    </div>

    @endsection

