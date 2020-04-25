@extends('layout.layout')

@section('body')
<br/>
<div class="row">
	<div class="col-md-12" align="right">
		<a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
	</div>
</div>
<br />
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Birthday</th>
				<th>State</th>
				<th>City</th>
				<th>Education</th>
				<th>Email</th>
				<th>Mobile</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customer_data as $customer)
				<tr>
					<td>{{ $customer->name }}</td>
					<td>{{ $customer->birthday }}</td>
					<td>{{ $customer->state }}</td>
					<td>{{ $customer->city }}</td>
					<td>{{ $customer->education }}</td>
					<td>{{ $customer->email }}</td>
					<td>{{ $customer->mobile }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection