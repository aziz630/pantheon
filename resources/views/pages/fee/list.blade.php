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

{{-- List view --}}
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
                        ? "Trashed Fee Transactions"
                        : "Fee Register (List of last transactions performed)"
                }}
            </h3>
        </div>
        @if(isset($trashed) && $trashed == false)
        <div class="card-toolbar">
            <a
                href="{{ url('collect_fee') }}"
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
                >Collect Fee</a
            >
            <!--end::Button-->
        </div>
        @php $remoteUrl = url('get_fee_records'); @endphp @else @php $remoteUrl
        = url('trashed_fee_records'); @endphp @endif
    </div>
    <div class="card-body">
        @include('pages.alerts.alerts')
        <!--begin: Datatable-->
        <table
            class="table table-bordered table-hover table-checkable"
            id="feeRegister"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>Enr No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Last Transaction</th>
                    <th>Deposit (Dr)</th>
                    <th>Fee (Cr)</th>
                    <th>Dues ( + Fee)</th>
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
    // Initializing datatable

    $(document).ready(function() {
        /**
         * Data Table Initialization
         **/
        let table = $("#feeRegister").DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ $remoteUrl }}",
            columns: [
                { data: "enrollment" },
                { data: "studentName" },
                { data: "fatherName" },
                { data: "lastTransaction" },
                { data: "debit" },
                { data: "credit" },
                { data: "dues" },
                { data: "action", orderable: true, searchable: true }
            ]
        });

        // let table = $("#feeCategories").DataTable({
        //     processing: true,
        //     serverside: true,
        //     ajax: "{{ $remoteUrl }}",
        //     columns: [
        //         { data: "enrollment" },
        //         { data: "studentName" },
        //         { data: "transactionDate" },
        //         { data: "feeMonth" },
        //         { data: "deposit" },
        //         { data: "balance" },
        //         { data: "dues" },
        //         { data: "action", orderable: true, searchable: true }
        //     ]
        // });

        let Jawad_transaction_history = `	
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            | Enrollment no |description| student name | transaction date | debit | credit | balance |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Payable      Jawad khan	 25 Dec 2020		 		 2000	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Paid         Jawad khan	 03 Jan 2021		 2000	  		   0     |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Payable	   Jawad khan	 25 Jan 2021				 2000	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Paid	       Jawad khan	 05 Feb 2021		 1450	  		  -550   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Payable	   Jawad khan	 25 Feb 2021				 2000	  -2550  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Paid	       Jawad khan	 04 Mar 2021		 4000	 	      1450   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Payable	   Jawad khan	 25 Mar 2021				 2000 	  -550   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Paid	       Jawad khan	 03 Apr 2021		 550	          0      |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	12			  Payable	   Jawad khan	 25 Apr 2021				 2000 	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            | Total Amount: |                                               8000    10000     -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
        `;

        let samad_transaction_history = `	
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            | Enrollment no |description| student name | transaction date | debit | credit | balance |   6000
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Payable      Samad khan	 25 Dec 2020		 		 2000	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Paid         Samad khan	 03 Jan 2021		 2000	  		   0     |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Payable	   Samad khan	 25 Jan 2021				 2000	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Paid	       Samad khan	 05 Feb 2021		 1450	  		  -550   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Payable	   Samad khan	 25 Feb 2021				 2000	  -2550  | 
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Paid	       Samad khan	 04 Mar 2021		 4000	 	      1450   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Payable	   Samad khan	 25 Mar 2021				 2000 	  -550   |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Paid	       Samad khan	 03 Apr 2021		 550	          0      |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            |	13			  Payable	   Samad khan	 25 Apr 2021				 2000 	  -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
            | Total Amount: |                                               8000    10000     -2000  |
            +---------------+-----------+--------------+------------------+-------+--------+---------+
        `;
    });
</script>
@endsection
