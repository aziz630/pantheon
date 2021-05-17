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
    })();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();

        $("#class").on("change", function() {
            let classID = $(this).val();
            let section = $("#sections");

            if (!classID) return false;

            $.post(
                "{{ url('get_all_sections_for_class') }}",
                { classID: classID, _token: "{{ csrf_token() }}" },
                function(data) {
                    if (data.status == 200) {
                        let sections = data.data;
                        if (!sections.length) return false;
                        let processedSections = `<option>Select Section</option>`;
                        processedSections += sections.map(
                            item =>
                                `<option value="${item.id}">${item.section_name}</option>`
                        );
                        sections = undefined;

                        section.html(processedSections);
                    }
                }
            );

            if ($("#session").val() != "") {
                let sessionID = $("#session").val();

                $.post(
                    "{{ url('get_fee_structure') }}",
                    {
                        classID: classID,
                        sessionID: sessionID,
                        _token: "{{ csrf_token() }}"
                    },
                    function(data) {
                        if (data) {
                            $("#fee_collection_form").html(data);
                        } else {
                            $("#fee_collection_form").html(
                                `<h3>Please first create <b>Fee Structure</b> for the selected <b>Class</b></h3>`
                            );
                        }
                    }
                );
            }
        });
    });
</script>

@endsection
