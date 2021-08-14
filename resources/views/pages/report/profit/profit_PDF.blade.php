<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.esm.min.js" integrity="sha512-h0dSZkvjBWllHan49Ajy8Tk9UVa27kFrqUyQl652qZAwHBJw4lvszsqxWS+A3VcS4QJreD1n9QN2/TYIHHiQpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.esm.min.js" integrity="sha512-m67THwS2sKHzF41W3o+7xsfLw7QtIhIRJLIhIcCtsuDw1CdThxSq/UQyAjdivjgcikUGAMeFP3wKa+eov5sLdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.min.js" integrity="sha512-ppWbHq6q2f7HAwS481w6qikuC0XEeBnmkRg6KWnWg3zSIbJwWWBgsCDMAxzSB7SVqXzWwSYQ2s8TSJKjnaikMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">	 -->
	<!-- <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>	
	<!-- <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script> -->

</head>
<body>


@php 

  
$student_fee = App\Models\AccountStudentsFee::whereBetween('date', [$start_date, $end_date])->sum('amount');

$Employee_salary = App\Models\AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

$other_cost = App\Models\AccountOtherCost::whereBetween('date', [$sdate, $edate])->sum('amount');

$total_cost = $other_cost + $Employee_salary;
$profit  =  $student_fee - $total_cost;

@endphp 

<!-- <table id="customers">
  <tr>
    <td clspan="2" style="text-align: center">
      <h4>Reporting Date : {{ date('D M Y', strtotime($sdate)) }} - {{ date('D M Y', strtotime($edate)) }}</h4>
    </td>
  </tr>
  <tr>
    <td width="50%">Purpose</td>
    <td width="50%">Amount</td>
  </tr>
  <tr>
    <td>Student Fee</td>
    <td>{{$student_fee}}</td>
  </tr>

    <tr>
    <td>Employee Salary</td>
    <td>{{$Employee_salary}}</td>
  </tr>

  <tr>
    <td>Other Cost</td>
    <td>{{$other_cost}}</td>
  </tr>
  <tr>
    <td>Total Cost</td>
    <td>{{ $total_cost }}</td>
  </tr>
  <tr>
    <td>Profit</td>
    <td>{{$profit}}</td>
  </tr>
  
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>
  
<hr> -->

<div class="col-md-12">
	<h1 class="text-center">how to create dynamic barchart in laravel - websolutionstuff.com</h1>
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

</body>
</html>
