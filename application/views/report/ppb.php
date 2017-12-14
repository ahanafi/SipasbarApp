<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Report Data PPB</title>
</head>
<style>
	*{
		margin: 0;
		padding: 0;
		font-family: Arial, Sans-serif, Helvetica;
	}
	.brand{
		display: inline-flex;
	}
	.brand-text{
		margin-left: 70px;
	}

	.title{
		text-align: center;
	}

	.left-detail{
		font-size: 14px;
	}
	.left-detail table tr td{
		padding: 1.5px 0px;
	}
	.left-detail table tr td:nth-child(3){
		border-bottom: 1px solid #333;
	}
	table thead, th{
		text-align: center;
		vertical-align: middle;
	}
	.displaying-data{
		margin-top:5px;
		margin-bottom: 15px;
		width: 100%;
		border-collapse: collapse;
		border: 1px solid black;
	}
	.displaying-data thead{
		font-weight: bold;
		text-align: center;
		vertical-align: middle;
		line-height: 35px;
	}
	.ctr{
		text-align: center;
	}
	body{
		margin:60px 70px;
		font-family: Arial, Sans-serif, Helvetica;
	}
	tbody tr td{
		padding: 5px;
	}
	#two-section{
		font-size: 13px;
		width: 100%;
		margin-top: 10px;
		display: inline-flex;
	}
	.section-first{
		margin-top: 10px;
		width: 50%;
		display: block;
	}
	.section-second{
		margin-top: 10px;
		width: 50%;
		right: 0;
		position: absolute;
		display: block;
	}
	img{
		width: 50px;
	}
	#approval{
		font-size: 12px;
		width: 100%;
		border:1px solid black;
		border-collapse: collapse;
		float: right;
	}
	#approval tr td, #approval tr th{
		border:1px solid black;
		padding:5px;
	}
	#approval tr:nth-child(2) td{
		padding: 20px;
	}
</style>
<body>
	<div id="header">
		<div class="brand">
			<div class="brand-logo">
				<img src="<?php echo $root.'/sipasbar/images/sublime-logo.png'; ?>" style="width: 50px;">
			</div>
			<div class="brand-text">
				<h4>PT. SURYARAYA RUBBERINDO INDUSTRIES</h4>
				<p>Manufacturer of Motorcycle Tires &amp; Tubes</p>
			</div>
		</div>
	</div>
	<div class="title">
		<h2>PAS PENGELUARAN BARANG</h2>
	</div>
	<div class="left-detail">
		<table style="width: 35%;">
			<tr>
				<td>No.(*)</td>
				<td>:</td>
				<td><?php echo $ppb->nomor; ?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?php echo convertToIDdate($ppb->tanggal); ?></td>
			</tr>
			<tr>
				<td>No. Kendaraan</td>
				<td>:</td>
				<td><?php echo $ppb->no_kendaraan; ?></td>
			</tr>
			<tr>
				<td>Tujuan</td>
				<td>:</td>
				<td><?php echo $ppb->tujuan; ?></td>
			</tr>
		</table>
	</div>
	<div id="data">
		<table class="displaying-data" border="1" cellspacing="0" style="font-size: 13px;">
			<thead>
				<tr>
					<th class="ctr">No.</th>
					<th>NAMA BARANG</th>
					<th>JUMLAH</th>
					<th>SATUAN</th>
					<th>KETERANGAN</th>
				</tr>
			</thead>
			<tbody>
				<?php if($totalb > 0): ?>
					<?php foreach ($barang as $b): ?>
						<tr>
							<td class="ctr"><?php echo $no++; ?></td>
							<td><?php echo $b->nama_barang; ?></td>
							<td class="ctr"><?php echo $b->jumlah ?></td>
							<td class="ctr"><?php echo $b->satuan; ?></td>
							<td><?php echo $b->keterangan; ?></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
	<div id="two-section">
		<div class="section-first">
			<span class="head"><u>Catatan </u> :</span>
			<ul type="dash" style="padding-left: 20px;margin-top: 5px;">
				<li>(*) Diisi oleh Seksi General Service</li>
				<li>Tanda Tangan pemohon adalah Kepala Seksi/Ka. Dept./Ka. Divisi</li>
				<li>
					Security wajib memastikan barang yang dibawa sesuai dengan yang tertera di pas pengeluaran barang
				</li>
				<li>
					Putih (Pembawa), Biru (GS), Kuning (Pemohon), Merah (Security)
				</li>
			</ul>
		</div>
		<div class="section-second">
			<table id="approval" cellspacing="0">
				<thead>
					<tr>
						<th style="border-top-color: white;border-left-color:white;border-bottom-color: white;"></th>
						<th>SECURITY</th>
						<th>PEMBAWA</th>
						<th>DIKETAHUI</th>
						<th>PEMOHON</th>
					</tr>
					<tr>
						<td style="border-left-color:white;"></td>
						<td class="ctr">
							<?php if ($app->is_approve_security == 1): ?>
								<img src="<?php echo $root.'/sipasbar/images/approved.png'; ?>">
							<?php else: ?>
								<img src="<?php echo $root.'/sipasbar/images/rejected.png'; ?>">
							<?php endif ?>
						</td>
						<td class="ctr">
							<?php if ($app->is_approve_kasie == 1): ?>
								<img src="<?php echo $root.'/sipasbar/images/approved.png'; ?>">
							<?php else: ?>
								<img src="<?php echo $root.'/sipasbar/images/rejected.png'; ?>">
							<?php endif ?>
						</td>
						<td class="ctr">
							<?php if ($app->is_approve_kadept == 1): ?>
								<img src="<?php echo $root.'/sipasbar/images/approved.png'; ?>">
							<?php else: ?>
								<img src="<?php echo $root.'/sipasbar/images/rejected.png'; ?>">
							<?php endif ?>
						</td>
						<td class="ctr">
							<?php if ($app->is_approve_kasie == 1): ?>
								<img src="<?php echo $root.'/sipasbar/images/approved.png'; ?>">
							<?php else: ?>
								<img src="<?php echo $root.'/sipasbar/images/rejected.png'; ?>">
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>TGL.</td>
						<td><?php echo rewindDate($ppb->tanggal); ?></td>
						<td><?php echo rewindDate($ppb->tanggal); ?></td>
						<td><?php echo rewindDate($ppb->tanggal); ?></td>
						<td><?php echo rewindDate($ppb->tanggal); ?></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</body>
</html>