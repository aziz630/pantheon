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
                {{ __("All Students") }} <small>Filteration enabled</small>
            </h3>
        </div>
    </div>
    <div class="card-body">
    
        <form class="mb-15" action="{{ route('search.student') }}" method="GET">

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
            <!--begin::Dropdown-->
           
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a
                href="{{ url('enroll_student') }}"
                class="btn btn-primary font-weight-bolder"
            >
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        version="1.1"
                    >
                        <g
                            stroke="none"
                            stroke-width="1"
                            fill="none"
                            fill-rule="evenodd"
                        >
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000"
                                opacity="0.3"
                            />
                        </g>
                    </svg>
                    <!--end::Svg Icon--> </span
                >Enroll New Student</a
            >
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
                <th>Enrollment No.</th>
                <th>Student Name</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>Class/Grade</th>
                <th>Section</th>
                <th>More</th>
                <th>Action</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($allData as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $value['student']['std_name'] }}</td>
                    <td>{{ $value['student']['std_father_name'] }}</td>
                    <td>{{ $value['student']['std_gender'] }}</td>
                    <td>{{ $value['class']['class_name'] }}</td>
                    <td>{{ $value['session']['session'] }}</td>
                    <td>
                        <a href="{{ route('view.single.student',$value->student_id) }}" class="btn btn-primary btn-sm">more</a>
                    </td>
                    <td>
                        <a href="{{ route('student.edit',$value->student_id) }}" class="btn btn-sm btn-clean btn-icon btn" title="Edit details"><i class="la la-edit"></i></a>
                        <a href="{{ route('student.delete',$value->student_id) }}" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>
                    </td>
                   
                </tr>
            @endforeach
            </tbody>
        </table>

        <!--end: Datatable-->
     

    </div>
  
</div>
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
} ); 

$(function(e){
    $('.check_all').click(function(){
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });

    // $('#promoteAllStudents').click(function(e){
    //      e.preventDefault();
    //      var allids = [];

    //      $("input:checkbox[name=ids]:checked").each(function(){
    //         allids.push($(this).val()); 
    //      });

    //      $,ajax({
    //          url: "",
    //          type: "DELETE",
    //          data: {
    //              _token:$("input[name=_token]").val(),
    //              ids:allids 
    //          }, 
    //          success:function(response){
    //              $.each(allids, function(key,val){
    //                  $("#sid"+val).remove();
    //              })
    //          }
    //      });
    // })
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