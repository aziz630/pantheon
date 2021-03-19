{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Cash deposit --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Cash Deposit") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form
        class="form"
        action="{{ url('save_account_transaction') }}"
        method="post"
    >
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="form-group row">
                <input
                    type="hidden"
                    name="account_id"
                    value="{{ $account_details->id }}"
                />
                <input type="hidden" name="transactionType" value="deposit" />

                <div class="col-lg-4">
                    @csrf
                    <label>Account Title:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter section name (Ex: 'A')"
                        name="accountTitle"
                        value="{{ $account_details->grd_name }}"
                        readonly
                    />
                    <span class="form-text text-muted"
                        >Please enter account title</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>CNIC:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter account holder cnic number"
                        name="accountCnic"
                        value="{{ $account_details->grd_cnic_no }}"
                        readonly
                    />
                    <span class="form-text text-muted"
                        >Please enter account holder CNIC</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>Contact:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter account holder contact number"
                        name="accountCnic"
                        value="{{ $account_details->grd_mobile }}"
                        readonly
                    />
                    <span class="form-text text-muted"
                        >Please enter account holder contact number</span
                    >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Cash amount:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter cash amount to deposit"
                        name="amount"
                    />
                    <span class="form-text text-muted"
                        >Please enter cash amount to deposit</span
                    >
                </div>
                <div class="col-lg-8">
                    <label>Description:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter description if any"
                        name="description"
                    />
                    <span class="form-text text-muted"
                        >Please enter transaction description.</span
                    >
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Proceed
                    </button>
                    <a
                        href="{{ url('account_Transactions', [$account_details->id]) }}"
                        class="btn btn-secondary"
                    >
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

@endsection

{{-- Scripts Section --}}
@section('scripts') @endsection
