<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  /* border: 1px solid #ddd; */
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
<tr>
        <td>
            <h2>
            <?php $image_path = '/stdProfile/samad-removebg-preview.png'; ?>
            <img src="{{ public_path().$image_path }}" width="200" height="150" alt="User Avatar">
            </h2>
        </td>
        <td>
            <p>Phone: +92 946 721 803-4</p>
            <p>Email: info@rcns.edu.pk</p>
            <p>Address: Marghazar road, chill shagai, saidu Sharif swat KPK</p>
            <p> <b> Student Monthly Fee</b> </p>
        </td>       
    </tr>
  
   
</table>

@php 
$registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();
$originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

@endphp 

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id'] }}</td>
  </tr>

    <tr>
    <td>2</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['std_name'] }}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['std_father_name'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Session</b></td>
    <td>{{ $details['session']['session'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Class </b></td>
    <td>{{ $details['class']['class_name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Monthly Fee</b></td>
    <td>{{ $originalfee }} $</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>8</td>
    <td><b>Fee For this Student of {{ $month }} </b></td>
    <td>{{ $finalfee }} $</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student ID No</b></td>
    <td>{{ $details['student']['id'] }}</td>
  </tr>

    <tr>
    <td>2</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['std_name'] }}</td>
  </tr>

  <tr>
    <td>3</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['std_father_name'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Session</b></td>
    <td>{{ $details['session']['session'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Class </b></td>
    <td>{{ $details['class']['class_name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Monthly Fee</b></td>
    <td>{{ $originalfee }} $</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount  }} %</td>
  </tr>

    <tr>
    <td>8</td>
    <td><b>Fee For this Student of {{ $month }} </b></td>
    <td>{{ $finalfee }} $</td>
  </tr>
 
    
   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

</body>
</html>
