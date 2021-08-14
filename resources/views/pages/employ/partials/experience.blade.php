<div class="row">
    
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Experience</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="empExperience"
                placeholder="Enter your exprience"
                value="{{ old('empExperience')}}"
            />
            @if ($errors->has('empExperience'))
                <span class="text-danger">{{ $errors->first('empExperience') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter your exprience.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Joining Date</label><span class="text-danger">*</span>
            <input
                type="text"
                class="form-control form-control-solid"
                readonly
                name="empJoinDate"
                id="admissionDate"
                placeholder="Month/Day/Year"
                value="{{ old('empJoinDate') }}"
            />
            @if($errors->has('empJoinDate'))
                <span class="text-danger">{{ $errors->first('empJoinDate') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please select effected date.</span
            >
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>Salary</label>
            <input
                type="text"
                class="form-control form-control-solid"
                name="empSalary"
                placeholder="Enter your exprience"
                value="{{ old('empSalary')}}"
            />
            @if ($errors->has('empSalary'))
                <span class="text-danger">{{ $errors->first('empSalary') }}</span>
            @endif
            <span class="form-text text-muted"
                >Please enter your exprience.</span
            >
        </div>
        <!--end::Input-->
    </div>
    
</div>

<div class="row">
    <div class="col-xl-8">
        <!--begin::Input-->
        <div class="form-group realprocode lst increment">
            <label>Attache File</label>
            <div class="float-right">
            <button class="btn btn-success" type="button"> <i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
            </div>
        </div>
        <!--end::Input-->

        <div class="clone hide">
            <div class="realprocode control-group lst input-group" style="margin-top:10px">
                <input type="file" name="empfile[]" value="{{ old('empfile[]')}}" class="myfrm form-control">
                <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                
                </div> 
            </div>
            @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
            @endif
        </div>
    </div>
</div>

