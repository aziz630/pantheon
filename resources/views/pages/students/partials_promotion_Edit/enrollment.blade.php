<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Session</label>
            <select
                name="session"
                id="session"
                class="form-control form-control-solid"
            >
                <option>Select Session</option>

                @foreach ($sessions as $session)
                    <option value="{{ $session->id }}" {{ $editData->academic_session_id == $session->id ? 'selected' : ''
                        }} > {{ $session["session"].'-'.($session["session"] + 1) }}</option
                    >
                @endforeach
            </select>
            <span class="form-text text-muted"
                >Please select academic session.</span
            >
           
        </div>
            <!-- @if($errors->has('session'))
                <span class="text-danger">{{ $errors->first('session') }}</span>
            @endif -->
        <!--end::Input-->
    </div>
    
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Class</label>
            <select
                name="class"
                id="class"
                class="form-control form-control-solid"
            >
                <option>Select Class</option>

                @if(isset($classes)) @foreach($classes as $class)
                <option value="{{ $class['id'] }}" {{ ($editData->class_id == $class['id'])? 'selected': '' }}>
                    {{ $class["class_name"] }}
                </option>
                @endforeach @endif
            </select>
            <span class="form-text text-muted">Please select class.</span>
            
        </div>
            <!-- @if($errors->has('class'))
                <span class="text-danger">{{ $errors->first('class') }}</span>
            @endif -->
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Section</label>
            <select
                name="section"
                id="sections"
                class="form-control form-control-solid"
            >
                <option>Select Section</option>

                @foreach($sections as $section)
                <option
                    value="{{ $section->id }}" {{ ($editData->section_id == $section->id)? 'selected': '' }}
                    >{{ $section->section_name }}</option
                >
                @endforeach
            </select>
           
            <span class="form-text text-muted">Please select section.</span>
        </div>
            <!-- @if($errors->has('section'))
                <span class="text-danger">{{ $errors->first('section') }}</span>
            @endif -->
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <!-- <div class="col-xl-4"> -->
        <!--begin::Input-->
        <!-- <div class="form-group">
            <label>Registration No.</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="regNumber"
                placeholder="student registration number"
            />
            <span class="form-text text-muted"
                >Please enter student registration number.</span
            >
        </div> -->
        <!--end::Input-->
    <!-- </div> -->

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Admission Date</label>
            <input
                type="text"
                class="form-control form-control-solid"
                readonly
                name="stdAdmissionDate"
                id="stdAdmissionDate"
                placeholder="Month/Day/Year"
                value="{{ $editData['student']['std_admission_date'] }}"
            />
            <!-- @if($errors->has('stdAdmissionDate'))
                <span class="text-danger">{{ $errors->first('stdAdmissionDate') }}</span>
            @endif -->
            <span class="form-text text-muted"
                >Please enter student admission date.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
