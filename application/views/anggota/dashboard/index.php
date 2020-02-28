<style>
	table > thead > tr > th {
		font-size: 12px !important;
	}

	table > tbody > tr > td {
		font-size: 12px !important;
	}
</style>
<div class="page-content">
	<!-- BEGIN BREADCRUMBS -->
	<div class="breadcrumbs" style="margin-top:-10px !important;">
		<h1>Informasi Anggota</h1>
	</div>
	<!-- END BREADCRUMBS -->
	<!-- BEGIN PAGE BASE CONTENT -->
	<div class="row">

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<table class="table table-bordered small">
				<thead>
					<tr>
						<th> Nomor Anggota </th>
						<td> <?=$arrs->row()->cif_no;?> </td>
					</tr>
					<tr>
						<th> Nama Anggota </th>
						<td> <?=$arrs->row()->nama;?> </td>
					</tr>
					<tr>
						<th> Nama Majlis </th>
						<td> <?=$arrs->row()->majlis;?> </td>
					</tr>
				</thead>
			</table>
		</div>

	</div>

	<div class="row">

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="dashboard-stat2 bordered">
				<div class="display">
					<div class="number">
						<h3 class="font-green-sharp">
							<span data-counter="counterup" data-value="<?=number_format($saldo_simpanan_pokok);?>">0</span>
						</h3>
						<small>SALDO SIMPANAN POKOK</small>
					</div>
					<div class="icon">
						<i class="fa fa-money"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="dashboard-stat2 bordered">
				<div class="display">
					<div class="number">
						<h3 class="font-red-haze">
							<span data-counter="counterup" data-value="<?=number_format($saldo_simpanan_wajib);?>">0</span>
						</h3>
						<small>SALDO SIMPANAN WAJIB</small>
					</div>
					<div class="icon">
						<i class="fa fa-money"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="dashboard-stat2 bordered">
				<div class="display">
					<div class="number">
						<h3 class="font-blue-sharp">
							<span data-counter="counterup" data-value="<?=number_format($saldo_simpanan_sukarela);?>"></span>
						</h3>
						<small>SALDO SIMPANAN SUKARELA</small>
					</div>
					<div class="icon">
						<i class="fa fa-money"></i>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<table class="table table-bordered small">
				<caption><h3>Tabungan Berencana</h3></caption>
				<thead>
					<tr>
						<th>No Rekekning</th>
						<th>Produk Tabunganan</th>
						<th>Saldo</th>
						<th class="text-center"><i class="fa fa-cog"></i></th>
					</tr>
				</thead>
				<tbody style="font-size:10px !important;">
					<?php
					foreach ($data_taber as $key_taber) {
					?>
					<tr>
						<td><?=$key_taber->account_saving_no;?></td>
						<td><?=$key_taber->product_name;?></td>
						<td><?=number_format($key_taber->saldo_memo, 0);?></td>
						<td class="text-center">
							<button type="button" class="btn btn-info btn-sm" onclick="statementTabungan();">Lihat Statement Tabungan</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<table class="table table-bordered table-sm">
				<caption><h3>Pembiayaan</h3></caption>
				<thead>
					<tr>
						<th>No Rekening</th>
						<th>Produk Pembiayaan</th>
						<th>Saldo</th>
						<th class="text-center"><i class="fa fa-cog"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data_saldo_pembiayaan as $key_pembiayaan) {
					?>
					<tr>
						<td><?=$key_pembiayaan->account_saving_no;?></td>
						<td><?=$key_pembiayaan->product_name;?></td>
						<td><?=number_format($key_pembiayaan->saldo_memo, 0);?></td>
						<td class="text-center">
							<button type="button" class="btn btn-info btn-sm" onclick="kartuAngsuran();">Lihat Kartu Angsuran</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>