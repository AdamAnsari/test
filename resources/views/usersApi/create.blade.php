@extends('layout.layout')

@section('body')

    <h2>Student Registration Form</h2>
    <p>Fill out the form carefully for registration</p>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="/api/student" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name" class="font-weight-bold">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
      </div>

      <div class="form-group">
        <label for="birthday" class="font-weight-bold">Birthday:</label>
        <input type="text" class="form-control" id="birthday" placeholder="Enter Birthday" name="birthday">
      </div>

      <div class="form-group">
        <div class="form-check-inline">
          <label for="gender" class="font-weight-bold">Gender:</label>
          <div class="radio">
            <label><input type="radio" name="gender" value="0"> Male</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="gender" value="1"> Female</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="state" class="font-weight-bold">State:</label>
        <select class="form-control form-control-lg" name="state" id="state" onchange="random()">
          <option value="000">-Select State-</option>
          <option value="New Delhi" id="delhi">New Delhi</option>
          <option value="Maharashtra" id="maharashtra">Maharashtra</option>
        </select>
      </div>

      <div class="form-group">
        <label for="city" class="font-weight-bold">City:</label>
        <div id="city" class="form-control"></div>
      </div>

      <div class="form-group">
        <label for="education" class="font-weight-bold">Education:</label>
        <input type="text" class="form-control" id="education" placeholder="Enter Education" name="education">
      </div>

      <div class="form-group">
        <label for="year" class="font-weight-bold">Year-Of-Completion:</label>
        <input type="text" class="form-control" id="year" placeholder="Enter Year-Of-Completion" name="year">
      </div>

      <div class="form-group">
        <label for="profile">Profile Photo</label>
        <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" id="profile" name="profile">
      </div>

      <div class="form-group">
        <label for="skill">Skills</label><br>
        <select multiple id="skills" name="skills" class="form-control">
          <option value="php">PHP</option>
          <option value="laravel">Laravel</option>
          <option value="html">HTML</option>
          <option value="css">CSS</option>
          <option value="javacsript">Javascript</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="certificate">Upload Certificates</label>
        <input type="file" class="form-control-file" id="certificate" name="certificate[]" multiple>
      </div>

      <div class="form-group">
        <div class="form-check-inline">
          <label for="profession" class="font-weight-bold">Profession:</label>
          <div class="radio">
            <label><input type="radio" name="profession" value="0"> Salaried</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="profession" value="1"> Self-employed</label>
          </div>
        </div>
      </div>

      <div class="form-group desc 0" style="display: none;">
        <label for="company" class="font-weight-bold">Company Name:</label>
        <input type="text" class="form-control" id="company" placeholder="Enter Company Name" name="company">
      </div>

      <div class="form-group desc 0" style="display: none;">
        <label for="job-started" class="font-weight-bold">Job Started from:</label>
        <input type="text" class="form-control" id="job-started" placeholder="Enter Job Started from" name="job_started">
      </div>

      <div class="form-group desc 1" style="display: none;">
        <label for="business-name" class="font-weight-bold">Business Name:</label>
        <input type="text" class="form-control" id="business-name" placeholder="Enter Business Name" name="business_name">
      </div>

      <div class="form-group desc 1" style="display: none;">
        <label for="location" class="font-weight-bold">Location:</label>
        <input type="text" class="form-control" id="location" placeholder="Enter location" name="location">
      </div>
     
      <div class="form-group">
        <label for="email" class="font-weight-bold">Email Id:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email Id" name="email">
      </div>

      <div class="form-group">
        <label for="mobile" class="font-weight-bold">Mobile No:</label>
        <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile No" name="mobile">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection




{{-- $table->id();
$table->string('name')->nullable(false);
$table->date('birthday')->nullable(false);
$table->boolean('gender')->nullable(false);
$table->string('state')->nullable(false);
$table->string('city')->nullable(false);
$table->string('education')->nullable(false);
$table->integer('year')->nullable(false);

$table->mediumText('profile')->nullable(false);
$table->string('skills')->nullable(false);
$table->mediumText('certificate')->nullable();
$table->boolean('profession')->nullable(false);
$table->string('company')->nullable();
$table->string('job_started')->nullable();
$table->string('business_name')->nullable();
$table->string('location')->nullable();
$table->string('email')->unique();
$table->unsignedBigInteger('mobile')->nullable(false);
$table->timestamps(); --}}

{{-- protected $table = 'students';
    protected $fillable = ['name', 'birthday', 'gender', 'state', 'city', 'education', 'profile', 'skills', 'certificate[]', 'profession', 'company', 'job_started', 'business_name', 'location', 'email', 'mobile']; --}}