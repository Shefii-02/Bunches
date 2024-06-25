@extends('layouts.email')
@section('content')
    <table width="100%">
	<tbody>
	
		<tr>
			<td>
				<h3>Thank you for registered at Bunches!. </h3>
                <p>
                	Name: {{$register['firstname'] }} {{ $register['lastname'] }}
                </p>
                 
                <p>
                Email: {{ $register['email'] }}
                </p>
                <p>
                	 Phone: {{ $register['phone'] }}
                </p>
               
                <p>
                Address: {{ $register['address'] }}
                </p>
                <p>
                	City: {{ $register['city'] }}
                </p>
                <p>
                	Province/State: {{ $register['province'] }}
                </p>
                <p>
                	Country: {{ $register['country'] }}
                </p>
                <p>
                	Postalcode: {{ $register['postalcode'] }}
                </p>
			</td>
		</tr>
		<tr style="background: #F993C3;">
		</tr>
	</tbody>
</table>
@endsection