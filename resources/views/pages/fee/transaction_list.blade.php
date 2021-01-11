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
                        : "Fee Transactions History"
                }}
            </h3>
        </div>
        @if(isset($trashed) && $trashed == false)
        <div class="card-toolbar">
            <a
                href="{{ url('collect_fee/'.$std_id) }}"
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
                >Make Transaction</a
            >
            <!--end::Button-->
        </div>
        @else @endif
    </div>
    <div class="card-body">
        @include('pages.alerts.alerts')

        <table
            class="table table-bordered table-hover table-checkable"
            id="transactions"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>Enrollment No.</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Family Account Title</th>
                    <th>Account Balance</th>
                </tr>
                <tr>
                    <th>{{ $transactions[0]->std_id}}</th>
                    <th>{{ $transactions[0]->std_name }}</th>
                    <th>{{ $transactions[0]->std_father_name }}</th>
                    <th>{{ $transactions[0]->account_title }}</th>
                    <th>{{ $transactions[0]->account_balance }}</th>
                </tr>
            </thead>
        </table>
        <br />
        <hr />
        <br />

        <!--begin: Datatable-->
        <table
            class="table table-bordered table-hover table-checkable"
            id="transactions"
            style="margin-top: 13px !important"
        >
            <thead>
                <tr>
                    <th>Transaction Date</th>
                    <th style="width: 300px;">Description</th>
                    <th>Fee Month</th>
                    <th>Discount</th>
                    <th>Deposit (Dr)</th>
                    <th>Current Fee (Cr)</th>
                    <th>Dues ( + Current Fee)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $totalTransactions = count($transactions); $i = 0; @endphp
                @foreach($transactions as $row)
                <tr>
                    <td>
                        {{ date_format(date_create($row->transaction_date), 'd M Y') }}
                    </td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->fee_month }}</td>
                    <td>{{ $row->discount_amount }}</td>
                    <td>{{ $row->debit_amount }}</td>
                    <td>{{ $row->credit_amount }}</td>
                    <td>{{ $row->amount_payable }}</td>
                    <td>
                        @if($i == $totalTransactions - 1)
                        <a
                            href="{{ url('fee_record_edit/' . $row->id) }}"
                            class="btn btn-sm btn-clean btn-icon"
                            title="Reverse Transacttion"
                            ><i class="la la-edit"></i
                        ></a>
                        @else ... @endif
                    </td>
                </tr>
                @php $i++; @endphp @endforeach
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

<script>
    // Initializing datatable

    $(document).ready(function() {
        /**
         * Data Table Initialization
         **/
        let table = $("#transactions").DataTable({ processing: false });
    });
</script>
@endsection
