<div class="row">
    
    <div class="col-xl-6">
        <!--begin::Input-->
        <div class="form-group">
            <label>Year Of Passing</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="mpassingyear"
                placeholder="Enter passing year"
                value="{{ old('mpassingyear')}}"
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
                name="msubject"
                placeholder="Enter Subject"
                value="{{ old('msubject')}}"
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
                name="mschoolname"
                placeholder="college name"
                value="{{ old('mschoolname')}}"
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
                name="mpersentage"
                placeholder="Enter persentage"
                value="{{ old('mpersentage')}}"
            />
            <span class="form-text text-muted"
                >Please enter Enter your parsentage.</span
            >
        </div>
        <!--end::Input-->
    </div>
</div>
