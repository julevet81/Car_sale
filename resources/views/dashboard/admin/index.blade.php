@extends('dashboard.layouts.master')
@section('title')
	admins
@endsection
@section('css')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">admins</h4>
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
									Add admin
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
											<th class="border-bottom-0" style="width: 250px">admins Name</th>
											<th class="border-bottom-0" style="width: 250px">Email</th>
											<th class="border-bottom-0">Phone</th>
											<th class="border-bottom-0">Adress</th>
											<th class="border-bottom-0">Status</th>
											<th class="border-bottom-0">Image</th>
											<th class="border-bottom-0">Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($admins as $admin)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $admin->user->name }}</td>
												<td>{{ $admin->user->email }}</td>
												<td>{{ $admin->user->phone }}</td>
												<td>{{ $admin->user->address }}</td>
												<td>
													<span class="badge {{ $admin->user->status == 'active' ? 'badge-success' : 'badge-danger' }}">
														{{ ucfirst($admin->user->status) }}
													</span>
												</td>
												<td>{{ $admin->user->image_url }}</td>
												<td>
													<a class="modal-effect btn btn-sm btn-success" href="{{ route('admin.show', $admin->id) }}">show<i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-info"  href="{{ route('admin.edit', $admin->id) }}">edit<i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$admin->id}}">delete<i class="las la-trash"></i></a>
												</td>
											</tr>
											@include('dashboard.admin.delete')
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--/div-->
				@include('dashboard.admin.add')
			</div>
	<!-- Container closed -->
@endsection
@section('js')
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection