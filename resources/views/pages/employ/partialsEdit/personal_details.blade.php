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
                value="{{ $employee->title }}"
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
                value="{{ $employee->name }}"
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
                value="{{ $employee->father_name }}"
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
                value="{{ $employee->contact_no }}"
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
                value="{{ $employee->dob }}"
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
                name="email"
                placeholder="employee@example.com"
                value="{{ $employee->email }}"
            />
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
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
                value="{{ $employee->current_address }}"
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
                value="{{ $employee->permanent_address }}"
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
                    id="File"
                />
                <label class="custom-file-label" for="cnicFile"
                    >Choose file</label
                >
                @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
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
                            
                            value="pakistani" {{ $employee->nationality == 'pakistani' ? 'checked' : '' }}
                        />
                        <span></span>
                        Pakistani
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empNationality" value="forigner"
                        {{ $employee->nationality == 'forigner' ? 'checked' : '' }} />
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
                           
                            value="muslim"{{ $employee->religion == 'muslim' ? 'checked' : '' }}
                        />
                        <span></span>
                        Muslim
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empReligion" value="non-muslim"
                        {{ $employee->religion == 'non-muslim' ? 'checked' : '' }} />
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
                            value="single" {{ $employee->married == 'single' ? 'checked' : '' }}
                        />
                        <span></span>
                        Single
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empMarried" value="married" {{ $employee->married == 'married' ? 'checked' : '' }} />
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
                            value="male" {{ $employee->gender == 'male' ? 'checked' : '' }}
                        />
                        <span></span>
                        Male
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empGender" value="female" {{ $employee->gender == 'female' ? 'checked' : '' }} />
                        <span></span>
                        Female
                    </label>
                    <label
                        class="radio radio-outline radio-outline-2x radio-primary"
                    >
                        <input type="radio" name="empGender" value="other" {{ $employee->gender == 'other' ? 'checked' : '' }} />
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
                class="form-control form-control-solid"
            >
                <option>Select User</option>
                <option value="admin" {{ $employee->is_employee == 'admin' ? 'selected' : '' }}> Admin </option>
                <option value="employee" {{ $employee->is_employee == 'employee' ? 'selected' : ''}} >Employee </option>
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

