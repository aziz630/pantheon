{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<link
    href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet"
    type="text/css"
/>
@endsection

{{-- Content --}}
@section('content') @php $search = false; @endphp

{{-- Create new class form --}}
<!--begin::Card-->
<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{
                    isset($trashed) && $trashed == true
                        ? "Trashed Classes"
                        : "All Classes"
                }}
            </h3>
        </div>
        @if(isset($trashed) && $trashed == false)
        <div class="card-toolbar">
            <a
                href="{{ url('class_create') }}"
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
                >Create Class</a
            >
            <!--end::Button-->
        </div>
        @php $remoteUrl = url('get_classes'); @endphp 
        
    @else 
    @php $remoteUrl =
        url('trashed_classes'); 
        @endphp 
    @endif
    </div>
    <div class="card-body">
        @include('pages.alerts.alerts')
        <!--begin: Datatable-->
        <table
            class="table table-bordered table-hover table-checkable"
            id="classes"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>S/No.</th>
                    <th>Class</th>
                    <th>Limit</th>
                    <th>Available Sections</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
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
    // Initializing classes datatable

    $(document).ready(function() {
        /**
         * Data Table Initialization
         **/
        let table = $("#classes").DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ $remoteUrl }}",
            columns: [
                { data: "DT_RowIndex" },
                { data: "className" },
                { data: "classLimit" },
                { data: "classSections" },
                { data: "createdAt" },
                { data: "updatedAt" },
                { data: "action", orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection
