@extends('layout.layout')

@section('body')
<br>
    <div class="col-lg-12 col-lf-offset-3">
        <h1>Student Details: </h1>
        <strong><ul class="list-group col-lg-12">
          <li class="list-group-item" style="margin-bottom: 5px">
            Name: {{ $students->name }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            Birthday: {{ $students->birthday }}
          </li>
          @if($students->gender == '0')
            <li class="list-group-item" style="margin-bottom: 5px">
              Gender: "Male"
            </li>  
          @else
            <li class="list-group-item" style="margin-bottom: 5px">
              Gender: "Female"
            </li>
          @endif
          <li class="list-group-item" style="margin-bottom: 5px">
            State: {{ $students->state }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            City: {{ $students->city }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            Education: {{ $students->education }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            Year of Completion: {{ $students->year }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            Skills: {{ $students->skills }}
          </li>
          @if($students->profession == "Salaried")
          <li class="list-group-item" style="margin-bottom: 5px">
            Profession: "Salaried"
          </li>
          @else
          <li class="list-group-item" style="margin-bottom: 5px">
            Profession: "Self Employed"
          </li>
          @endif
          <li class="list-group-item" style="margin-bottom: 5px">
            Email: {{ $students->email }}
          </li>
          <li class="list-group-item" style="margin-bottom: 5px">
            Mobile: {{ $students->mobile }}
          </li>

        </ul></strong>
    </div>

@endsection