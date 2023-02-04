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

		.footer {
			font-size: 12px;
	        position: fixed;
	        bottom: -50;
	        width: 100%;
	        height: 50px;
/*	        background-color: #f5f5f5;*/
	        text-align: center;
	        line-height: 20px;
	      }
	      a {
	      	color: black;text-decoration: none; cursor: pointer;
	      }
    </style>
</head>

<body>
	<div class="footer">
		<?php foreach ($sosmed as $value): ?>
			<a href="<?= $value->link ?>" target="__BLANK" title="Kunjungi <?= $value->sosmed->name ?>"><?= $value->sosmed->name ?></a>
		<?php endforeach ?>
    </div>
	<table width="100%" cellspacing="0">
		<tr>
			<td style="text-align: center;">
				<p>
					<span style="font-size: 30px; font-weight: bold;">LUTHFI IHDALHUSNAYAIN</span> 
					<br>
					<span><?= web()->zip_code.' | '.web()->city.' | '.web()->address.' | '.web()->phone.' | '.web()->email ?></span>
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
			<td><?= web()->about ?></td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td width="50%">
				<table>
					<tr>
						<td><b>Tempat/Tanggal Lahir</b></td>
						<td> : <?= web()->pob.', '.date_format_indo(web()->dob) ?></td>
					</tr>
					<tr>
						<td><b>Jenis Kelamin</b></td>
						<td> : <?= web()->gender ?></td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td><b>Status Pernikahan</b></td>
						<td> : <?= web()->marital_status ?></td>
					</tr>
					<tr>
						<td><b>Tinggi Badan</b></td>
						<td> : <?= web()->height ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th colspan="2" style="text-align: left;">PENDIDIKAN</th>
		</tr>
		<?php foreach ($education as $value): ?>
			<tr>
				<td width="70%" style="padding-top: 6px;"><b><?= $value->name ?></b></td>
				<td style="text-align: right; padding-top: 6px; vertical-align: top;"><?= date("M-Y",strtotime($value->in)) ?> - <?= $value->out ? date("M-Y",strtotime($value->out)) : 'Sekarang' ?></td>
			</tr>
			<tr>
				<td><b><?= $value->level ?></b> <?= $value->major ?></td>
				<td style="text-align: right; vertical-align: top;"><b><?= $value->ipk ?></b></td>
			</tr>
			<tr>
				<td><?= $value->title ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<hr>
	<table width="100%" cellspacing="0">
		<tr>
			<th colspan="2" style="text-align: left;">PENGALAMAN KERJA</th>
		</tr>
		<?php foreach ($experience as $value): ?>
		<tr>
			<td style="padding-top: 6px;" width="70%"><b> &bull; &nbsp;<?= strtoupper($value->office) ?></b></td>
			<td width="30%" style="text-align: right; vertical-align: top; padding-top: 6px;" rowspan="2">(<?= date("M-Y", strtotime($value->start_at))  ?> - <?= $value->end_at ? date("M-Y", strtotime($value->end_at)) : 'Sekarang' ?>)</td>
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