@extends('dashboard.layouts.master')
@section('title')
	customers
@endsection
@section('css')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">customers</h4>
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
									Add customer
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
											<th class="border-bottom-0" style="width: 50px">#</th>
											<th class="border-bottom-0" style="width: 250px">customer Name</th>
											<th class="border-bottom-0" style="width: 250px">Email</th>
											<th class="border-bottom-0">Phone</th>
											<th class="border-bottom-0">Adress</th>
											<th class="border-bottom-0">Status</th>
											<th class="border-bottom-0">Image</th>
											<th class="border-bottom-0">Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($customers as $customer)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $customer->user->name }}</td>
												<td>{{ $customer->user->email }}</td>
												<td>{{ $customer->user->phone }}</td>
												<td>{{ $customer->user->address }}</td>
												<td>
													<span class="badge {{ $customer->user->status == 'active' ? 'badge-success' : 'badge-danger' }}">
														{{ ucfirst($customer->user->status) }}
													</span>
												</td>
												<td>{{ $customer->user->image_url }}</td>
												<td>
													<a class="modal-effect btn btn-sm btn-success" href="{{ route('customer.show', $customer->id) }}">show<i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-info"  href="{{ route('customer.edit', $customer->id) }}">edit<i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$customer->id}}">delete<i class="las la-trash"></i></a>
												</td>
											</tr>
											@include('customer.delete')
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
				<!--/div-->
				@include('customer.add')
			</div>
	<!-- Container closed -->
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection