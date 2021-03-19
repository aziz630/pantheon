{{-- Extends layout --}}
@extends('layout.default') 

@section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Update previous school info form --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Update Previous School info") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form
        class="form"
        action="{{ route('previousSchool.update') }}"
        method="post"
        enctype="multipart/form-data"
    >
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
            <div class="form-group row">
                <div class="col-lg-4">
                    @csrf
                    <input
                        type="hidden"
                        name="std_id"
                        value="{{ $student->id }}"
                    />
                    <input
                        type="hidden"
                        name="prev_school_id"
                        value="{{ $prev_school->previous_school->id }}"
                    />
                    <label>School Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter School Name"
                        name="school_name"
                        value="{{ $prev_school->previous_school->prevSch_name }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter previous school name</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>School Contact:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter School Contact"
                        name="school_contact"
                        value="{{ $prev_school->previous_school->prevSch_phone_no }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter previous school contact</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>School Address:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter School Address"
                        name="school_address"
                        value="{{ $prev_school->previous_school->prevSch_address }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter previous school address</span
                    >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Student Remarks:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter Student Remarks"
                        name="std_remarks"
                        value="{{ $prev_school->prevSchRem_remarks }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter student remarks</span
                    >
                </div>
            </div>
            <h3>Previous School Documents</h3>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>School Leaving Certificate:</label>
                    <input type="file" class="form-control" name="std_slc" />
                    <span class="form-text text-muted"
                        >Please upload pdf file only</span
                    >
                </div>
                <div class="col-lg-6">
                    <br />
                    <br />
                    @if($prev_school->prevSchRem_slc != '')
                    <i class="flaticon2-check-mark text-success"></i>
                    @else
                    <i class="flaticon2-cross text-danger"></i>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Character Certificate:</label>
                    <input type="file" class="form-control" name="std_cc" />
                    <span class="form-text text-muted"
                        >Please upload pdf file only</span
                    >
                </div>
                <div class="col-lg-6">
                    <br />
                    <br />
                    @if($prev_school->prevSchRem_c_c != '')
                    <i class="flaticon2-check-mark text-success"></i>
                    @else
                    <i class="flaticon2-cross text-danger"></i>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Sports Certificate:</label>
                    <input type="file" class="form-control" name="std_sc" />
                    <span class="form-text text-muted"
                        >Please upload pdf file only</span
                    >
                </div>
                <div class="col-lg-6">
                    <br />
                    <br />
                    @if($prev_school->prevSchRem_s_c != '')
                    <i class="flaticon2-check-mark text-success"></i>
                    @else
                    <i class="flaticon2-cross text-danger"></i>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Last Exam Report:</label>
                    <input type="file" class="form-control" name="std_ler" />
                    <span class="form-text text-muted"
                        >Please upload pdf file only</span
                    >
                </div>
                <div class="col-lg-6">
                    <br />
                    <br />
                    @if($prev_school->prevSchRem_last_exam_report != '')
                    <i class="flaticon2-check-mark text-success"></i>
                    @else
                    <i class="flaticon2-cross text-danger"></i>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save Changes
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
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

