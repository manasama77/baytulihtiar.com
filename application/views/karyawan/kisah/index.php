<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('karyawan/kisah/index');?>">Kisah</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">List Kisah</a>
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">
				<a href="<?=site_url('karyawan/kisah/create');?>" class="btn green btn-sm btn-outline"><i class="fa fa-plus fa-fw"></i> Tambah Kisah </a>
			</div>
		</div>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Kisah <i class="fa fa-fw fa-angle-right"></i>
		<small>List Kisah</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="portlet light  bordered ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-newspaper-o"></i>Filter Kisah 
					</div>
				</div>
				<div class="portlet-body form">
					<form class="form-horizontal" id="form-filter" method="get" action="<?=site_url('karyawan/kisah/index');?>">
						<div class="form-body">
							<div class="form-group">
								<label class="col-sm-3 control-label" for="">Status</label>
								<div class="col-sm-5">
									<select class="form-control" id="status_filter" name="status_filter" required>
										<option value="semua" <?=($status_filter == 'semua')?'selected':'';?>>Semua Status</option>
										<option value="aktif" <?=($status_filter == 'aktif')?'selected':'';?>>Aktif</option>
										<option value="tidak aktif" <?=($status_filter == 'tidak aktif')?'selected':'';?>>Tidak Aktif</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-action">
							<div class="row">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn green" id="filter" name="filter">Filter</button>
									<a href="<?=site_url('karyawan/kisah/index');?>" class="btn default">Reset</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	if($status_filter != NULL){
		?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="portlet box blue-hoki ">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-newspaper-o"></i>Data Kisah
						</div>
					</div>
					<div class="portlet-body">
						<?php
						if($this->session->flashdata('delete')){
						?>
							<div class="alert bg-green-jungle bg-font-green-jungle">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong><?=$this->session->flashdata('delete');?></strong>
							</div>
						<?php } ?>
						<table class="table">
							<thead>
								<tr>
									<th class="text-center" style="width: 170px;"><i class="fa fa-fw fa-cogs"></i> </th>
									<th>Judul</th>
									<th class="text-center">Status</th>
									<th>Dibuat Oleh</th>
								</tr>
							</thead>
							<tbody>
								<?php if($arrs->num_rows() == 0){ ?>
									<tr>
										<td colspan="4" class="text-center sbold">DATA TIDAK DITEMUKAN</td>
									</tr>
								<?php }else{ ?>
									<?php foreach($arrs->result() as $arr){ ?>
										<tr>
											<td class="text-center">
												<div class="btn-group btn-group-solid">
													<?php
													if($arr->flag_aktif == 'tidak aktif'){
													?>
													<a href="<?=site_url();?>karyawan/kisah/edit/<?=$arr->id;?>" class="btn blue btn-sm" title="Edit">
														<i class="fa fa-pencil"></i>
													</a>
													<button onclick="confirmDestroy('<?=$arr->id;?>')" class="btn red btn-sm" title="Delete">
														<i class="fa fa-trash"></i>
													</button>
													<?php
													}
													?>
													<button type="button" class="btn yellow btn-sm" onclick="showModal('<?=$arr->id;?>');" title="Preview">
														<i class="fa fa-youtube-play"></i>
													</button>
												</div>
											</td>
											<td><?=$arr->judul;?></td>
											<td class="uppercase text-center">
												<?php
												if($arr->flag_aktif == 'aktif'){
													echo '<span class="badge bg-green-jungle bg-font-green-jungle">Aktif</span>';
												}else{
													echo '<span class="badge bg-red-thunderbird bg-font-red-thunderbird">Tidak Aktif</span>';
												}
												?>
											</td>
											<td>
												<?php
												if($arr->id_admin != NULL){
													echo '<span class="badge bg-blue-steel bg-font-blue-steel">Admin</span>';
													echo '<span class="badge bg-blue-steel bg-font-blue-steel">'.$arr->nama_admin.'</span>';
												}else{
													echo '<span class="badge bg-grey-gallery bg-font-grey-gallery">Karyawan</span>';
													echo '<span class="badge bg-grey-gallery bg-font-grey-gallery">'.$arr->nama_karyawan.'</span>';
												}
												?>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
						<?=$this->pagination->create_links();?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>

</div>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="title_detail_modal"></h4>
			</div>
			<div class="modal-body" id="content_detail_modal">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>