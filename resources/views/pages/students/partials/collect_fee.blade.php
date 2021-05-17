<!---   Structure_id    // we will use some kind of ajax here to fetch fee structure id  -->
<input type="hidden" name="first_time" value="true" />
<input type="hidden" name="structure_id" value="{{ $fee_details[0]->structure_id }}" />

@foreach($fee_details as $category)

<div class="form-group row">
    <div class="col-lg-4">
        <label>{{ $category->category_name }} Fee:</label>
        <input
            type="hidden"
            name="{{ $category->category_name.'_id' }}"
            value="{{ $category->category_id }}"
        />
        <input
            type="number"
            class="form-control form-control-solid"
            disabled
            name="{{ $category->category_name }}"
            placeholder="Enter amount in PKR"
            value="{{ $category->fee_amount }}"
        />
    </div>
    <div class="col-lg-4">
        <div class="checkbox-list">
            <label class="checkbox">
                <input
                    type="checkbox"
                    class="collect"
                    data-target="{{ $category->category_name }}"
                    name="{{ $category->category_name }}_collect"
                />
                <span></span>
                collect?
            </label>
        </div>
    </div>
</div>
@endforeach

<div class="form-group row">
    <div class="col-lg-4">
        <label>Amount Payable:</label>
        <input
            type="text"
            class="form-control form-control-solid"
            id="payable"
            disabled
            placeholder="Amount to pay"
            name="amountPayable"
            value="0"
        />
    </div>
    <div class="col-lg-4">
        <label>Make Concission:</label>
        <input
            type="number"
            class="form-control form-control-solid"
            id="concission"
            placeholder="offer a discount"
            name="concission"
        />
    </div>
    <div class="col-lg-4">
        <label>Deposit:</label>
        <input
            type="number"
            class="form-control form-control-solid"
            id="deposit"
            placeholder="Enter deposit amount"
            name="deposit"
        />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <div class="form-group row">
            <label class="col-3 col-form-label">Select Payment Method:</label>
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
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="paymentType" value="dues" />
                        <span></span>
                        Continue With Dues
                    </label>
                </div>
            </div>
            <span class="form-text text-info">
                <b>Note:</b> Concission can not be made if "Continue with Dues"
                was chosen
            </span>
        </div>
    </div>
</div>


<script>
        $(document).on("change", ".collect", function() {
            let category = $(this).attr("data-target");
            let amount_box = $("#payable");

            let amount_payable = parseInt($("#payable").val());
            let category_amount = parseInt(
                $(`input[name="${category}"]`).val()
            );

            if ($(this).prop("checked") == true) {
                $(`input[name="${category}"]`).prop("disabled", false);
                $(`input[name="${category}"]`).prop("readonly", true);
                amount_box.val(amount_payable + category_amount);
            } else {
                $(`input[name="${category}"]`).prop("disabled", true);
                $(`input[name="${category}"]`).prop("readonly", false);
                amount_box.val(parseInt($("#payable").val()) - category_amount);
            }
        });

        /**
        
        # handle discount in fee
        
        **/
        $(document).on("keyup change scroll", "#concission", function() {
            let depositAmount =
                parseInt($("#payable").val()) - parseInt($(this).val());
            $("#deposit").val(depositAmount);
        });

        $(document).on("keydown", "input", function(e) {
            let code = e.keyCode || e.which;
            if (code == 13) {
                //Enter keycode
                e.preventDefault();
            }
        });
</script>
