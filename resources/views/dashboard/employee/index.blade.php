@extends('dashboard.layouts.master')
@section('title')
  employees
@endsection
@section('css')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Employees</h4>
						</div>
					</div>
					
				</div>
				
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
										Add Employee
									</button>
								</div>
							</div>
							<div>
								@if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
								@if($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">Name</th>
												<th class="border-bottom-0">Email</th>
												<th class="border-bottom-0">Phone</th>
												<th class="border-bottom-0">Address</th>
												<th class="border-bottom-0">Status</th>
												<th class="border-bottom-0">Image</th>
												<th class="border-bottom-0">Salary</th>
												<th class="border-bottom-0">Start Date</th>
												<th class="border-bottom-0">Position</th>
												<th class="border-bottom-0">Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($employees as $employee)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $employee->user->name }}</td>
												<td>{{ $employee->user->email }}</td>
												<td>{{ $employee->user->phone }}</td>
												<td>{{ $employee->user->address }}</td>
												<td>{{ $employee->user->status }}</td>
												<td>{{ $employee->user->image }}</td>
												<td>{{ $employee->salary }}</td>
												<td>{{ $employee->start_date }}</td>
												<td>{{ $employee->position }}</td>
												<td>
													<a class="modal-effect btn btn-sm btn-success" href="{{ route('employee.show', $employee->id) }}">show<i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-info"  href="{{ route('employee.edit', $employee->id) }}">edit<i class="las la-pen"></i></a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$employee->id}}">delete<i class="las la-trash"></i></a>
												</td>
											</tr>
											@include('dashboard.employee.delete')
											@endforeach
										</tbody>
									</table>
								</div>
							</div>

						</div>
						
					</div>
					<!--/div-->
					@include('dashboard.employee.add')
				</div>
		<!-- Container closed -->
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection