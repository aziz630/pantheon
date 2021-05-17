{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content') @php $search = false; @endphp

{{-- Create new suject form --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Create Subject") }}
            </h3>
        </div>
    </div>

    {{-- Error Validation Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    
    <!--begin::Form-->
    <form class="form" action="{{ route('subject.save') }}" method="post">
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="form-group row">
                <div class="col-lg-6">
                    @csrf
                    <label>Subject Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter subject name"
                        name="subjectName"
                    />
                    <span class="form-text text-muted"
                        >Please enter your subject name</span
                    >
                </div>
                <div class="col-lg-6">
                    <label>Subject description:</label>
                    <textarea
                        class="form-control"
                        placeholder="Enter suject description"
                        name="subjectDescription"
                    ></textarea>
                    <span class="form-text text-muted"
                        >Please enter your subject description</span
                    >
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save
                    </button>
                    <a href="{{ url('subjects') }}" class="btn btn-secondary">
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
