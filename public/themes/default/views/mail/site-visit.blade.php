<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Site Visit</title>
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
			<table>
				<tr>
					<td><strong>Full Name : </strong></td>
					<td>{{@$fullname}}</td>
				</tr>
				<tr>
					<td><strong>E-Mail : </strong></td>
					<td>{{@$email}}</td>
                </tr>
                <tr>
					<td><strong>Telephone 1 : </strong></td>
					<td>{{@$telephone1}}</td>
                </tr>
                <tr>
					<td><strong>Telephone 2 : </strong></td>
					<td>{{@$telephone2}}</td>
				</tr>
				<tr>
					<td><strong>Number Of Shares : </strong></td>
					<td>{!! @$numberOfShares !!}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
