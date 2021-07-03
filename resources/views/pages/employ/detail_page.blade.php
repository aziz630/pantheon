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
												
													<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
														Terminate Employee
													</button>
													<!--end::Button-->
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
															<h5 class="font-weight-bold mb-6">Employee Info</h5>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Picture</label>
														<div class="col-lg-9 col-xl-6">
															<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('profile') }}/{{ $employee->emp_profile_image }})">
																<div class="image-input-wrapper" style="background-image: url({{ asset('profile') }}/{{ $employee->emp_profile_image }})"></div>
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
													<!-- -->

													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Job Title</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_title }}" readonly />
														</div>
													</div>
										
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_name }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Father Name</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_fname }}" readonly />
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
															<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
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
																<input type="text" class="form-control form-control-lg form-control-solid" value="{{ $employee->emp_email }}"/>
															</div>
														</div>
													</div>


													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Phone Number</label>
														<div class="col-lg-9 col-xl-6">
															<div class="input-group input-group-lg input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" class="form-control form-control-lg form-control-solid" value="{{ $employee->emp_contact }}"/>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Address</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_address }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Date of birth</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_dob }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Experience</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_experience }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $employee->emp_gender }}" readonly />
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
															<h5 class="font-weight-bold mt-10 mb-6">Academic Info</h5>
															<h3>MATRIC</h3>
														</div>
														<br>
														<hr>
													</div>
													
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Matric passing Year</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->matric_pass_year }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Subject</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->matric_subj }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">School</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->matric_schl }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Persentage</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->matric_per }}" readonly />
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



													{{-- Secondary --}}
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6 mb-1">
															<h3>SECONDARY</h3>
														</div>
														<br>
														<hr>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Secondary passing Year</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->secondary_pass_year }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Subject</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->secondary_subj }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">School</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->secondary_schl }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Persentage</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->secondary_per }}" readonly />
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


													{{-- Graduate --}}
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h3>Graduate</h3>
														</div>
														<br>
														<hr>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Graduate passing Year</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->graduate_pass_year }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Subject</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->graduate_subj }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">School</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->graduate_schl }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Persentage</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->graduate_per }}" readonly />
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

													{{-- Post Graduate --}}
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h3>POST GRADUATE</h3>
														</div>
														<br>
														<hr>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Post Graduate passing Year</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->post_graduate_pass_year }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Subject</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->post_graduate_subj }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">School</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->post_graduate_schl }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Persentage</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->post_graduate_per }}" readonly />
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




													{{-- Any Others --}}
													<div class="row">
														<label class="col-xl-3"></label>
														<div class="col-lg-9 col-xl-6">
															<h3>ANY OTHER's</h3>
														</div>
														<br>
														<hr>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Any Other passing Year</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->any_other_pass_year }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Subject</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->any_other_subj }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">School</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->any_other_schl }}" readonly />
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 col-form-label">Persentage</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="{{ $academic->any_other_per }}" readonly />
														</div>
													</div>

													<div class="form-group row">
													<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
														Terminate Employee
														</button> -->
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




														{{-- Any Others --}}
														<div class="row">
															<label class="col-xl-3"></label>
																<div class="col-lg-9 col-xl-6">
																	<h3>Attachement files</h3>
																</div>
															<br>
															<hr>
															<div class="card-toolbar">
																<a
																	href="{{ url('/download/attached', $employee->emp_file_attachment) }}"
																	class="btn btn-primary font-weight-bolder"
																>
																	<span class="svg-icon svg-icon-md">
																		</span
																	>Download Attachement Files</a
																>
															</div>
															<!--end::Button-->
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




						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Reason for Termination</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
									<!--begin::Input-->
									<form class="form"
											method="post"
											action="{{ route('terminate_employee.update') }}"
											id="terminate_form"
											accept-charset="utf-8"
											enctype="multipart/form-data"
										>
										@csrf
										<input
										type="hidden"
										name="tId"
										value="{{ $employee->id }}"
										/>
										<div class="form-group">
											<label>Reason of Termination</label>
											
											<textarea class="form-control form-control-solid" 
											name="reasonOfTerminate" rows="5"
											placeholder="Please type Reason for Terminate"
											></textarea>
											
											<span class="form-text text-muted"
												>Please enter reason of Termination.</span
											>
										</div>
										<!--end::Input-->
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-danger">Terminate</button>
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