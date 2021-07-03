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
                value="{{ old('title')}}"
            />
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
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
                value="{{ old('fullName')}}"
            />
            @if ($errors->has('fullName'))
                <span class="text-danger">{{ $errors->first('fullName') }}</span>
            @endif
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
                value="{{ old('fName')}}"
            />
            @if ($errors->has('fName'))
                <span class="text-danger">{{ $errors->first('fName') }}</span>
            @endif
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
            <label>Contact No.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="empContact"
                placeholder="Employee mobile number"
                value="{{ old('empContact')}}"
            />
            @if ($errors->has('empContact'))
                <span class="text-danger">{{ $errors->first('empContact') }}</span>
            @endif
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
                value="{{ old('empDOB')}}"
            />
            @if ($errors->has('empDOB'))
                <span class="text-danger">{{ $errors->first('empDOB') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter date of birth.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                class="form-control form-control-solid"
                name="emp_email"
                placeholder="employee@example.com"
                require
                value="{{ old('emp_email')}}"
            />
            @if ($errors->has('emp_email'))
                <span class="text-danger">{{ $errors->first('emp_email') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter email address.</span
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
                value="{{ old('empCurrentAddress')}}"
            />
            @if ($errors->has('empCurrentAddress'))
                <span class="text-danger">{{ $errors->first('empCurrentAddress') }}</span>
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
                name="empPermanentAddress"
                placeholder="Enter permanent address"
                value="{{ old('empPermanentAddress')}}"
            />
            @if ($errors->has('empPermanentAddress'))
                <span class="text-danger">{{ $errors->first('empPermanentAddress') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter permanent Address.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Profile picture</label>
            <div></div>
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input form-control-solid"
                    name="file"
                    value="{{ old('file')}}"
                    id="File"
                />
                @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <label class="custom-file-label" for="cnicFile"
                    >Choose file</label
                >
            </div>
            <span class="form-text text-muted"
                >Please select profile picture.</span
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
                        Non-Muslim
                    </label>
                </div>
            </div>
            <span class="form-text text-muted"
                >Please select your religion.</span
            >
        </div>
        <!--end::Input-->
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
                >Please select gender</span
            >
        </div>
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Role</label>
            <select
                name="role_id"
                id="role_id"
                value="{{ old('role_id')}}"
                class="form-control form-control-solid"
            >
                <option>Select Role</option>
                <option value="admin">Admin </option>
                <option value="employee">Employee </option>
            </select>
            
           
            @if ($errors->has('role_id'))
                <span class="text-danger">{{ $errors->first('role_id') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please select employee.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">

  

</div>
    

<hr />
