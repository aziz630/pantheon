{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content') @php function value_exists($arr, $key, $value) { if
(empty($arr)) return false; else { foreach($arr as $a) { if ($a[$key] == $value)
return true; } return false; } } @endphp

{{-- Edit class form --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Class") }}
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
    <form class="form" action="{{ route('class.update') }}" method="post">
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="form-group row">
                <div class="col-lg-6">
                    @csrf
                    <input type="hidden" name="cId" value="{{ $class->id }}" />
                    <label>Class Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter class name"
                        name="className"
                        value="{{ $class->class_name }}"
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
                        value="{{ $class->class_limit }}"
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
                        @php $assigned_sections = $class->sections->toArray();
                        @endphp
                        <!-- looping through sections -->
                        @foreach($sections as $section)
                        <label class="radio radio-solid">
                            <input type="checkbox" name="sections[]"
                            {{ value_exists($assigned_sections, 'id', $section->id) === true ? 'checked = "checked"' : "" }}
                            value="{{ $section->id }}" /> <span></span>Section
                            {{ $section->section_name }}</label
                        >
                        @endforeach
                    </div>
                    <span class="form-text text-muted"
                        >Select atleast one section for this class</span
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
                    <a href="{{ url('classes') }}" class="btn btn-secondary">
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
