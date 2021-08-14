<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Full Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="fullName"
                id="fullName"
                placeholder="Full Name"
                value="{{ $editData['student']['name'] }}"
            />
            <!-- @if($errors->has('fullName'))
                <span class="text-danger">{{ $errors->first('fullName') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student full name.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Date of Birth</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdDOB"
                readonly
                id="dob"
                placeholder="Month/Day/Year"
                value="{{ $editData['student']['dob'] }}"
            />
            <!-- @if($errors->has('stdDOB'))
                <span class="text-danger">{{ $errors->first('stdDOB') }}</span>
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
            <label>Place of Birth</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdPOB"
                id="stdPOB"
                placeholder="City or Village or Town"
                value="{{ $editData['student']['pob']}}"
            />
            <!-- @if($errors->has('stdPOB'))
                <span class="text-danger">{{ $errors->first('stdPOB') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student place of birth.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Gender</label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="stdGender"
                            checked="checked"
                            value="male" {{ $editData['student']['gender'] == 'male' ? 'checked' : '' }}
                        />
                        <span></span>
                        Male
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="stdGender"  value="femate" {{ $editData['student']['gender'] == 'femate' ? 'checked' : '' }} />
                        <span></span>
                        Female
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="stdGender" value="other" {{ $editData['student']['gender'] == 'other' ? 'checked' : '' }} />
                        <span></span>
                        Other
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select student gender</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Religion</label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="stdReligion"
                            id="stdReligion"
                            checked="checked"
                            value="muslim" {{ $editData['student']['religion'] == 'muslim' ? 'checked' : '' }}
                        />
                        <span></span>
                        Muslim
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="stdReligion" value="non-muslim" {{ $editData['student']['religion'] == 'non-muslim' ? 'checked' : '' }} />
                        <span></span>
                        None-Muslim
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select student religion.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Nationality</label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="stdNationality"
                            id="stdNationality"
                            checked="checked"
                            value="pakistani" {{ $editData['student']['nationality'] == 'pakistani' ? 'checked' : '' }}
                        />
                        <span></span>
                        Pakistani
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="stdNationality" value="forigner" {{ $editData['student']['nationality'] == 'forigner' ? 'checked' : '' }} />
                        <span></span>
                        Forigner
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select student nationality.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <!-- <div class="col-xl-4"> -->
        <!--begin::Input-->
        <!-- <div class="form-group">
            <label>Student Mobile No.</label>
            <input
                type="tel"
                class="form-control form-control-solid"
                name="stdPhone"
                placeholder="3429999999"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter student mobile number.</span
            >
        </div> -->
        <!--end::Input-->
    <!-- </div> -->
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                class="form-control form-control-solid"
                name="std_email"
                id="std_email"
                placeholder="student@example.com"
                value="{{ $editData['student']['email'] }}"
            />
            <!-- @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student email address.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<hr />

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Father Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdFatherName"
                is="stdFatherName"
                placeholder="Student Father Name"
                value="{{ $editData['student']['father_name'] }}"
            />
            <!-- @if($errors->has('stdFatherName'))
                <span class="text-danger">{{ $errors->first('stdFatherName') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student father name.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Father CNIC</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdFatherCNIC"
                id="stdFatherCNIC"
                placeholder="99999-9999999-9"
                value="{{ $editData['student']['father_cnic'] }}"
            />
            <!-- @if($errors->has('stdFatherCNIC'))
                <span class="text-danger">{{ $errors->first('stdFatherCNIC') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student father cnic.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Father Occupation</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdFatherOccupation"
                id="stdFatherOccupation"
                placeholder="Student Father Occupation"
                value="{{ $editData['student']['father_occupation'] }}"
            />
            <!-- @if($errors->has('stdFatherOccupation'))
                <span class="text-danger">{{ $errors->first('stdFatherOccupation') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student father occupation.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<hr />

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Mother Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdMotherName"
                id="stdMotherName"
                placeholder="Student Mother Name"
                value="{{ $editData['student']['mother_name'] }}"
            />
            <!-- @if($errors->has('stdMotherName'))
                <span class="text-danger">{{ $errors->first('stdMotherName') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student mother name.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Mother CNIC</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdMotherCNIC"
                id="stdMotherCNIC"
                placeholder="99999-9999999-9"
                value="{{ $editData['student']['mother_cnic'] }}"
            />
            <!-- @if($errors->has('stdMotherCNIC'))
                <span class="text-danger">{{ $errors->first('stdMotherCNIC') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student mother cnic.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Mother Occupation</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="stdMotherOccupation"
                id="stdMotherOccupation"
                placeholder="Student Mother Occupation"
                value="{{ $editData['student']['mother_occupation'] }}"
            />
            <!-- @if($errors->has('stdMotherOccupation'))
                <span class="text-danger">{{ $errors->first('stdMotherOccupation') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student mother occupation.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<hr />

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Emergency Contact</label>
            <input
                type="tel"
                class="form-control form-control-solid"
                name="stdEmergency"
                id="stdEmergency"
                placeholder="3429999999"
                value="{{ $editData['student']['contact_no'] }}"
            />
            <!-- @if($errors->has('stdEmergency'))
                <span class="text-danger">{{ $errors->first('stdEmergency') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student emergency contact.</span
            >
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Profile Picture</label>
            <div></div>
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input form-control-solid"
                    name="stdImage"
                    id="stdImage"
                />
                <label class="custom-file-label" for="cnicFile"
                    >Choose student profile</label
                >
                @if($errors->has('stdImage'))
                    <span class="text-danger">{{ $errors->first('stdImage') }}</span>
                @endif
            </div>
            <span class="form-text text-muted"
                >Please browse guardian CNIC copy.</span
            >
            
        </div>
        <!--end::Input-->
    </div>

   
</div>
