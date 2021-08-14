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


<form class="mb-15" action="" method="post">
    <div class="card card-custom mb-7">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-search text-primary"></i>
                </span>
                <h3 class="card-label">
                    {{ __("Employee Salary Details") }} <small>Filteration enabled</small>
                </h3>
            </div>
           
            <div class="card-toolbar">
                {{--
                <a
                    href="#"
                    class="btn btn-icon btn-sm btn-primary mr-1"
                    data-card-tool="toggle"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Toggle Card"
                >
                    <i class="ki ki-arrow-down icon-nm"></i>
                </a>
                --}}
            
                <!--begin::Button-->
                <a
                    href="{{ url('enroll_student') }}"
                    class="btn btn-primary font-weight-bolder"
                >Add Employee</a>
                <!--end::Button-->
            </div>
        </div>
            
        <div class="card-body">
            <p><strong> Employee Name :</strong> {{ $details->name }} </p>
	 		<p><strong> Employee ID No :</strong> {{ $details->id_no }} </p>
            @include('pages.alerts.alerts')
            <!--begin: Datatable-->
            <table
                class="table table-bordered table-hover table-checkable"
                id=""
                style="margin-top: 13px !important"
            >
            <thead>
                <tr>
                <th width="5%">SL</th>  
				<th>Previous Salary</th> 
				<th>Increment Salary</th>
				<th>Present Salary</th>
				<th>Effected Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salary_log as $key => $log)
                    <tr>
                    <td>{{ $key+1 }}</td>
                        <td> {{ $log->previous_salary }}</td>	
                        <td> {{ $log->increment_salary }}</td>	
                        <td> {{ $log->present_salary }}</td>	
                        <td> {{ $log->effected_salary }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
</form>
<!-- end::Card -->


@endsection

{{-- Scripts Section --}}
@section('scripts')

<!--begin::Page Vendors(used by this page)-->
<script src="{{
        asset('plugins/custom/datatables/datatables.bundle.js')
    }}"></script>
<!--end::Page Vendors-->

{{--
<script src="{{
        asset('js/pages/crud/datatables/data-sources/ajax-server-side.js')
    }}"></script>
--}}

<script>
   
    $(document).ready(function() {
    $('#student_table').DataTable();
}); 

</script>
@endsection


<!-- {{ url('students_list_ajax') }} -->