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
                {{ __("Incremint Salary") }}
            </h3>
        </div>
    </div>



    <!--begin::Form-->
    <form class="form" action="{{ route('update.increment.store',$editData->id) }}" method="post">
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="form-group row">
                <div class="col-lg-6">
                    @csrf
                    <label>Salary:</label><span class="text-danger">*</span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter salary"
                        name="increment_salary"
                    />
                    @if($errors->has('increment_salary'))
                        <span class="text-danger">{{ $errors->first('increment_salary') }}</span>
                    @endif
                    <span class="form-text text-muted"
                        >Please enter aspected salary</span
                    >
                </div>
                <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>Effected Date</label><span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            readonly
                            name="effected_salary"
                            id="date"
                            placeholder="Month/Day/Year"
                            value="{{ old('effected_salary') }}"
                        />
                        @if($errors->has('effected_salary'))
                            <span class="text-danger">{{ $errors->first('effected_salary') }}</span>
                        @endif
                        <span class="form-text text-muted"
                            >Please select effected date.</span
                        >
                    </div>
                    <!--end::Input-->
                </div>
            </div>
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
            
        </div>
       
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

@endsection

{{-- Scripts Section --}}
@section('scripts')

<script>
    var KTBootstrapDatepicker = (function() {
        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            };
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
        }

        // Private functions
        var demos = function() {
            // minimum setup
            $("#date").datepicker({ 
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            });

        };

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    })();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();

    });
</script>

@endsection
