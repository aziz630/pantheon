{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Create new class form --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Create Class") }}
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
    <form class="form" action="{{ route('class.save') }}" method="post">
        <div class="card-body">
            @include('pages.alerts.alerts') @if(count($sections))
            <div class="form-group row">
                <div class="col-lg-6">
                    @csrf
                    <label>Class Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter class name"
                        name="className"
                    />
                    <span class="form-text text-muted"
                        >Please enter your class name</span
                    >
                </div>
                <div class="col-lg-6">
                    <label>Class limit:</label>
                    <input
                        type="number"
                        class="form-control"
                        placeholder="Enter class limit"
                        name="classLimit"
                    />
                    <span class="form-text text-muted"
                        >Please enter your class limit</span
                    >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Assign Sections:</label>
                    <div class="radio-inline">
                        @php $i = 1; @endphp @foreach($sections as $section)
                        <label class="radio radio-solid">
                            <input type="checkbox" name="sections[]"
                            {{ $i === 1 ? 'checked="checked"' : "" }}
                            value="{{ $section->id }}" /> <span></span>Section
                            {{ $section->section_name }}</label
                        >
                        @php $i++; @endphp @endforeach
                    </div>
                    <span class="form-text text-muted"
                        >Select atleast one section for this class</span
                    >
                </div>
            </div>
            @elseif(!count($sections))
            <h3>Sections not found</h3>
            <p>Please created sections first.</p>
            @endif
        </div>
        <div class="card-footer">
            @if(!count($sections))
            <div class="row">
                <div class="col-lg-6">
                    <a
                        href="{{ url('section_create') }}"
                        class="btn btn-primary"
                    >
                        Create Section
                    </a>
                </div>
            </div>
            @elseif(count($sections))
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save
                    </button>
                    <a href="{{ url('classes') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>
            </div>
            @endif
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

@endsection

{{-- Scripts Section --}}
@section('scripts') @endsection
