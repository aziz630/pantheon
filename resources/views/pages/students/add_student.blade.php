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
    action="{{ route('student.enroll') }}"
    id="enrollment_form"
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
                        Enter Student Personal Info
                    </h4>
                    @include('pages.students.partials.personal_details')
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
                        Student Addresses
                    </h4>
                    @include('pages.students.partials.addresses')
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
                        Enter student guardian info
                    </h4>
                    @include('pages.students.partials.guardians')
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
                        Enroll student into your desired class -
                        section
                    </h4>
                    @include('pages.students.partials.enrollment')
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')
            <div class="row">
                <div class=" col-xxl-12">
                    
                   <!--begin::Section-->
                    <h4 class="mb-10 font-weight-bold text-dark">
                        Collect fee and enroll
                    </h4>
                    <div id="fee_collection_form"></div>
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
    });
</script>

@endsection
