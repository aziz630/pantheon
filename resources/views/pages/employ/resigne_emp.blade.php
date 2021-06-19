{{-- Extends layout --}}
@extends('layout.emp_default') @section('styles')
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
    action="{{ route('employee.save') }}"
    id="hiring_form"
    accept-charset="utf-8"
    enctype="multipart/form-data"
>
    @csrf

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')

            <div class="row">
                <div class=" col-xxl-12">
                    
                    <h4 class="mb-10 font-weight-bold text-dark">
                        Resignation Form
                    </h4>
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="name"
                                    placeholder="Name"
                                    value=""
                                />
                                <span class="form-text text-muted"
                                    >Please enter post name.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>ERP Number</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="erpNumber"
                                    placeholder="ERP Number"
                                    value=""
                                />
                                <span class="form-text text-muted"
                                    >Please enter your ERP number.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Designation</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="designation"
                                    placeholder="Designation"
                                    value=""
                                />
                                <span class="form-text text-muted"
                                    >Please enter your designation.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Reason of resign</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="reason"
                                    placeholder="Reason of resign"
                                    value=""
                                />
                                <span class="form-text text-muted"
                                    >Please enter reason of resigne.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>upload resignation letter </label>
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
                        
                    <hr />
                    
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

@endsection
