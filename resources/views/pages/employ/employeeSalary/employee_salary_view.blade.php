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
                    {{ __("Employee Salary List") }} <small>Filteration enabled</small>
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
            @include('pages.alerts.alerts')
            <!--begin: Datatable-->
            <table
                class="table table-bordered table-hover table-checkable"
                id="student_table"
                style="margin-top: 13px !important"
            >
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>ID No.</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Join date</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $key => $value)
                    <tr id="sid{{ $value->studen_id }}">
                        <td>{{$key+1}}</td>
                        <td>{{ $value->id_no }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->contact_no }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ date('d-m-Y',strtotime($value->join_date)) }}</td>
                        <td>{{ $value->salary }}</td>
                        <td>
                            <a title="Increment" href="{{ route('employee.salary.increment',$value->id) }}" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i></a>
                            <a title="Details" href="{{ route('employee.salary.details',$value->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
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