{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

{{-- Content --}}
@section('content')


@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- Edit fee category Amount --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Fee Amount") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="form" action="{{ route('ubdate.fee.amount', $editData['0']->fee_category_id) }}" method="post">
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
                                <option value="{{ $category->id }}" {{ ($editData['0']->fee_category_id == $category->id)  ? "selected" : ""}}>{{ $category->category_name }}</option>
                                @endforeach	
                        </select>
                    </div>
                </div>

                @foreach($editData as $edit)
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
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
                                <option value="{{ $category->id }}" {{ ($edit->class_id == $class->id)? "selected": ""  }}>{{ $class->class_name }}</option>
                                @endforeach	
                        </select>
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
                                value="{{ $edit->amount }}"
                            />
                        </div>
                        <!--end::Input-->
                    </div>
                    <div class="col-xl-2" style="padding-top: 25px">
                        <!--begin::Input-->
                        <div class="form-group">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span> 
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>   		
                        </div>
                        <!--end::Input-->
                    </div>
                </div>
                </div>
                @endforeach
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
                            <option value="{{ $category->id }}">{{ $class->class_name }}</option>
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
