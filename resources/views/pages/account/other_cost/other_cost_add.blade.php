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
                {{ __("Add Other Cost") }}
            </h3>
        </div>
    </div>

         <!--begin::Form-->
    <form
        class="form"
        method="post"
        action="{{ route('save.other.cost') }}"
        id="enrollment_form"
        accept-charset="utf-8"
        enctype="multipart/form-data"
        >
        @csrf

        <div class="card card-custom m-5">
            <div class="card-body p-5">
                @include('pages.alerts.alerts')

                <div class="row">
                    <div class=" col-xxl-12">
                        <div class="row">
                            <div class="col-xl-3">
                            <!--begin::Input-->
                                <div class="form-group">
                                    <label>Amount</label><span class="text-danger">*</span>
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        name="amount"
                                        id="amount"
                                        placeholder="Enter Amount"
                                        value="{{ old('amount') }}"
                                    />
                                    @if($errors->has('amount'))
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    @endif
                                    <span class="form-text text-muted"
                                        >Please enter amount.</span
                                    >
                                </div>
                                <!--end::Input-->
                            </div>


                            <div class="col-xl-3">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Date</label><span class="text-danger">*</span>
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        readonly
                                        name="date"
                                        id="date"
                                        placeholder="Month/Day/Year"
                                        value="{{ old('date') }}"
                                    />
                                    @if($errors->has('date'))
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @endif
                                    <span class="form-text text-muted"
                                        >Please enter date.</span
                                    >
                                </div>
                                <!--end::Input-->
                            </div>
                            
                            <div class="col-xl-3">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Image</label><span class="text-danger">*</span>
                                    <div></div>
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            class="custom-file-input form-control-solid"
                                            name="image"
                                            id="image"
                                        />
                                        <label class="custom-file-label" for="cnicFile"
                                            >Choose student profile</label
                                        >
                                        @if($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                    <span class="form-text text-muted"
                                        >Please browse Image.</span
                                    >
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="controls">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; width: 100px; border: 1px solid #000000;"> 

                                    </div>
                                </div>
                            </div> <!-- End Col md 3 --> 
                        </div>


                        <div class="row">
                            <div class="col-xl-12">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea
                                        class="form-control form-control-solid"
                                        name="description"
                                        id="description"
                                        rows="4"
                                        placeholder="guardian address"
                                    >{{ old('description') }}</textarea>
                                    
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                    <span class="form-text text-muted"
                                        >Please enter description.</span
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
                                <a href="#" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
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


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


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
