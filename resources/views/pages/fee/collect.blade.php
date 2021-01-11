{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Collect Fee --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Collect Fee") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="form" action="{{ route('fee.save') }}" method="post">
        @php 
        $std_id = $student != null ? $student->id : ''; 
        $std_enrollment = $student != null ? $student->id : ''; 
        $std_father = $student != null ? $student->std_father_name : ''; 
        $std_name = $student != null ? $student->std_name : ''; 
        $guardian_id = $student != null ? $student->guardian_id : ''; 
        $submitable = true;
        
        if(!$firstTime) { 
            $currentFee = $fee_details != null? $fee_details->credit_amount : null; 
            $payable = $fee_details != null? $fee_details->amount_payable : null; 
            $dues = $fee_details != null? Intval($payable) - Intval($currentFee) : null; 
            $structure_id = $fee_details != null? $fee_details->fee_structure_id : null; 
            $submitable = $payable > 0 ? true : false;
        }else {
            $structure_id = $fee_details != null ? $fee_details['structure_id'] : ''; 
        } @endphp
        <div class="card-body">
        @include('pages.alerts.alerts')
            @csrf
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Enrollment No:</label>
                    @if(!$student)
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            id="enrno"
                            name="enrollment"
                            placeholder="Enter student enrollment no."
                        />
                        <div class="input-group-append">
                            <button
                                class="btn btn-secondary"
                                id="enrnoTrigger"
                                type="button"
                            >
                                Go!
                            </button>
                        </div>
                    </div>
                    @else
                    <input
                        type="text"
                        class="form-control"
                        disabled
                        placeholder="student enrollment No."
                        value="{{ $std_enrollment }}"
                    />
                    <input
                        type="hidden"
                        name="enrollment"
                        value="{{ $std_enrollment }}"
                    />
                    @endif
                    <span class="form-text text-muted"
                        >Please enter enrollment number</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>Student Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="studentName"
                        disabled
                        placeholder="Enter student name"
                        name="studentName"
                        value="{{ $std_name }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter student name</span
                    >
                </div>
                <div class="col-lg-4">
                    <label>Father Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="fatherName"
                        disabled
                        placeholder="Enter student father name"
                        name="fatherName"
                        value="{{ $std_father }}"
                    />
                    <span class="form-text text-muted"
                        >Please enter student father name</span
                    >
                </div>
            </div>

            <input type="hidden" name="structure_id" value="{{ $structure_id }}" />

            @if(!$firstTime)

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Current Fee:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="currentFee"
                        disabled
                        placeholder="Current fee"
                        name="currentFee"
                        value="{{ $currentFee }}"
                    />
                </div>
                <div class="col-lg-4">
                    <label>Dues:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="dues"
                        disabled
                        placeholder="Dues"
                        name="dues"
                        value="{{ $dues }}"
                    />
                </div>
                <div class="col-lg-4">
                    <label>Amount Payable:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="payable"
                        disabled
                        placeholder="Amount to pay"
                        name="amountPayable"
                        value="{{ $payable }}"
                    />
                </div>
            </div>
            @else
            <input type="hidden" name="guardian_id" value="{{ $guardian_id }}" />
            <input type="hidden" name="first_time" value="true" />
            
            @foreach($fee_details['fee_details'] as $category)

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>{{ $category['category_name'] }} Fee:</label>
                    <input
                        type="hidden"
                        name="{{ $category['category_name']."_id" }}"
                        value="{{ $category['category_id'] }}"
                    />
                    <input
                        type="number"
                        class="form-control"
                        disabled
                        name="{{ $category['category_name'] }}"
                        placeholder="Enter amount in PKR"
                        value="{{ $category['fee_amount'] }}"
                    />
                </div>
                <div class="col-lg-4">
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input
                                type="checkbox"
                                class="collect"
                                data-target="{{ $category['category_name'] }}"
                                name="{{ $category['category_name'] }}_collect"
                            />
                            <span></span>
                            collect?
                        </label>
                    </div>
                </div>
            </div>
            @endforeach 
            @endif

            @if(($student && $submitable) || !$student)
            <div class="form-group row" id="paymentSection">
                @if($firstTime)
                <div class="col-lg-4">
                    <label>Amount Payable:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="payable"
                        disabled
                        placeholder="Amount to pay"
                        name="amountPayable"
                        value="0"
                    />
                </div>
                @endif
                <div class="col-lg-4">
                    <label>Make Concission:</label>
                    <input
                        type="number"
                        class="form-control"
                        id="concission"
                        placeholder="offer a discount"
                        name="concission"
                    />
                </div>
                <div class="col-lg-4">
                    <label>Deposit:</label>
                    <input
                        type="number"
                        class="form-control"
                        id="deposit"
                        placeholder="Enter deposit amount"
                        name="deposit"
                    />
                </div>
            </div>

            <div class="form-group row" id="paymentMethods">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-3 col-form-label"
                            >Select Payment Method:</label
                        >
                        <div class="col-9 col-form-label">
                            <div class="radio-inline">
                                <label
                                    class="radio radio-outline radio-outline-2x radio-primary"
                                >
                                    <input
                                        type="radio"
                                        name="paymentType"
                                        checked="checked"
                                        value="cash"
                                    />
                                    <span></span>
                                    Cash Pay
                                </label>
                                @if(!$firstTime)
                                <label
                                    class="radio radio-outline radio-outline-2x radio-primary"
                                >
                                    <input
                                        type="radio"
                                        name="paymentType"
                                        value="account"
                                    />
                                    <span></span>
                                    Pay From Account
                                </label>
                                @endif
                                <label
                                    class="radio radio-outline radio-outline-2x radio-primary"
                                >
                                    <input
                                        type="radio"
                                        name="paymentType"
                                        value="dues"
                                    />
                                    <span></span>
                                    Continue With Dues
                                </label> 
                            </div>
                        </div>
                        <span class="form-text text-info">
                            <b>Note:</b> Concission can not be made if "Continue
                            with Dues" was chosen
                        </span>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                @if(($student && $submitable) || !$student)
                    <button type="submit" class="btn btn-primary mr-2" id="submit">
                        Process
                    </button>
                @endif
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">
                        Back
                    </a>
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
<script>
    $(document).ready(function() {
        $('.collect').on('change', function() {
            let category = $(this).attr('data-target');
            let amount_box = $('#payable');

            let amount_payable = parseInt($('#payable').val());
            let category_amount = parseInt($(`input[name="${category}"]`).val());
            
            if($(this).prop('checked') == true) {
                $(`input[name="${category}"]`).prop('disabled', false);
                $(`input[name="${category}"]`).prop('readonly', true);
                amount_box.val(amount_payable + category_amount);
            } else {
                $(`input[name="${category}"]`).prop('disabled', true);
                $(`input[name="${category}"]`).prop('readonly', false);
                amount_box.val(parseInt($('#payable').val()) - category_amount);
            }
        });

        
        /**
        
        # handle discount in fee
        
        **/
        $("#concission").on("keyup change scroll", function() {
            let depositAmount =
                parseInt($("#payable").val()) - parseInt($(this).val());
            $("#deposit").val(depositAmount);
        });

        $("input").on("keydown", function(e) {
            let code = e.keyCode || e.which;
            if(code == 13) { //Enter keycode
                e.preventDefault();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        

        /**
        
        # handle enrollment no searh functionality
        
        **/
        $("#enrnoTrigger").click(function() {
            if ($("#enrno").val().length) {
                let enrollmentNo = $("#enrno").val();
                let studentNameField = $("#studentName");
                let fatherNameField = $("#fatherName");
                let currentFee = $("#currentFee");
                let dues = $("#dues");
                let feePayable = $("#payable");

                $.post(
                    "{{ url('get_student_fee_details') }}",
                    { enrno: enrollmentNo, _token: "{{ csrf_token() }}" },
                    function(data) {
                        console.log(data);
                        if (data.status == 200) {
                            const student = data.data.student;
                            const feeDetails = data.data.fee_details;

                            studentNameField.val(student.std_name);
                            fatherNameField.val(student.std_father_name);
                            currentFee.val(feeDetails.credit_amount);
                            dues.val(
                                parseInt(feeDetails.amount_payable) -
                                    parseInt(feeDetails.credit_amount)
                            );
                            feePayable.val(feeDetails.amount_payable);

                            if(feeDetails.amount_payable == 0) {
                                $('#paymentMethods').hide();
                                $('#paymentSection').hide();
                                $('#submit').hide();
                            }
                        }
                    }
                );
            }
        });
    });
</script>
@endsection
