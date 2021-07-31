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
													<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
													<span class="text-muted font-weight-bold font-size-sm mt-1">your personal informaiton</span>
												</div>
												<div class="card-toolbar">
												
													<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#withdrawModel">
														Withdraw Student
													</button> 
													<!--end::Button -->
												</div>
												
											</div>
										<!-- end::Header -->
											<!--begin::Form-->
											<form class="form">
												<!--begin::Body-->
												<div class="card-body">
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h5 class="font-weight-bold mb-6">Student Info</h5>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Picture</label>
														<div class="col-lg-9 col-xl-6">
															<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('stdProfile') }}/{{ $student->std_image }})">
																<div class="image-input-wrapper" style="background-image: url({{ asset('profile') }}/{{ $student->emp_profile_image }})"></div>
																<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																	<i class="fa fa-pen icon-sm text-muted"></i>
																	<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
																	<input type="hidden" name="profile_avatar_remove" />
																</label>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
																<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
																	<i class="ki ki-bold-close icon-xs text-muted"></i>
																</span>
															</div>
															{{-- <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span> --}}
														</div>
													</div>

													<div class="card-toolbar">
														<a
															href="{{ url('/download/cnic', $guardian->grd_cnic_copy) }}"
															class="btn btn-primary font-weight-bolder"
														>
															<span class="svg-icon svg-icon-md">
																</span
															>Download guardian CNIC</a
														>
														<!--end::Button-->
													</div>
													<br>
													<br>
													<br>
													<!-- -->

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Student ID</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->id }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_name }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Father Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_father_name }}" readonly />
														</div>
													</div>
								
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_email }}" readonly />
														</div>
													</div>

													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_gender }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Address</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_current_address }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Permanant Address</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_permanent_address }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Admission Date</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_admission_date }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Emergency Contact</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_emergency_contact_no }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Date Of Birth</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_dob }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Place Of Birth</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_pob }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Nationality</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_nationality }}" readonly />
														</div>
													</div>

													

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Father CNIC</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_father_cnic }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Father Occupation</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $student->std_father_occupation }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Discount</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $discount['0']->discount }} %" readonly />
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
											
											<!--begin::Form-->
											<form class="form">
												<!--begin::Body-->
												<div class="card-body">

													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h5 class="font-weight-bold mt-10 mb-6">Guardian Info</h5>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Guardian Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $guardian->grd_name }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
														<div class="col-lg-9 col-xl-6">
															<div class="input-group input-group-lg input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-at"></i>
																	</span>
																</div>
																<input type="text" class="form-control form-control-lg form-control-solid" value="{{ $guardian->grd_email }}"/>
															</div>
														</div>
													</div>


													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Guardian Mobile</label>
														<div class="col-lg-9 col-xl-6">
															<div class="input-group input-group-lg input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" class="form-control form-control-lg form-control-solid" value="{{ $guardian->grd_mobile }}"/>
															</div>
														</div>
													</div>

													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Home Number</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $guardian->grd_home_ph }}" readonly />
														</div>
													</div>	

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Guardian CNIC</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $guardian->grd_cninc_no }}" readonly />
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Occupation</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $guardian->grd_occupation }}" readonly />
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
											
											<!--begin::Form-->
											<form class="form">
												<!--begin::Body-->
												<!-- <div class="card-body">

													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h5 class="font-weight-bold mt-10 mb-6">Enrollment Info</h5>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Class Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="" readonly />
														</div>
													</div>

												
													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Section Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="" readonly />
														</div>
													</div>	
												
													
												</div> -->
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

					
						<div class="modal fade" id="withdrawModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Reason for Withdraw</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
									<!--begin::Input-->
									<form class="form"
											method="post"
											action="{{ route('withdraw_student.update') }}"
											id="terminate_form"
											accept-charset="utf-8"
											enctype="multipart/form-data"
										>
										@csrf
										<input
										type="hidden"
										name="wId"
										value="{{ $student->id }}"
										/>
										<div class="form-group">
											<label>Reason of Withdraw</label>
											
											<textarea class="form-control form-control-solid" 
											name="reasonOfWithdraw" rows="5"
											placeholder="Please type Reason for Terminate"
											></textarea>
											
											<span class="form-text text-muted"
												>Please enter reason of Withdraw.</span
											>
										</div>
										<!--end::Input-->
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-danger">Withdraw</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						
		<!--end::Main-->
		<!-- begin::User Panel-->
		@endsection
{{-- Scripts Section --}}

@section('scripts') @endsection