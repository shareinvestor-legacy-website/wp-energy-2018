<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact Form</title>
		<style>
			body {
				font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
				font-size: 14px;
			}
			.container {
				width: 100%;
			}
			h1 {
				font-size: 20px;
				margin: 25px 0px;
				color: #004687;
			}
			h2 {
				font-size: 16px;
				margin: 15px 0px;
				color: #004687;
			}
			table {
				width: 100%;
				border: none;
				padding: 0px;
				border-spacing: 0px;
			}
			table tr:nth-child(odd) {
				background-color: #eeeeee;
			}
			table tr td {
				vertical-align: top;
				padding: 10px 15px;
			}
		</style>
	</head>
	<body>
		<div class="container">
		  	<h1>Contact Form</h1>
			<table>
				<tr>
					<td><strong>Name : </strong></td>
					<td>{{@$name}}</td>
				</tr>
				<tr>
					<td><strong>Organization : </strong></td>
					<td>{{@$organization}}</td>
				</tr>
				<tr>
					<td><strong>E-Mail : </strong></td>
					<td>{{@$email}}</td>
				</tr>
				<tr>
					<td><strong>Address : </strong></td>
					<td>{{@$address}}</td>
				</tr>
				<tr>
					<td><strong>Tel : </strong></td>
					<td>{{@$tel}}</td>
				</tr>
				<tr>
					<td><strong>Message / ข้อความ : </strong></td>
					<td>{!! @$messages !!}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
