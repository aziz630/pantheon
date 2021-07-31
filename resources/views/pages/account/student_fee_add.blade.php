{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<link
    href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet"
    type="text/css"
/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
@endsection

{{-- Content --}}
@section('content') @php $search = false; @endphp

{{-- Create new class form --}}
<!--begin::Card-->

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Add Students Fee") }} <small>Filteration enabled</small>
            </h3>
        </div>
        <div class="card-toolbar">
            
           
        </div>
        
    </div>
    <div class="card-body">
    

            <div class="row">
             
                <div class="col-md-3">
                    <label>Class:</label>
                    <select
                        name="class_id"
                        id="class_id"
                        class="form-control form-control-solid"
                    >
                        <option>Select Class</option>

                        @if(isset($classes)) @foreach($classes as $class)
                        <option value="{{ $class['id'] }}" {{ (@$class_id == $class['id'])? 'selected' : '' }}>
                            {{ $class["class_name"] }}
                        </option>
                        @endforeach @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Session:</label>
                    <select
                        name="session"
                        id="session"
                        class="form-control form-control-solid"
                    >
                        <option>Select Session:</option>

                        @foreach($sessions as $session)
                        <option value="{{ $session['id'] }}" {{ (@$session_id == $session['id'])? 'selected' : '' }}>
                            {{ $session["session"].'-'.($session["session"] + 1) }}
                        </option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Fee Category:</label>
                        <select
                            name="fee_category_id"
                            id="fee_category_id"
                            class="form-control form-control-solid"
                        >
                            <option>Select Category</option>

                            @foreach($fee_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach	
                        </select>
                </div>

                <div class="col-md-3">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>Date:</label>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            readonly
                            name="date"
                            id="date"
                            placeholder="Month/Day/Year"
                            
                        />
                    </div>
        <!--end::Input-->
    </div>

                <div class="col-md-2">
                <a id="search" class="btn btn-primary" name="search"> Search</a>
                </div>
            
            </div>

            <div class="row">
            <div class="col-md-12">
                <div id="DocumentResults">
                    <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('account.fee.store') }}" method="post" >
                        @csrf
                            <table class="table table-bordered table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                    @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                    <tr>
                                        @{{{tdsource}}}	
                                    </tr>
                                    @{{/each}}
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>  
                        </form>
                    </script>
                </div> 		
            </div>
        </div>


    </div>
</div>

<!-- end::Card -->
@endsection

{{-- Scripts Section --}}
@section('scripts')

<script type="text/javascript">
  $(document).on('click','#search',function(){
  	var session = $('#session').val();
  	var class_id = $('#class_id').val();
  	var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();   
     $.ajax({
      url: "{{ route('account.fee.getstudent')}}",
      type: "get",
      data: {'session':session,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
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


<!-- {{ url('students_list_ajax') }} -->











