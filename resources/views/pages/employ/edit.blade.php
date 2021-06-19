{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<link
    href="{{ asset('css/pages/wizard/wizard-2.css') }}"
    rel="stylesheet"
    type="text/css"
/>
@endsection

{{-- Content --}}
@section('content')

{{-- Add new Student form --}}

<!--begin::Container-->
<form
    class="form"
    method="post"
    action="{{ route('employee.update') }}"
    id="hiring_form"
    accept-charset="utf-8"
    enctype="multipart/form-data"
>
  @csrf
  <input
  type="hidden"
  name="eId"
  value="{{ $employee->id }}"
/>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')

            <div class="row">
                <div class=" col-xxl-12">
                    
                    <h4 class="mb-10 font-weight-bold text-dark">
                       Edit Employee Applicatiion Form
                       
                    </h4>
                    {{-- @include('pages.employ.partialsEdit.personal_details') --}}
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Post Title</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="title"
                                    placeholder="Enter Post Title"
                                    value="{{ $employee->emp_title }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter post title.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="fullName"
                                    placeholder="Full Name"
                                    value="{{ $employee->emp_name }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter your full name.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Father's/Husband's Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="fName"
                                    placeholder="Father Name"
                                    value="{{ $employee->emp_fname }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter your father name.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Current Address</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="empCurrentAddress"
                                    placeholder="employ current address"
                                    value="{{ $employee->emp_address }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter student current Address.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Contact No.</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="empContact"
                                    placeholder="Employee mobile number"
                                    value="{{ $employee->emp_contact }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter contact number</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="empDOB"
                                    readonly
                                    id="dob"
                                    placeholder="Month/Day/Year"
                                    value="{{ $employee->emp_dob }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter date of birth.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control form-control-solid"
                                    name="empEmail"
                                    placeholder="employee@example.com"
                                    value="{{ $employee->emp_email }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter email address.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Permanent Address</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="empPermanentAddress"
                                    placeholder="Enter permanent address"
                                    value="{{ $employee->emp_permanent_address }}"
                                />
                                <span class="form-text text-muted"
                                    >Please enter permanent Address.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Profile picture</label>
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input form-control-solid"
                                        name="image"
                                        id="File"
                                    />
                                    <label class="custom-file-label" for="cnicFile"
                                        >Choose file</label
                                    >
                                </div>
                                <span class="form-text text-muted"
                                    >Please browse attachement file.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                       
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Nationality</label>
                                <div class="col-12 col-form-label">
                                    <div class="radio-inline">
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input
                                                type="radio"
                                                name="empNationality"
                                                checked="checked"
                                                value="pakistani"{{ $employee->emp_nationality == 'pakistani' ? 'selected' : ''}}
                                            />
                                            <span></span>
                                            Pakistani
                                        </label>
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input type="radio" name="empNationality" value="forigner"{{ $employee->emp_nationality == 'forigner' ? 'selected' : ''}} />
                                            <span></span>
                                            Forigner
                                        </label>
                                    </div>
                                </div>
                                <span class="form-text text-muted"
                                    >Please select nationality.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="col-12 col-form-label">
                                <div class="radio-inline">
                                    <label
                                        class="radio radio-outline radio-outline-2x radio-primary"
                                    >
                                        <input
                                            type="radio"
                                            name="empGender"
                                            checked="checked"
                                            value="male" {{ $employee->emp_gender == 'male' ? 'selected' : ''}}
                                        />
                                        <span></span>
                                        Male
                                    </label>
                                    <label
                                        class="radio radio-outline radio-outline-2x radio-primary"
                                    >
                                        <input type="radio" name="empGender" value="female" {{ $employee->emp_gender == 'female' ? 'selected' : ''}} />
                                        <span></span>
                                        Female
                                    </label>
                                    <label
                                        class="radio radio-outline radio-outline-2x radio-primary"
                                    >
                                        <input type="radio" name="empGender" value="other" {{ $employee->emp_gender == 'other' ? 'selected' : ''}} />
                                        <span></span>
                                        Other
                                    </label>
                                </div>
                            </div>
                            <span class="form-text text-muted"
                                >Please select student gender</span
                            >
                        </div>
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Religion</label>
                                <div class="col-12 col-form-label">
                                    <div class="radio-inline">
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input
                                                type="radio"
                                                name="empReligion"
                                                checked="checked"
                                                value="muslim" {{ $employee->emp_religion == 'muslim' ? 'selected' : ''}}
                                            />
                                            <span></span>
                                            Muslim
                                        </label>
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input type="radio" name="empReligion" value="none-nuslim" {{ $employee->emp_religion == 'none-muslim' ? 'selected' : ''}} />
                                            <span></span>
                                            None-Muslim
                                        </label>
                                    </div>
                                </div>
                                <span class="form-text text-muted"
                                    >Please select your religion.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Marital Status </label>
                                <div class="col-12 col-form-label">
                                    <div class="radio-inline">
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input
                                                type="radio"
                                                name="empStatus"
                                                checked="checked"
                                                value="single" {{ $employee->emp_status == 'single' ? 'selected' : ''}}
                                            />
                                            <span></span>
                                            Single
                                        </label>
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input type="radio" name="empStatus" value="married" {{ $employee->emp_status == 0 ? 'selected' : ''}} />
                                            <span></span>
                                            Married
                                        </label>
                                    </div>
                                </div>
                                <span class="form-text text-muted"
                                    >Please select your status.</span
                                >
                            </div>
                        </div>   
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>Employee</label>
                                <div class="col-12 col-form-label">
                                    <div class="radio-inline">
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input
                                                type="radio"
                                                name="empSatus"
                                                checked="checked"
                                                value="1" {{ $employee->is_employee == 1 ? 'selected' : ''}}
                                            />
                                            <span></span>
                                            Admin
                                        </label>
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input type="radio" name="empSatus" value="2" {{ $employee->is_employee == 2 ? 'selected' : ''}}/>
                                            <span></span>
                                        Teacher
                                        </label>
                                        <label
                                            class="radio radio-outline radio-outline-2x radio-primary"
                                        >
                                            <input type="radio" name="empSatus" value="3" {{ $employee->is_employee == 3 ? 'selected' : ''}} />
                                            <span></span>
                                            Domestic Employee
                                        </label>
                                    </div>
                                </div>
                                <span class="form-text text-muted"
                                    >Please select Employee Status</span
                                >
                            </div>
                        </div> 
                    </div>         
                    <hr />
                    
                    <hr />
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    
                   <h4 class="mb-10 font-weight-bold text-dark">
                    </h4>
                    <h4 class="mb-10 font-weight-bold text-dark">
                    	ACADEMIC INFORMATION
                    </h4>
                    <h2>Matric</h2>
                    @include('pages.employ.partialsEdit.academicMatric')
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    <h2>Secondary</h2>
                    @include('pages.employ.partialsEdit.academicSecondary')
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    <h2>Graduation</h2>
                    @include('pages.employ.partialsEdit.academicGraduation')
                </div>
            </div>
        </div>
    </div>
    
    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    <h2>Post-Graduation M.Phil/Ph.D etc</h2>
                    @include('pages.employ.partialsEdit.academicPostGraduation')
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    <h2>Any Others</h2>
                    @include('pages.employ.partialsEdit.academicAnyOther')
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    <h2>Experience</h2>
                    @include('pages.employ.partialsEdit.experience')
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save
                    </button>
                    <a href="{{ url('classes') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</form>
<!--end::Container-->


@endsection

{{-- Scripts Section --}}
@section('scripts')
{{-- <script src="{{
        asset('js/pages/custom/wizard/student_enrollment_validation.js')
    }}"></script> --}}

<script>
    var KTBootstrapDatepicker = (function() {
        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            };
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
        }

        // Private functions
        var demos = function() {
            // minimum setup
            $("#dob").datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            });

            $("#admissionDate").datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            });
        };

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    })();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();

    });
</script>

@endsection
