{{-- Extends layout --}}
@extends('layout.emp_default')

{{-- Content --}}
@section('content')

{{-- Dashboard 1 --}}

<div class="row">
  <h1>{{ $user->name }}</h1>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script
    src="{{ asset('js/pages/widgets.js') }}"
    type="text/javascript"
></script>
@endsection
