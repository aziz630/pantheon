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

                @if(isset($sessions)) @foreach($sessions as $session)
                <option value="{{ $session['id'] }}">
                    {{ $session["session"].'-'.($session["session"] + 1) }}
                </option>
                @endforeach @endif
            </select>
            <span class="form-text text-muted"
                >Please select academic session.</span
            >
           
        </div>
            @if($errors->has('session'))
                <span class="text-danger">{{ $errors->first('session') }}</span>
            @endif
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
                <option value="{{ $class['id'] }}">
                    {{ $class["class_name"] }}
                </option>
                @endforeach @endif
            </select>
            <span class="form-text text-muted">Please select class.</span>
            
        </div>
            @if($errors->has('class'))
                <span class="text-danger">{{ $errors->first('class') }}</span>
            @endif
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Section</label>
            <select
                name="section"
                id="section"
                class="form-control form-control-solid"
            >
                <option>Select Section</option>

                @foreach($sections as $section)
                <option
                    value="{{ $section->id }}"
                    >{{ $section->section_name }}</option
                >
                @endforeach
            </select>
            <span class="form-text text-muted">Please select section.</span>
        </div>
            @if($errors->has('section'))
                <span class="text-danger">{{ $errors->first('section') }}</span>
            @endif
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
                id="admissionDate"
                placeholder="Month/Day/Year"
                value="{{ old('stdAdmissionDate') }}"
            />
            @if($errors->has('stdAdmissionDate'))
                <span class="text-danger">{{ $errors->first('stdAdmissionDate') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter student admission date.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
