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

@php 
    $search = false;
@endphp

{{-- Add new Student form --}}
<!--begin::Card-->
<div class="card card-custom mb-7" id="student_filteration">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">{{ __('Students Filteration') }} <small>optional</small></h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Toggle Card">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
        <form class="mb-15" method="post" action="">
            @csrf
            <div class="row mb-6">
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>ERP No:</label>
                    <input
                        type="text"
                        class="form-control datatable-input"
                        placeholder="E.g: RSM_1"
                        data-col-index="0"
                        name="erp_no"
                    />
                </div>
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Name:</label>
                    <input
                        type="text"
                        class="form-control datatable-input"
                        placeholder="E.g: Ahmad"
                        data-col-index="1"
                        name="student_name"
                    />
                </div>
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Class:</label>
                    <select
                        class="form-control datatable-input"
                        data-col-index="2"
                        name="class"
                    >
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Section:</label>
                    <select
                        class="form-control datatable-input"
                        data-col-index="2"
                        name="section"
                    >
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Status:</label>
                    <select
                        class="form-control datatable-input"
                        data-col-index="6"
                        name="status"
                    >
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>Gender:</label>
                    <select
                        class="form-control datatable-input"
                        data-col-index="7"
                        name="gender"
                    >
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
            <div class="row mt-8">
                <div class="col-lg-12">
                    <button
                        class="btn btn-primary btn-primary--icon"
                        id="kt_search"
                    >
                        <span>
                            <i class="la la-search"></i>
                            <span>Search</span>
                        </span></button
                    >&#160;&#160;
                    <button
                        class="btn btn-secondary btn-secondary--icon"
                        id="kt_reset"
                    >
                        <span>
                            <i class="la la-close"></i>
                            <span>Reset</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end::Card -->

<!-- begin::card -->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-user text-primary"></i>
            </span>
            <h3 class="card-label">{{ isset($search) && $search ? 'Filtered Students' : 'All Students' }}</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button
                    type="button"
                    class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
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
                                <path
                                    d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                    fill="#000000"
                                    opacity="0.3"
                                />
                                <path
                                    d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                    fill="#000000"
                                />
                            </g>
                        </svg>
                        <!--end::Svg Icon--> </span
                    >Export
                </button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi flex-column navi-hover py-2">
                        <li
                            class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2"
                        >
                            Choose an option:
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-print"></i>
                                </span>
                                <span class="navi-text">Print</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-copy"></i>
                                </span>
                                <span class="navi-text">Copy</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-excel-o"></i>
                                </span>
                                <span class="navi-text">Excel</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-text-o"></i>
                                </span>
                                <span class="navi-text">CSV</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="la la-file-pdf-o"></i>
                                </span>
                                <span class="navi-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a href="{{ url('enroll_student') }}" class="btn btn-primary font-weight-bolder">
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
                >Enroll New Student</a
            >
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        
        <!--begin: Datatable-->
        <table
            class="table table-bordered table-hover table-checkable"
            id="students"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Country</th>
                    <th>Ship Address</th>
                    <th>Company Name</th>
                    <th>Ship Date</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>

    // Instantiating card class, to enable toggling effect.
    var card = new KTCard('student_filteration');

    //
    ///
    ////
    /////
    //////
    ///////

    // Initializing student datatable

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var age = parseFloat( data[3] ) || 0; // use data for the age column
    
            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && age <= max ) ||
                ( min <= age   && isNaN( max ) ) ||
                ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function(){
        /**
        * Data Table Initialization
        **/
        $('#students').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('students_list_ajax') }}",
            columns: [
                {data: 'studentName'},
                {data: 'email'},
                {data: 'gender'},
                {data: 'dob'},
                {data: 'pob'},
                {data: 'is_muslim'},
                {data: 'status'},
                {data: 'action', orderable: true, searchable: true},
            ]
        }).search( 'New York' ).draw();
        //$('#students').css('width','100%');

        // Re-draw datatable when user performing filteration
        $('#min, #max').keyup( function() {
            table.draw();
        } );
    });
</script>

<!--begin::Page Vendors(used by this page)-->
    <script src="{{
        asset('plugins/custom/datatables/datatables.bundle.js')
    }}">
    </script>
<!--end::Page Vendors-->
    

    {{-- <script src="{{
        asset('js/pages/crud/datatables/data-sources/ajax-server-side.js')
    }}"> --}}
    </script>
@endsection
