<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Guardian Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="guardianName"
                id="guardianName"
                placeholder="Guardian Name"
                value="{{ $editData['guardian']['grd_name'] }}"
            />
            <!-- @if($errors->has('guardianName'))
                <span class="text-danger">{{ $errors->first('guardianName') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian full name.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Guardian CNIC</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="guardianCnic"
                id="guardianCnic"
                placeholder="99999-9999999-9"
                value="{{ $editData['guardian']['grd_cninc_no'] }}"
            />
            <!-- @if($errors->has('guardianCnic'))
                <span class="text-danger">{{ $errors->first('guardianCnic') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student date of birth.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Landline No.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="guardianHomePhone"
                id="guardianHomePhone"
                placeholder="guardian landline number"
                value="{{ $editData['guardian']['grd_home_ph'] }}"
            />
            <!-- @if($errors->has('guardianHomePhone'))
                <span class="text-danger">{{ $errors->first('guardianHomePhone') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian landline number</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Mobile No.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="guardianMobile"
                id="guardianMobile"
                placeholder="guardian mobile number"
                value="{{ $editData['guardian']['grd_mobile'] }}"
            />
            <!-- @if($errors->has('guardianMobile'))
                <span class="text-danger">{{ $errors->first('guardianMobile') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian mobile number</span
            >
        </div>
        <!--end::Input-->
    </div>
    
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Email address.</label>
            <input
                type="email"
                class="form-control form-control-solid"
                name="guardianEmail"
                id="guardianEmail"
                placeholder="guardian email address"
                value="{{ $editData['guardian']['grd_email'] }}"
            />
            <!-- @if($errors->has('guardianEmail'))
                <span class="text-danger">{{ $errors->first('guardianEmail') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian email address</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Occupation.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="guardianOccupation"
                id="guardianOccupation"
                placeholder="guardian occupation"
                value="{{ $editData['guardian']['grd_occupation'] }}"
            />
            <!-- @if($errors->has('guardianOccupation'))
                <span class="text-danger">{{ $errors->first('guardianOccupation') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian occupation</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <!--begin::Input-->
        <div class="form-group">
            <label>Address</label>
            <textarea
                class="form-control form-control-solid"
                name="gurdianAddress"
                id="gurdianAddress"
                rows="4"
                placeholder="guardian address"
               
            >{{ $editData['guardian']['grd_address'] }}</textarea>

            <!-- @if($errors->has('gurdianAddress'))
                <span class="text-danger">{{ $errors->first('gurdianAddress') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter guardian address.</span
            >
           
        </div>
        
        <!--end::Input-->
    </div>
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>CNIC Copy</label>
            <div></div>
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input form-control-solid"
                    name="guardianCnicCopy"
                    id="guardianCnicCopy"
                />
                <label class="custom-file-label" for="guardianCnicCopy"
                    >Choose file</label
                >
               
            </div>
            <!-- @if($errors->has('guardianCnicCopy'))
                <span class="text-danger">{{ $errors->first('guardianCnicCopy') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please browse guardian CNIC copy.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
