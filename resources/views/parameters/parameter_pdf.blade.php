<!DOCTYPE html>
<html>
<head>
	<title>Laporan Monitoring Mesin Hemodialisis</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Monitoring Mesin Hemodialisis</h5>
		<h6> {{$patient_name}}</h6>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Arterial Press</th>
                <th>Venous Press</th>
                <th>Dyalizate Press</th>
                <th>Temperature</th>
                <th>Conductivity</th>
                <th>Sodium</th>
                <th>Bicarbonate</th>
                <th>Uf Remove</th>
                <th>Uf Objective</th>
                <th>Uf Rate</th>
                <th>Time</th>
                <th>Fluid</th>
                <th>Warning</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($parameters as $parameter)
            <tr>
                <td>{{ $i++}}</td>
                <td>{{ $parameter->arterial_press . " mmHg" }}</td>
                <td>{{ $parameter->venous_press . " mmHg" }}</td>
                <td>{{ $parameter->dyalizate_press . " mmHg" }}</td>
                <td>{{ $parameter->temperature . " ºC" }}</td>
                <td>{{ $parameter->conductivity . " mS/cm" }}</td>
                <td>{{ $parameter->sodium . " mEq/L" }}</td>
                <td>{{ $parameter->bicarbonate . " mEq/L" }}</td>
                <td>{{ $parameter->uf_remove . " L" }}</td>
                <td>{{ $parameter->uf_objective . " L" }}</td>
                <td>{{ $parameter->uf_rate . " mL/min" }}</td>
                <td>{{ $parameter->time }}</td>
                <td>{{ $parameter->fluid . " mL/min" }}</td>
                <td>{{ $parameter->warning }}</td>
			@endforeach
		</tbody>
	</table>

</body>
</html>