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


{{-- Error Validation Messages --}}
   
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
                        Employee Applicatiion Form
                    </h4>
                    @include('pages.employ.partials.personal_details')
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
                    @include('pages.employ.partials.academicMatric')
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
                    @include('pages.employ.partials.academicSecondary')
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
                    @include('pages.employ.partials.academicGraduation')
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
                    @include('pages.employ.partials.academicPostGraduation')
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
                    @include('pages.employ.partials.academicAnyOther')
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
                    @include('pages.employ.partials.experience')
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

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".realprocode").remove();
      });
    });
</script>

@endsection
