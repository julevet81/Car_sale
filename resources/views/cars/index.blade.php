@extends('dashboard.layouts.master')
@section('title')
	cars
@endsection
@section('css')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">cars</h4>
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
									Add Car
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
											<th>#</th>
											<th>Title</th>
											<th>car</th>
											<th>Model</th>
											<th>Category</th>
											<th>Price</th>
											<th>Status</th>
											<th>Views</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($cars as $car)
										<tr>
											<td>{{ $car->id }}</td>
											<td>{{ $car->title }}</td>
											<td>{{ $car->brand->name }}</td>
											<td>{{ $car->model->name }}</td>
											<td>{{ $car->category->name }}</td>
											<td>${{ number_format($car->price, 2) }}</td>
											<td><span
													class="badge bg-{{ $car->status == 'approved' ? 'success' : ($car->status == 'pending' ? 'warning' : 'secondary') }}">
													{{ ucfirst($car->status) }}
												</span></td>
											<td>{{ $car->views }}</td>
											<td>
												<a class="modal-effect btn btn-sm btn-success" href="{{ route('cars.show', $car->id) }}">show<i
														class="las la-pen"></i></a>
												<a class="modal-effect btn btn-sm btn-info" href="{{ route('cars.edit', $car->id) }}">edit<i
														class="las la-pen"></i></a>
												<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal"
													href="#delete{{$car->id}}">delete<i class="las la-trash"></i></a>
											</td>
										</tr>
										@include('cars.delete')
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
				<!--/div-->
				@include('cars.add')
			</div>
	<!-- Container closed -->
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection