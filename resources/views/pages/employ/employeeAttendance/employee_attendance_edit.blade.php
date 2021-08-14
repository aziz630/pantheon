{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<link
    href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet"
    type="text/css"
/>
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
                {{ __("Add Attendance") }} <small>Filteration enabled</small>
            </h3>
        </div>
        <div class="card-toolbar">
            
           
        </div>
        
    </div>
    <div class="card-body">
    

        <form method="post" action="{{ route('store.employee.attendance') }}">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>Attendance Date</label>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            readonly
                            name="date"
                            id="date"
                            value="{{ $editData['0']['date'] }}"
                        />
                    </div>
                    <!--end::Input-->
                </div>

            
            </div>

            <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-hover table-checkable"
                    id="myTable"
                    style="margin-top: 13px !important"
                >
                        <thead>
                        <tr>
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Sl</th>
                            <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>				
                        </tr>
                        <tr>
                            <th class="text-center btn present_all" style="display: table-cell; background-color: #ccc;">Present</th>
                            <th class="text-center btn leave_all" style="display: table-cell; background-color: #ccc">Leave</th>
                            <th class="text-center btn absent_all" style="display: table-cell; background-color: #ccc">Absent</th>
                        </tr> 
                        </thead>
                        <tbody>
                        @foreach($editData as $key => $data)		

                        <tr id="div{{$data->id}}" class="text-center">
                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                            <td>{{ $key+1  }}</td>
                            <td>{{ $data['user']['name'] }}</td>
                            <td colspan="3">
                                <div class="switch-toggle switch-3 switch-candy">

                                <input name="attandance_status{{$key}}" type="radio" value="Present" id="present{{$key}}" checked="checked"
                                {{ ($data->attandance_status == 'Present' ? 'checked' : '') }}>
                                <label for="present{{$key}}">Present</label>

                                <input name="attandance_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}" 
                                {{ ($data->attandance_status == 'Leave' ? 'checked' : '') }} >
                                <label for="leave{{$key}}">Leave</label>

                                <input name="attandance_status{{$key}}" value="Absent"  type="radio" id="absent{{$key}}" 
                                {{ ($data->attandance_status == 'Absent' ? 'checked' : '') }} >
                                <label for="absent{{$key}}">Absent</label>
                                </div>			
                            </td>
                        </tr>			
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-xs-right">
	     <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>
        </form>
    </div>
</div>

<!-- end::Card -->
@endsection

{{-- Scripts Section --}}
@section('scripts')


<script>   
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
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

            $("#admissionDate").datepicker({
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











