@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<form>
				<select id="select" class="check">{{--  onchange="checkAlert(event)" --}}
					<option disabled selected value="choose">
						CHOOSE
					</option>
					@for ($i = 1; $i < 11; $i++)
					<option value="{{$i}}" id="{{$i}}">
						{{$i}}
					</option>
					@endfor
					{{-- <option value="i2g" id="i2g">
						iPhone 2g
					</option>
					<option value="i3g" id="i3g">
						iPhone 3g
					</option> --}}
				</select>
				{{-- <button class="check" type="button">
					GO
				</button> --}}
			</form>
			<table id="iphone1g" border="1">
				<tr>
					<td id="itable1">
						0
					</td>
					<td id="itable2">
						2
					</td>
				</tr>
			</table>
			<hr />
			@php
				$value = 4;
			@endphp
			{{$value}}
			<p id="p">0</p>
		</div>
	</div>
</div>

@endsection

@section('scripts1')
    <script>
        $(document).ready(function () {
			$(document).on('click', '.check', function () {
				var m = document.getElementById("itable1");
				var n = document.getElementById("itable2");
				var p = document.getElementById("p");

				var select = document.getElementById("select");

				m.innerHTML = select.value;
				var h = 9;

				if(select.value!="choose"){
					$.ajax({
						type: "GET",
						url: "/salary1/"+select.value,
						success: function (response) {
							console.log(response);
							// $('#p').val(response.test);
							p.innerHTML = response.test;
						}
					});
				}
			});
		});
    </script>
@endsection