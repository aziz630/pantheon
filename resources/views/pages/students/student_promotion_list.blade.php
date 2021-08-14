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
            <h3 class="card-label">
                {{ __("Search Students") }} <small>Filteration enabled</small>
            </h3>
        </div>
    </div>
    <div class="card-body">
    
        <form class="mb-15" action="{{ route('student.session.class.wise') }}" method="GET">

            <div class="row">
             
                <div class="col-md-4">
                    <label>Class:</label>
                    <select
                        name="class"
                        id="class"
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
                <div class="col-md-4">
                    <label>Session:</label>
                    <select
                        name="session"
                        id="session"
                        class="form-control form-control-solid"
                    >
                        <option>Select Session</option>

                        @foreach($sessions as $session)
                        <option value="{{ $session['id'] }}" {{ (@$session_id == $session['id'])? 'selected' : '' }}>
                            {{ $session["session"].'-'.($session["session"] + 1) }}
                        </option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-2 pt-7">
                    <input type="submit" class="btn btn-primary btn-primary" name="search" value="search" >
                </div>
            
            </div>
        </form>
    </div>
</div>


<form class="mb-15" action="{{ route('promotion.students.list') }}" method="post">
    <div class="card card-custom mb-7">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-search text-primary"></i>
                </span>
                <h3 class="card-label">
                    {{ __("All Students") }} <small>Filteration enabled</small>
                </h3>
            </div>
            <div class="pt-6">
                <select
                    name="class"
                    id="class"
                    class="form-control form-control-solid"
                >
                    <option>Select Class</option>

                    @if(isset($classes)) @foreach($classes as $class)
                    <option value="{{ $class['id'] }}">
                        {{ $class["class_name"] }}
                    </option>
                    @endforeach @endif
                </select>
            </div>
            <div class="pt-6">
                <select
                    name="session"
                    id="session"
                    class="form-control form-control-solid"
                >
                    <option>Select Session</option>

                    @foreach($sessions as $session)
                    <option value="{{ $session['id'] }}">
                        {{ $session["session"].'-'.($session["session"] + 1) }}
                    </option>
                    @endforeach 
                </select>
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
                >Promote seleted Students</a>
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
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Gender</th>
                    <th>Class/Grade</th>
                    <th>Section</th>
                    <th>Action</th>
                    <th><input type="checkbox" class="check_all"></th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $key => $value)
                    <tr id="sid{{ $value->studen_id }}">
                        <td>{{$key+1}}</td>
                        <td>{{ $value['student']['id_no'] }}</td>
                        <td>{{ $value['student']['name'] }}</td>
                        <td>{{ $value['student']['father_name'] }}</td>
                        <td>{{ $value['student']['gender'] }}</td>
                        <td>{{ $value['class']['class_name'] }}</td>
                        <td>{{ $value['session']['session'] }}</td>
                        <td>
                            <a href="{{ route('promote.single.student',$value->student_id) }}" class="btn btn-primary btn-danger">Promote</a>
                        </td>
                        <td><input type="checkbox" name="ids" class="checkBoxClass"  value="{{ $value->studen_id }}"></td>
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



$(function(e){
    $('.check_all').click(function(){
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });
});



// $(document).on('click', '#promoteAllStudents', function(){
//         var id = [];
//         if(confirm("Are you sure you want to Delete this data?"))
//         {
//             $('.checkBoxClass:checked').each(function(){
//                 id.push($(this).val());
//             });
//             if(id.length > 0)
//             {
//                 $.ajax({
//                     url:"",
//                     method:"post",
//                     data:{id:id},
//                     success:function(data)
//                     {
//                         // alert(data);
//                         $('#student_table').DataTable().ajax.reload();
//                     }
//                 });
//             }
//             else
//             {
//                 alert("Please select atleast one checkbox");
//             }
//         }
//     });



    // $(document).ready(function() {
        /**

         * Data Table Initialization
         **/
        // let table = $("#students").DataTable({
        //     processing: true,
        //     serverside: true,
        //     ajax: "{{ url('get_all_promotion_students_list') }}",
        //     columns: [
        //         { data: "erp_no" },
        //         { data: "studentName" },
        //         { data: "fatherName" },
        //         { data: "stdGender" },
        //         { data: "class" },
        //         { data: "section" },
        //         { data: "more" },
        //         {data: 'select_orders', orderable: false, searchable: false},
                // { data: "action", orderable: false, searchable: false },
                
            // ]
        // }); //.search( 'Enrolled' ).draw();

        // Re-draw datatable when user performing filteration
        // $("#erp_no, #studentName").keyup(function() {
        //     table.draw();
        // });
    // });

    
   

</script>
@endsection


<!-- {{ url('students_list_ajax') }} -->