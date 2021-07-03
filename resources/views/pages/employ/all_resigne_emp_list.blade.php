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
                        ? "Trashed Employee"
                        : "All Resigned Employee"
                }}
            </h3>
        </div>
        @if(isset($trashed) && $trashed == false)
        <div class="card-toolbar">
             
            <!--end::Button-->
        </div>
        @php $remoteUrl = url('get_all_resigned_employee'); @endphp 
        
    @else 
    @php $remoteUrl =
        url('trashed_employee'); 
        @endphp 
    @endif
    </div>
    <div class="card-body">
        @include('pages.alerts.alerts')
        <!--begin: Datatable-->
        <table
            class="table table-bordered table-hover table-checkable"
            id="employee"
            style="margin-top: 13px !important"
        >
        <thead>
            <tr>
                <th>S/No.</th>
                <th>Name</th>
                <th>Title</th>
                <th>ERP Number</th>
                <th>status</th>
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
        let table = $("#employee").DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ $remoteUrl }}",
            columns: [
                { data: "DT_RowIndex" },
                { data: "fullName" },
                { data: "title" },
                { data: "empEmail" },
                { data: "status" },
                
            ]
        });
    });
</script>
@endsection























