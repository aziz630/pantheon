<div class="row">
    
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>Year Of Passing</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="opassingyear"
                placeholder="Enter passing year"
                value="{{ $academic->any_other_pass_year }}"
            />
            <span class="form-text text-muted"
                >Please enter passing year.</span
            >
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>Subject</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="osubject"
                placeholder="Enter Subject"
                value="{{ $academic->any_other_subj }}"
            />
            <span class="form-text text-muted"
                >Please enter your subject.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>School Name</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="ocollegename"
                placeholder="Enter college name"
                value="{{ $academic->any_other_schl }}"
            />
            <span class="form-text text-muted"
                >Please enter your School name.</span
            >
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>Persentage</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="ocgpa"
                placeholder="Enter CGPA or %age"
                value="{{ $academic->any_other_per }}"
            />
            <span class="form-text text-muted"
                >Please enter Enter your parsentage.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
