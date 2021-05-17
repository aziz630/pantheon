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
            </select>
            <span class="form-text text-muted">Please select section.</span>
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
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
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Admission Date</label>
            <input
                type="text"
                class="form-control form-control-solid"
                readonly
                id="admissionDate"
                name="stdAdmissionDate"
                placeholder="Month/Day/Year"
            />
            <span class="form-text text-muted"
                >Please enter student admission date.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
