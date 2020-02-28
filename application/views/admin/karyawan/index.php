<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/karyawan/index');?>">Karyawan</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">Manage Karyawan</a>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Karyawan <i class="fa fa-fw fa-angle-right"></i>
		<small>Manage Karyawan</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>Data Karyawan
					</div>
				</div>
				<div class="portlet-body">
					<?php
					if($this->session->flashdata('edit')){
						?>
						<div class="alert bg-green-jungle bg-font-green-jungle">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?=$this->session->flashdata('edit');?></strong>
						</div>
					<?php } ?>
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
								<th>NIK</th>
								<th>Nama</th>
								<th class="text-center">Status</th>
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
												<button onclick="showModal('<?=$arr->nik;?>');" class="btn blue btn-sm" title="Edit">
													<i class="fa fa-pencil"></i>
												</button>
												<button onclick="confirmDestroy('<?=$arr->nik;?>')" class="btn red btn-sm" title="Delete">
													<i class="fa fa-trash"></i>
												</button>
												<?php
												if($arr->flag_aktif == 'tidak aktif'){
													?>
													<button onclick="confirmAktivasi('<?=$arr->nik;?>', '1')" class="btn green btn-sm" title="Aktifkan Karyawan">
														<i class="fa fa-check"></i>
													</button>
													<?php
												}
												?>
												<?php
												if($arr->flag_aktif == 'aktif'){
													?>
													<button onclick="confirmAktivasi('<?=$arr->nik;?>', '0')" class="btn dark btn-sm" title="Non Aktifkan Karyawan">
														<i class="fa fa-times"></i>
													</button>
													<?php
												}
												?>
												<button onclick="showModalReset('<?=$arr->nik;?>');" class="btn blue btn-sm" title="Reset Password">
													<i class="fa fa-key"></i>
												</button>
											</div>
										</td>
										<td><?=$arr->nik;?></td>
										<td><?=$arr->nama;?></td>
										<td class="uppercase text-center">
											<?php
											if($arr->flag_aktif == 'aktif'){
												echo '<span class="badge bg-green-jungle bg-font-green-jungle">Aktif</span>';
											}else{
												echo '<span class="badge bg-red-thunderbird bg-font-red-thunderbird">Tidak Aktif</span>';
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

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i>Tambah Karyawan
					</div>
				</div>
				<div class="portlet-body">
					<form id="form">
						<div class="form-group">
							<label for="">NIK</label>
							<input type="text" class="form-control" id="nik" name="nik" required>
						</div>
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" required>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select class="form-control" id="flag_aktif" name="flag_aktif">
								<option value="aktif">Aktif</option>
								<option value="tidak aktif">Tidak Aktif</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" class="btn btn-primary btn-block">Tambah Karyawan</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-sm">
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

<div class="modal fade" id="modalReset">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Reset Password</h4>
			</div>
			<div class="modal-body">
				<form id="form-reset">
					<div class="form-group">
						<label for="new_password">New Password</label>
						<input type="password" class="form-control" id="new_password" name="new_password" autocomplete="new-password">
					</div>
					<div class="form-group">
						<input type="hidden" id="id_reset" name="id_reset">
						<button type="submit" class="btn btn-primary btn-block" id="submit_reset">Reset</button>
					</div>
				</form>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>