{{-- Extends layout --}}
@extends('layout.emp_default') @section('styles')
<link
    href="{{ asset('css/pages/wizard/wizard-2.css') }}"
    rel="stylesheet"
    type="text/css"
/>
@endsection

{{-- Content --}}
@section('content')

{{-- Add new Student form --}}

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!--begin::Container-->
<form
    class="form"
    method="post"
    action="{{ route('resigh_employee.update') }}"
    id="resign_form"
    accept-charset="utf-8"
    enctype="multipart/form-data"
>
@csrf
  <input
  type="hidden"
  name="rId"
  value="{{ auth()->user()->id }}"
/>
    <div class="card card-custom m-5">
        <div class="card-body p-5">
            @include('pages.alerts.alerts')

            <div class="row">
                <div class=" col-xxl-12">
                    
                    <h4 class="mb-10 font-weight-bold text-dark">
                        Resignation Form
                    </h4>
                    <div class="row">
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="fullName"
                                    require
                                    value="{{ auth()->user()->name }}" readonly
                                />
                                <span class="form-text text-muted"
                                    >Your name.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                        
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Title</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="title"
                                    require
                                    value="{{ auth()->user()->title }}" readonly
                                />
                                <span class="form-text text-muted"
                                    >Your Title .</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>

                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    name="title"
                                    require
                                    value="{{ auth()->user()->email }}" readonly
                                />
                                <span class="form-text text-muted"
                                    >Your Title .</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-xl-8">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>Reason of resign</label>
                                
                                <textarea class="form-control form-control-solid" 
                                name="reasonOfResign"
                                placeholder="Please type Reason of resigne"
                                ></textarea>
                                
                                <span class="form-text text-muted"
                                    >Please enter reason of resigne.</span
                                >
                                <!-- @if ($errors->has('reason_of_resign'))
                                <span class="text-danger">{{ $errors->first('reason_of_resign') }}</span>
                                @endif -->
                            </div>
                            <!--end::Input-->
                        </div>

                       
                    
                        <div class="col-xl-4">
                            <!--begin::Input-->
                            <div class="form-group">
                                <label>upload resignation letter </label>
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input form-control-solid"
                                        name="file"
                                        id="File"
                                    />
                                    <label class="custom-file-label" for="cnicFile"
                                        >Choose file</label
                                    >
                                    <!-- @if ($errors->has('resig_file'))
                                    <span class="text-danger">{{ $errors->first('resig_file') }}</span>
                                    @endif -->
                                </div>
                                <span class="form-text text-muted"
                                    >Please browse attachement file.</span
                                >
                            </div>
                            <!--end::Input-->
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary mr-2">
                                submit
                            </button>
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
 
</form>
<!--end::Container-->


@endsection

{{-- Scripts Section --}}
@section('scripts')
{{-- <script src="{{
        asset('js/pages/custom/wizard/student_enrollment_validation.js')
    }}"></script> --}}

@endsection
