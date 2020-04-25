@extends('layout.layout')

@section('body')

<div class="col-lg-12 col-lf-offset-3">
<h1>Student Registration</h1>
<a href="student/create" class="btn btn-primary">Add New Student</a><hr> 

<h3>List of students: </h3>
@foreach($students as $student) 

    <ul class="list-group col-lg-7">
        <li class="list-group-item">
            <a href="{{'student/' . $student->id}}">{{$student->name}}</a>
            <span class="pull-right">{{ $student->created_at->diffForHumans() }}</span>
        </li>
    </ul>

    <ul class="list-group col-lg-1">
        <li class="list-group-item">
            <a href="{{'student/' . $student->id}}"><button class="btn btn-primary" style="padding: 2px 5px; border: none">Show</button></a>
        </li>
    </ul>

    <ul class="list-group col-lg-4">
        <li class="list-group-item">
            <a href="{{'student/' . $student->id . '/edit'}}">Edit</a>
        <form class="form-group pull-right" action="{{'student/'. $student->id}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            {{-- <input type="submit" name="delete" value="delete" class="pull-right"> --}}
            <button type="submit" class="btn btn-danger" style="padding: 2px 5px; border: none">Delete</button>
        </form>
        </li>
    </ul>
@endforeach

@endsection