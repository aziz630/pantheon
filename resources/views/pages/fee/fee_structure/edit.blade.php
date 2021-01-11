{{-- Extends layout --}}
@extends('layout.default') @section('styles') @endsection

{{-- Content --}}
@section('content')

{{-- Edit fee structure --}}
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-edit-1 text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Edit Fee Structure") }}
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form
        class="form"
        action="{{ route('fee.structure.update') }}"
        method="post"
    >
        <div class="card-body">
            @include('pages.alerts.alerts')
            @csrf
            <input
                        type="hidden"
                        name="sID"
                        value="{{ $structure[0]->id }}"
                    />
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="session"
                        >Session <span class="text-danger">*</span></label
                    >
                    <select class="form-control" id="session" name="sessionId">
                        <option selected style="display: none;"
                            >Select Session</option
                        >
                        @foreach ($sessions as $session)
                        <option value="{{ $session->id }}" {{ $structure[0]->session_id == $session->id ? 'selected="true"' : ''
                            }} >{{ $session->session }}</option
                        >
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="class"
                        >Class <span class="text-danger">*</span></label
                    >
                    <select class="form-control" id="class" name="classId">
                        <option selected style="display: none;"
                            >Select Class</option
                        >
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ $structure[0]->class_id == $class->id ? 'selected="true"' : '' }}
                            >{{ $class->class_name }}</option
                        >
                        @endforeach
                        <option value="">2nd</option>
                    </select>
                </div>
            </div>
            @if(!$fee_categories) 
                {{  __('please creat fee categories first.') }}
            @else 

            @php $i = 0; @endphp
            
            @foreach($fee_categories as $category)
                @php 
                    $fee_amount = $category->id == $structure[$i]->fee_category_id ? $structure[$i]->fee_amount : 0;
                    $no_repeat = $category->id == $structure[$i]->fee_category_id  ? $structure[$i]->no_repeat : false;
                @endphp
            <div class="form-group row">
                <div class="col-lg-4">
                    <label>{{ $category->category_name }} Fee:</label>
                    <input
                        type="hidden"
                        name="{{ $category->category_name }}_id"
                        value="{{ $category->id }}"
                    />
                    <input
                        type="number"
                        class="form-control"
                        name="{{ $category->category_name }}"
                        placeholder="Enter amount in PKR"
                        value="{{ $fee_amount }}"
                    />
                </div>
                <div class="col-lg-4">
                    <div class="checkbox-list">
                        <label class="checkbox">
                            <input
                                type="checkbox"
                                name="{{ $category->category_name }}_no_repeat"
                                {{ $no_repeat ? 'checked="true"' : '' }}
                            />
                            <span></span>
                            One Time?
                        </label>
                    </div>
                </div>
            </div>
            @php $i++; @endphp
            @endforeach @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mr-2">
                        Save
                    </button>
                    <a
                        href="{{ url('fee_structures') }}"
                        class="btn btn-secondary"
                    >
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->

@endsection

{{-- Scripts Section --}}
@section('scripts') @endsection
