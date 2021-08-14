<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Current Address</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdCurrentAddress"
                id="stdCurrentAddress"
                placeholder="Student current address"
                value="{{ $editData['student']['current_address'] }}"
            />
            @if($errors->has('stdCurrentAddress'))
                <span class="text-danger">{{ $errors->first('stdCurrentAddress') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter student current Address.</span
            >
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Permanent Address</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdPermanentAddress"
                id="stdPermanentAddress"
                placeholder="Student permanent address"
                value="{{ $editData['student']['permanent_address'] }}"
            />
            @if($errors->has('stdPermanentAddress'))
                <span class="text-danger">{{ $errors->first('stdPermanentAddress') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter student permanent Address.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
