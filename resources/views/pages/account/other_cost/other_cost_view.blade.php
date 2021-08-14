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

<form class="mb-15" action="{{ route('promotion.students.list') }}" method="post">
    <div class="card card-custom mb-7">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-search text-primary"></i>
                </span>
                <h3 class="card-label">
                    {{ __("Other Cost List") }} <small>Filteration enabled</small>
                </h3>
            </div>
           
            <div class="card-toolbar">
            <a
                href="{{ route('add.other.cost') }}"
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
                >Add Other Cost</a
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
                    <th width="5%">SL</th>  
                    <th>Date</th> 
                    <th>Amount </th>
                    <th>Description</th>
                    <th>Image</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $key => $value )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td> {{ date('d-m-Y', strtotime($value->date)) }}</td>	
                    <td> {{ $value->amount }}</td>	
                    <td> {{ $value->description }}</td>	 
                    <td>  
                        <img src="{{ (!empty($value->image))? url('upload/cost_images/'.$value->image):url('upload/no_image.jpg') }}" style="width: 70px; height: 50px;">
                    </td>
                    <td> <a href="{{ route('edit.other.cost',$value->id ) }}" class="btn btn-info"> Edit</a> </td>
                </tr>
                @endforeach
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