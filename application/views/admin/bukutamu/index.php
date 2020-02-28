<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/bukutamu/index');?>">Buku Tamu</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">List Buku Tamu</a>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Buku Tamu <i class="fa fa-fw fa-angle-right"></i>
		<small>List Buku Tamu</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-newspaper-o"></i>Data Buku Tamu
					</div>
				</div>
				<div class="portlet-body">
					<table class="table">
						<thead>
							<tr>
								<!-- <th class="text-center" style="width: 100px;"><i class="fa fa-fw fa-cogs"></i> </th> -->
								<th>Nama</th>
								<th>Email</th>
								<th>Pesan</th>
							</tr>
						</thead>
						<tbody>
							<?php if($arrs->num_rows() == 0){ ?>
								<tr>
									<td colspan="3" class="text-center sbold">DATA TIDAK DITEMUKAN</td>
								</tr>
							<?php }else{ ?>
								<?php foreach($arrs->result() as $arr){ ?>
									<tr>
										<td><?=$arr->nama;?></td>
										<td><?=$arr->email;?></td>
										<td><?=$arr->pesan;?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>