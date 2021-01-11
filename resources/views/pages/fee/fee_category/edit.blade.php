{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Edit fee category --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Fee Category") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form
        class="form"
        action="{{ route('fee.category.update') }}"
        method="post"
    >
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="form-group row">
                <div class="col-lg-6">
                    @csrf
                    <input
                        type="hidden"
                        name="cId"
                        value="{{ $category->id }}"
                    />
                    <label>Fee Category Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter fee category name"
                        name="categoryName"
                        value="{{ $category->category_name }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter your fee category name</span
                    >
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save Changes
                    </button>
                    <a
                        href="{{ url('fee_categories') }}"
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
