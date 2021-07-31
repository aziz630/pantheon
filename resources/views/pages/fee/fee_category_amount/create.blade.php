{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

{{-- Content --}}
@section('content')

{{-- Create new fee category Amount --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Create Fee Amount") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="form" action="{{ route('save.fee.amount') }}" method="post">
        @csrf
        <div class="card-body">
            @include('pages.alerts.alerts')
            <div class="add_item">
                <div class="form-group row">
                    <div class="col-md-8">
                        <label>Fee Category</label><span class="text-danger">*</span>
                        <select
                            name="fee_category"
                            id="fee_category"
                            class="form-control form-control-solid"
                        >
                            <option>Select Category</option>

                            @foreach($fee_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach	
                        </select>
                        @if($errors->has('fee_category'))
                            <span class="text-danger">{{ $errors->first('fee_category') }}</span>
                        @endif
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-4">
                        <label>Class</label><span class="text-danger">*</span>
                        <select
                            name="class_id[]"
                            id="class_id[]"
                            class="form-control form-control-solid"
                        >
                            <option>Select class</option>

                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach	
                        </select>
                        @if($errors->has('class_id[]'))
                            <span class="text-danger">{{ $errors->first('class_id[]') }}</span>
                        @endif
                    </div>

                    <div class="col-xl-4">
                        <!--begin::Input-->
                        <div class="form-group">
                            <label>Amount</label><span class="text-danger">*</span>
                            <input
                                type="text"
                                class="form-control form-control-solid"
                                name="amount[]"
                                id="amount[]"
                                placeholder="Enter Fee Amount"
                                value="{{ old('amount[]') }}"
                            />
                            @if($errors->has('amount[]'))
                                <span class="text-danger">{{ $errors->first('amount[]') }}</span>
                            @endif
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-xl-2" style="padding-top: 25px">
                        <!--begin::Input-->
                        <div class="form-group">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>    		
                        </div>
                        <!--end::Input-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save
                    </button>
                    <a
                        href="#"
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




<div style="visibility: hidden;">
  	<div class="whole_extra_item_add" id="whole_extra_item_add">
  		<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
  			<div class="form-row">
                <div class="col-md-4">
                    <label>Class</label><span class="text-danger">*</span>
                    <select
                        name="class_id[]"
                        id="class_id[]"
                        class="form-control form-control-solid"
                    >
                        <option>Select class</option>

                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach	
                    </select>
                    @if($errors->has('amount'))
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                </div>

                <div class="col-xl-4">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>Amount</label><span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            name="amount[]"
                            id="amount[]"
                            placeholder="Enter Fee Amount"
                            value="{{ old('amount[]') }}"
                        />
                        @if($errors->has('amount'))
                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                        @endif
                    </div>
                    <!--end::Input-->
                </div>
                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>    		
                </div><!-- End col-md-2 -->
  			</div>  			
  		</div>  		
  	</div>  	
  </div>







@endsection

{{-- Scripts Section --}}
@section('scripts')

<script type="text/javascript">
 	$(document).ready(function(){
 		var counter = 0;
 		$(document).on("click",".addeventmore",function(){
 			var whole_extra_item_add = $('#whole_extra_item_add').html();
 			$(this).closest(".add_item").append(whole_extra_item_add);
 			counter++;
 		});
 		$(document).on("click",'.removeeventmore',function(event){
 			$(this).closest(".delete_whole_extra_item_add").remove();
 			counter -= 1
 		});

 	});
 </script>

@endsection
