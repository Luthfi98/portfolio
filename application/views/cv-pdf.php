<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="">
	<style>
    	hr{
    		border: 0.7px solid black;
    	}

    	h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
		    margin-top: 0;
		    margin-bottom: 0;
		}

		.text-top {
			vertical-align: top;
		}
		table{
			font-size: 12px;
		}

		.head th{
			background-color: #15a362; 
			color: white;
/*			border-color: #15a362;*/
		}
		.bullet {
			 list-style-type: disc;
		    margin-left: 20px;
		}
    </style>
</head>

<body>
	<table width="100%" cellspacing="0">
		<tr>
			<td style="text-align: center;">
				<p>
					<span style="font-size: 30px; font-weight: bold;">LUTHFI IHDALHUSNAYAIN</span> 
					<br>
					<span><?= str_replace("||", "|", web()->address).' | '.web()->phone.' | '.web()->email ?></span>
				</p>
			</td>
		</tr>
	</table>
	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th style="text-align: left;">PROFIL PRIBADI</th>
		</tr>

		<tr>
			<td><?= web()->seo_description ?></td>
		</tr>
	</table>
	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th style="text-align: left;">PENDIDIKAN</th>
		</tr>
	</table>
	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th colspan="2" style="text-align: left; padding-bottom: 2rem;">PENGALAMAN KERJA</th>
		</tr>
		<?php foreach ($experience as $value): ?>
		<tr>
			<td width="70%"><b> &bull; &nbsp;<?= strtoupper($value->office) ?></b></td>
			<td width="30%" style="text-align: right; vertical-align: top;" rowspan="2">(<?= date("M-Y", strtotime($value->start_at))  ?> - <?= $value->end_at ? date("M-Y", strtotime($value->end_at)) : 'Sekarang' ?>)</td>
		</tr>
		<tr>
			<td> <?= $value->description ?></td>
		</tr>
		<?php endforeach ?>
	</table>

	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th colspan="2" style="text-align: left; padding-bottom: 2rem;">KETERAMPILAN</th>
		</tr>
		<?php foreach ($skill as $value): ?>
		<tr>
			<td width="70%" style="text-align: left;"><?= strtoupper($value->name) ?></td>
			<td width="30%" style="text-align: right;"><?= strtoupper($value->level) ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>