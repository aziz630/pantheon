<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Post Title</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="title"
                value="{{ $employee->emp_title }}"
            />
            <span class="form-text text-muted"
                >Please enter post title.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="fullName"
                placeholder="Full Name"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter your full name.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Father's/Husband's Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="fName"
                placeholder="Father Name"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter your father name.</span
            >
        </div>
        <!--end::Input-->
    </div>

</div>

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Current Address</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="empCurrentAddress"
                placeholder="employ current address"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter student current Address.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Contact No.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="empContact"
                placeholder="Employee mobile number"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter contact number</span
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
                name="empDOB"
                readonly
                id="dob"
                placeholder="Month/Day/Year"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter date of birth.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                class="form-control form-control-solid"
                name="empEmail"
                placeholder="employee@example.com"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter email address.</span
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
                name="empPermanentAddress"
                placeholder="Enter permanent address"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter permanent Address.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Marital Status </label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="empStatus"
                            checked="checked"
                            value="1"
                        />
                        <span></span>
                        Single
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empStatus" value="0" />
                        <span></span>
                        Married
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select your status.</span
            >
        </div>
        <!--end::Input-->
    </div>
   
</div>

<div class="row">
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
                            name="empNationality"
                            checked="checked"
                            value="1"
                        />
                        <span></span>
                        Pakistani
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empNationality" value="0" />
                        <span></span>
                        Forigner
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select nationality.</span
            >
        </div>
        <!--end::Input-->
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div class="col-12 col-form-label">
            <div class="radio-inline">
                <label
                    class="radio radio-outline radio-outline-2x radio-primary"
                >
                    <input
                        type="radio"
                        name="empGender"
                        checked="checked"
                        value="1"
                    />
                    <span></span>
                    Male
                </label>
                <label
                    class="radio radio-outline radio-outline-2x radio-primary"
                >
                    <input type="radio" name="empGender" value="0" />
                    <span></span>
                    Female
                </label>
                <label
                    class="radio radio-outline radio-outline-2x radio-primary"
                >
                    <input type="radio" name="stdGender" value="2" />
                    <span></span>
                    Other
                </label>
            </div>
        </div>
        <span class="form-text text-muted"
            >Please select student gender</span
        >
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
                            name="empReligion"
                            checked="checked"
                            value="1"
                        />
                        <span></span>
                        Muslim
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empReligion" value="0" />
                        <span></span>
                        None-Muslim
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select your religion.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
<hr />
