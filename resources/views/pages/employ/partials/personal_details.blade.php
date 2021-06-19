<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Post Title</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="title"
                placeholder="Enter Post Title"
                value=""
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
            <label>ERP number</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="ERP_number"
                placeholder="employ ERP Number"
                value=""
            />
            <span class="form-text text-muted"
                >Please enter Employee ERP Number.</span
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

</div>

<div class="row">

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Profile picture</label>
            <div></div>
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input form-control-solid"
                    name="image"
                    id="File"
                />
                <label class="custom-file-label" for="cnicFile"
                    >Choose file</label
                >
            </div>
            <span class="form-text text-muted"
                >Please browse attachement file.</span
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
                            name="empNationality"
                            checked="checked"
                            value="pakistani"
                        />
                        <span></span>
                        Pakistani
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empNationality" value="forigner" />
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
                            value="muslim"
                        />
                        <span></span>
                        Muslim
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empReligion" value="non-muslim" />
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
<div class="row">
    <div class="col-xl-4">
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
                            value="male"
                        />
                        <span></span>
                        Male
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empGender" value="female" />
                        <span></span>
                        Female
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empGender" value="other" />
                        <span></span>
                        Other
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select student gender</span
            >
        </div>
    </div>
    <div class="col-xl-4">
        <div class="form-group">
            <label>Marital Status </label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="empMarried"
                            checked="checked"
                            value="single"
                        />
                        <span></span>
                        Single
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empMarried" value="married" />
                        <span></span>
                        Married
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select your status.</span
            >
        </div>
    </div>


    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Session</label>
            <select
                name="role_id"
                id="role_id"
                class="form-control form-control-solid"
            >
                <option>Select User</option>
                <option value="admin">Admin </option>
                <option value="employee">Employee </option>
                <option value="domEmployee">Domestic Employee </option>  
            </select>
            <span class="form-text text-muted"
                >Please select employee.</span
            >
        </div>
        <!--end::Input-->
    </div>

    {{-- <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Employee</label>
            <div class="col-12 col-form-label">
                <div class="radio-inline">
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input
                            type="radio"
                            name="empSatus"
                            checked="checked"
                            value="1"
                        />
                        <span></span>
                        Admin
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empSatus" value="2" />
                        <span></span>
                    Teacher
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empSatus" value="3" />
                        <span></span>
                        Domestic Employee
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select Employee Status</span
            >
        </div>

        <!--end::Input-->
    </div> --}}
</div>
<hr />
