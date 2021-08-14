{{-- Extends layout --}}
@extends('layout.default') @section('styles')

@endsection

{{-- Content --}}
@section('content')

		<!--end::Header Mobile-->
		
				<!--begin::Wrapper-->
				
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Personal Information-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-12">
										<!--begin::Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Header-->
											<div class="card-header py-3">
												<div class="card-title align-items-start flex-column">
													<h3 class="card-label font-weight-bolder text-dark">Resign Employee Information</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1"> personal informaiton</span>
												</div>
												
											</div>
											<!--end::Header-->
											<!--begin::Form-->
											<form class="form">
												<!--begin::Body-->
												<div class="card-body">
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h5 class="font-weight-bold mb-6">Resign Employee Info</h5>
														</div>
													</div>
												

													<div class="card-toolbar">
														<a
															href="{{ url('/download', $employee->resig_file) }}"
															class="btn btn-primary font-weight-bolder"
														>
															<span class="svg-icon svg-icon-md">
																</span
															>Download Resigne file</a
														>
														<!--end::Button-->
													</div>
												
													
													<br>
													<br>
													<br>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Job Title</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->title }}" readonly />
														</div>
													</div>
										
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->name }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->email }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Reason of Resigne</label>
														<div class="col-lg-9 col-xl-6">
															<textarea class="form-control form-control-lg form-control-solid" rows="5" readonly >{{ $employee->reason_of_resign }}</textarea>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-6">
															<a href="{{ route('employee.approve', $employee->id) }}" class="btn btn-primary mr-2">
																Approve
															</a>
															<a href="{{ route('employee.reject', $employee->id) }}" class="btn btn-danger">
																Reject
															</a>
														</div>
													</div>
												
												</div>
												<!--end::Body-->
											</form>
											<!--end::Form-->
										</div>
									</div>
									<!--end::Content-->
								</div>
								<!--end::Profile Personal Information-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
						<br>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 400px; height: 264px;"	>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		
			
		<!--end::Main-->
		<!-- begin::User Panel-->
		@endsection
{{-- Scripts Section --}}

@section('scripts')

 @endsection