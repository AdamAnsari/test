@extends('layout.layout')

@section('body')

    <div class="col-lg-12 col-lf-offset-3">
        <h1>Student Registration</h1>
        <a href="users/create" class="btn btn-primary">Add New Student</a><hr> 
		<h3>List of students: </h3>

        <ul class="list-group col-lg-1">
          @foreach($students as $student) 
        <li class="list-group-item">
          <img src="{{ asset('upload/profile_picture/' . $student->profile) }}" alt="profile" width="40px" height="20px">
        </li>
        <br>
          @endforeach
        </ul>

        <ul class="list-group col-lg-7">
        	@foreach($students as $student) 
				<li class="list-group-item">
					<a href="{{'/users/' . $student->id}}">{{$student->name}}</a>
					<span class="pull-right">{{ $student->created_at->diffForHumans() }}</span>
				</li>
        <br>
        	@endforeach
        </ul>

        <ul class="list-group col-lg-4">
        	@foreach($students as $student) 
				<li class="list-group-item">
					<a href="{{'/users/' . $student->id . '/edit'}}">Edit</a>
                    <form class="form-group pull-right" action="{{'/users/'. $student->id}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        {{-- <input type="submit" name="delete" value="delete" class="pull-right"> --}}
                        <button type="submit" class="btn btn-danger" style="padding: 2px 5px; border: none">Delete</button>
                    </form>
				</li><br>
        	@endforeach
        </ul>
    </div>
    


    <div class="col-lg-12 col-lf-offset-3">
    <h1>Import/Export files</h1>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept=".csv">
          <br>
          <button class="btn btn-success">Import User Data</button>
          <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
          <a href="{{ url('dynamic_pdf') }}" class="btn btn-danger">Convert into PDF</a>
   </form><br>

   <table class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Name</th>
       <th>Bithday</th>
       <th>Gender</th>
       <th>State</th>
       <th>City</th>
       <th>Education</th>
       <th>Year</th>
       <th>Skills</th>
       <th>Profession</th>
       <th>Email</th>
       <th>Mobile</th>
      </tr>
     </thead>
     <tbody>
     @foreach($students as $row)
      <tr>
       <td>{{ $row->name }}</td>
       <td>{{ $row->birthday }}</td>
       @if($row->gender == '0') 
        <td>Male</td>
       @else 
        <td>Female</td>
       @endif
       <td>{{ $row->state }}</td>
       <td>{{ $row->city }}</td>
       <td>{{ $row->education }}</td>
       <td>{{ $row->year }}</td>
       <td>{{ $row->skills }}</td>
       @if($row->profession == '0') 
        <td>Salaried</td>
       @else 
        <td>Self-Employed</td>
       @endif
       <td>{{ $row->email }}</td>
       <td>{{ $row->mobile }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
    </div>

@endsection