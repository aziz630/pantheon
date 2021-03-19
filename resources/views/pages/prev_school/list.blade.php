{{-- Extends layout --}}
@extends('layout.default') 

@section('styles')
<link
    href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet"
    type="text/css"
/>
@endsection

{{-- Content --}}
@section('content')

{{-- Previous school info --}}
<!--begin::Card-->
<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Previous School Information") }}
            </h3>
        </div>
        <div class="card-toolbar">
            <a
                href="{{ url('student/'.$student->id.'/edit_previous_school') }}"
                class="btn btn-primary font-weight-bolder"
            >
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        version="1.1"
                    >
                        <g
                            stroke="none"
                            stroke-width="1"
                            fill="none"
                            fill-rule="evenodd"
                        >
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000"
                                opacity="0.3"
                            />
                        </g>
                    </svg>
                    <!--end::Svg Icon--> </span
                >Edit Info</a
            >
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        @include('pages.alerts.alerts')
        <!--begin: Datatable-->
        <div class="jumbotron">
            <h3 class="text">
                ID: {{ $student->id }} <br />
                {{ $student->std_name }}
                {{ $student->std_gender == 1 ? 's/o' : 'd/o' }}
                {{ $student->std_father_name }}
            </h3>
        </div>
        <table
            class="table table-hover table-checkable"
            id="sessions"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>School Name</th>
                    <th>School Contact</th>
                    <th>School Address</th>
                    <th>Student Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $prev_school->previous_school->prevSch_name }}</td>
                    <td>
                        {{ $prev_school->previous_school->prevSch_phone_no }}
                    </td>
                    <td>
                        {{ $prev_school->previous_school->prevSch_address }}
                    </td>
                    <td>
                        {{ $prev_school->prevSchRem_remarks }}
                    </td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-primary">
            <label
                >See Documents? <input type="checkbox" id="document" value="yes"
            /></label>
        </h3>
        <table
            class="table table-hover table-checkable"
            id="documentsBody"
            style="margin-top: 13px !important; display:none;"
        >
            <thead>
                <tr>
                    <th>Certicate</th>
                    <th>Is Provided?</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>School Leaving Certificate (SLC)</td>
                    <td>
                        {{ $prev_school->prevSchRem_slc !== '' ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        {!! $prev_school->prevSchRem_slc !== '' ? '<a href="'.asset('media/uploads/school_documents/'.$prev_school->prevSchRem_slc).'" target="_blank"
                            >view</a
                        >' : 'file not available' !!}
                    </td>
                </tr>
                <tr>
                    <td>Character Certificate (CS)</td>
                    <td>
                        {{ $prev_school->prevSchRem_c_c !== '' ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        {!! $prev_school->prevSchRem_c_c !== '' ? '<a href="'.asset('media/uploads/school_documents/'.$prev_school->prevSchRem_c_c).'" target="_blank"
                            >view</a
                        >' : 'file not available' !!}
                    </td>
                </tr>
                <tr>
                    <td>Sports Certificate (SC)</td>
                    <td>
                        {{ $prev_school->prevSchRem_s_c !== '' ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        {!! $prev_school->prevSchRem_s_c !== '' ? '<a href="'.asset('media/uploads/school_documents/'.$prev_school->prevSchRem_s_c).'" target="_blank"
                            >view</a
                        >' : 'file not available' !!}
                    </td>
                </tr>
                <tr>
                    <td>Last Exam Report</td>
                    <td>
                        {{ $prev_school->prevSchRem_last_exam_report !== '' ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        {!! $prev_school->prevSchRem_last_exam_report !== '' ?
                        '<a href="'.asset('media/uploads/school_documents/'.$prev_school->prevSchRem_last_exam_report).'" target="_blank">view</a>' : 'file not available' !!}
                    </td>
                </tr>
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!-- end::Card -->

@endsection

{{-- Scripts Section --}}
@section('scripts')

<!--begin::Page Vendors(used by this page)-->
<script src="{{
        asset('plugins/custom/datatables/datatables.bundle.js')
    }}"></script>
<!--end::Page Vendors-->

{{--
<script src="{{
        asset('js/pages/crud/datatables/data-sources/ajax-server-side.js')
    }}"></script>

--}}
<script>
    $(document).ready(function() {
        $("#document").change(function() {
            if (!$(this).is(":checked")) {
                $("#documentsBody").css("display", "none");
            } else {
                $("#documentsBody").css("display", "table");
            }
        });
    });
</script>
@endsection
