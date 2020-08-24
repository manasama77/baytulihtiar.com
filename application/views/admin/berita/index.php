<div class="page-content">
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/berita/index');?>">Berita</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">List Berita</a>
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">
				<a href="<?=site_url('backend/berita/create');?>" class="btn green btn-sm btn-outline"><i class="fa fa-plus fa-fw"></i> Tambah Berita </a>
			</div>
		</div>
	</div>
	<h1 class="page-title"> Berita <i class="fa fa-fw fa-angle-right"></i>
		<small>List Berita</small>
	</h1>
	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="portlet light  bordered ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-newspaper-o"></i>Filter Berita 
					</div>
				</div>
				<div class="portlet-body form">
					<form class="form-horizontal" id="form-filter" method="get" action="<?=site_url('backend/berita/index');?>">
						<div class="form-body">
							<div class="form-group">
								<label class="col-sm-3 control-label" for="">Status</label>
								<div class="col-sm-4">
									<select class="form-control" id="status_filter" name="status_filter" required>
										<option value="semua" <?=($status_filter == 'semua')?'selected':'';?>>Semua Status</option>
										<option value="aktif" <?=($status_filter == 'aktif')?'selected':'';?>>Aktif</option>
										<option value="tidak aktif" <?=($status_filter == 'tidak aktif')?'selected':'';?>>Tidak Aktif</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="">Admin/Karyawan</label>
								<div class="col-sm-4">
									<select class="form-control" id="admin_karyawan_filter" name="admin_karyawan_filter" required>
										<option value="semua" <?=($admin_karyawan_filter == 'semua')?'selected':'';?>>Semua Tipe</option>
										<option value="admin" <?=($admin_karyawan_filter == 'admin')?'selected':'';?>>Admin</option>
										<option value="karyawan" <?=($admin_karyawan_filter == 'karyawan')?'selected':'';?>>Karyawan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="">Cari</label>
								<div class="col-sm-4">
									<select class="form-control" id="tipe_filter" name="tipe_filter">
										<option value="judul" <?=($tipe_filter == 'judul')?'selected':'';?>>Judul</option>
										<option value="isi" <?=($tipe_filter == 'isi')?'selected':'';?>>Isi</option>
										<option value="nama_admin" <?=($tipe_filter == 'nama_admin')?'selected':'';?>>Nama Admin</option>
										<option value="nik_karyawan" <?=($tipe_filter == 'nik_karyawan')?'selected':'';?>>Nomor Induk Karyawan</option>
										<option value="nama_karyawan" <?=($tipe_filter == 'nama_karyawan')?'selected':'';?>>Nama Karyawan</option>
									</select>
								</div>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="kata_filter" name="kata_filter" value="<?=$kata_filter;?>" placeholder="Kata Pencarian">
								</div>
							</div>
						</div>
						<div class="form-action">
							<div class="row">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn green" id="filter" name="filter">Filter</button>
									<a href="<?=site_url('backend/berita/index');?>" class="btn default">Reset</a>
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
							<i class="fa fa-newspaper-o"></i>Data Berita
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
						<?php
						if($this->session->flashdata('flag')){
							?>
							<div class="alert bg-green-jungle bg-font-green-jungle">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong><?=$this->session->flashdata('flag');?></strong>
							</div>
						<?php } ?>
						<table class="table">
							<thead>
								<tr>
									<th class="text-center" style="width: 170px;"><i class="fa fa-fw fa-cogs"></i> </th>
									<th>Judul</th>
									<th class="text-center">Gambar</th>
									<th class="text-center">Status</th>
									<th>Dibuat Oleh</th>
								</tr>
							</thead>
							<tbody>
								<?php if($arrs->num_rows() == 0){ ?>
									<tr>
										<td colspan="6" class="text-center sbold">DATA TIDAK DITEMUKAN</td>
									</tr>
								<?php }else{ ?>
									<?php foreach($arrs->result() as $arr){ ?>
										<tr>
											<td class="text-center">
												<div class="btn-group btn-group-solid">
													<a href="<?=site_url();?>backend/berita/edit/<?=$arr->id;?>" class="btn blue btn-sm" title="Edit">
														<i class="fa fa-pencil"></i>
													</a>
													<button onclick="confirmDestroy('<?=$arr->id;?>')" class="btn red btn-sm" title="Delete">
														<i class="fa fa-trash"></i>
													</button>
													<?php
													if($arr->flag_aktif == 'tidak aktif'){
														?>
														<button onclick="confirmAktivasi('<?=$arr->id;?>', '1')" class="btn green btn-sm" title="Aktifkan Berita">
															<i class="fa fa-check"></i>
														</button>
														<?php
													}
													?>
													<?php
													if($arr->flag_aktif == 'aktif'){
														?>
														<button onclick="confirmAktivasi('<?=$arr->id;?>', '0')" class="btn dark btn-sm" title="Non Aktifkan Berita">
															<i class="fa fa-times"></i>
														</button>
														<?php
													}
													?>
													<button type="button" class="btn yellow btn-sm" onclick="showModal('<?=$arr->id;?>');" title="Preview">
														<i class="fa fa-newspaper-o"></i>
													</button>
												</div>
											</td>
											<td><?=$arr->judul;?></td>
											<td class="text-center">
												<img src="<?=base_url('assets/img/berita/');?><?=$arr->gambar;?>" style="max-width:100px;">
											</td>
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
	<div class="modal-dialog">
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