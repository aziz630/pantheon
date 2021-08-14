{{-- Extends layout --}}
@extends('layout.default') @section('styles')
<link
    href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}"
    rel="stylesheet"
    type="text/css"
/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.esm.min.js" integrity="sha512-h0dSZkvjBWllHan49Ajy8Tk9UVa27kFrqUyQl652qZAwHBJw4lvszsqxWS+A3VcS4QJreD1n9QN2/TYIHHiQpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.esm.min.js" integrity="sha512-h0dSZkvjBWllHan49Ajy8Tk9UVa27kFrqUyQl652qZAwHBJw4lvszsqxWS+A3VcS4QJreD1n9QN2/TYIHHiQpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.esm.min.js" integrity="sha512-m67THwS2sKHzF41W3o+7xsfLw7QtIhIRJLIhIcCtsuDw1CdThxSq/UQyAjdivjgcikUGAMeFP3wKa+eov5sLdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.min.js" integrity="sha512-ppWbHq6q2f7HAwS481w6qikuC0XEeBnmkRg6KWnWg3zSIbJwWWBgsCDMAxzSB7SVqXzWwSYQ2s8TSJKjnaikMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>	
	<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script> -->

    @endsection

{{-- Content --}}
@section('content') @php $search = false; @endphp

<!-- {{-- Create new class form --}} -->
<!--begin::Card-->

<div class="card card-custom mb-7">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon-search text-primary"></i>
            </span>
            <h3 class="card-label">
                {{ __("Manage Monthly/Yearly profit") }} <small>Filteration enabled</small>
            </h3>
        </div>
        <div class="card-toolbar">
            
           
        </div>
        
    </div>
    <div class="card-body">
    

            <div class="row">

                <div class="col-md-4">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            readonly
                            name="start_date"
                            id="start_date"
                            placeholder="Month/Day/Year"
                            
                        />
                    </div>
                    <!--end::Input-->
                </div>
                <div class="col-md-4">
                    <!--begin::Input-->
                    <div class="form-group">
                        <label>End Date:</label>
                        <input
                            type="text"
                            class="form-control form-control-solid"
                            readonly
                            name="end_date"
                            id="end_date"
                            placeholder="Month/Day/Year"
                            
                        />
                    </div>
                    <!--end::Input-->
                </div>

                <div class="col-md-4 pt-7">
                <a id="search" class="btn btn-primary" name="search"> Search</a>
                </div>
            
            </div>

            <div class="row">
            <div class="col-md-12">
                <div id="DocumentResults">
                    <script id="document-template" type="text/x-handlebars-template">
                        <form action="{{ route('employee.account.salary.store') }}" method="post" >
                        @csrf
                            <table class="table table-bordered table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                    @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        @{{{tdsource}}}	
                                    </tr>
                                   
                                </tbody>
                            </table>
                            <!-- <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>   -->
                        </form>
                    </script>
                </div> 		
            </div>
        </div>
       
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                   
                    <div class="card-body">
                        <div id="kt_flotcharts_7" style="height: 300px;"></div>
                    </div>
                </div>
                <!--end::Card-->
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">create dynamic barchart in laravel</h1>
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-container">
                                    <div class="chart has-fixed-height" id="bars_basic"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>


    </div>
</div>

<!-- end::Card -->
@endsection

{{-- Scripts Section --}}
@section('scripts')

<script type="text/javascript">
var bars_basic_element = document.getElementById('bars_basic');
if (bars_basic_element) {
    var bars_basic = echarts.init(bars_basic_element);
    bars_basic.setOption({
        color: ['#3398DB'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {            
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: ['Fruit', 'Vegitable','Grains','sssss', 'wwwww' ],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Total Products',
                type: 'bar',
                barWidth: '20%',
                data: [
                    {{$student_fee}},
                    {{$Employee_salary}}, 
                    {{$other_cost}},
                    {{$total_cost}},
                    {{$profit}},
                ]
            }
        ]
    });
}
</script>


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var start_date = $('#start_date').val();   
    var end_date = $('#end_date').val();   
     $.ajax({
      url: "{{ route('report.profit.datewaise.get')}}",
      type: "get",
      data: {'start_date':start_date, 'end_date': end_date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>



<script>
    var KTBootstrapDatepicker = (function() {
        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            };
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
        }

        // Private functions
        var demos = function() {
            // minimum setup
            $("#start_date").datepicker({ 
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            });

            $("#end_date").datepicker({ 
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows
            });
        };

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    })();

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();

    });
</script>




<script >


var KTFlotchartsDemo = function() {
var demo7 = function() {
		// horizontal bar chart:

		var data1 = [
			[
                10, {{ $profit }}
            ],
			[
                20, {{ $total_cost }}
            ],
			[
                30, {{ $other_cost }}
            ],
			[
                40, {{ $Employee_salary  }}
            ],
			[
                50, {{ $student_fee }}
            ],
			
		];

		var options = {
			colors: [KTApp.getSettings()['colors']['theme']['base']["primary"]],
			series: {
				bars: {
					show: true
				}
			},
			bars: {
				horizontal: true,
				barWidth: 6,
				lineWidth: 0, // in pixels
				shadowSize: 0,
				align: 'left'
			},
			grid: {
				tickColor: "#eee",
				borderColor: "#eee",
				borderWidth: 1
			}
		};

		$.plot($("#kt_flotcharts_7"), [data1], options);
	}

    return {
		// public functions
		init: function() {
			// default charts
			demo7();
		}
	};
}();
    jQuery(document).ready(function() {
	KTFlotchartsDemo.init();
});
</script>
@endsection


<!-- {{ url('students_list_ajax') }} -->











