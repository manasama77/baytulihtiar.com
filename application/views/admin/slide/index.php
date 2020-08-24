<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?= site_url('backend/slide/index'); ?>">Slide Show</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">Manage Slide Show</a>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Slide Show <i class="fa fa-fw fa-angle-right"></i>
		<small>Manage Slide Show</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>Data Slide Show
					</div>
				</div>
				<div class="portlet-body">
					<?php
					if ($this->session->flashdata('edit')) {
					?>
						<div class="alert bg-green-jungle bg-font-green-jungle">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?= $this->session->flashdata('edit'); ?></strong>
						</div>
					<?php } ?>
					<?php
					if ($this->session->flashdata('delete')) {
					?>
						<div class="alert bg-green-jungle bg-font-green-jungle">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?= $this->session->flashdata('delete'); ?></strong>
						</div>
					<?php } ?>
					<?php
					if ($this->session->flashdata('flag')) {
					?>
						<div class="alert bg-green-jungle bg-font-green-jungle">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?= $this->session->flashdata('flag'); ?></strong>
						</div>
					<?php } ?>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center" style="width: 170px;"><i class="fa fa-fw fa-cogs"></i> </th>
								<th>Banner</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($arrs->num_rows() == 0) { ?>
								<tr>
									<td colspan="2" class="text-center sbold">DATA TIDAK DITEMUKAN</td>
								</tr>
							<?php } else { ?>
								<?php foreach ($arrs->result() as $arr) { ?>
									<tr>
										<td class="text-center">
											<div class="btn-group btn-group-solid">
												<button onclick="showModal('<?= $arr->id; ?>');" class="btn blue btn-sm" title="Edit">
													<i class="fa fa-pencil"></i>
												</button>
												<button onclick="confirmDestroy('<?= $arr->id; ?>')" class="btn red btn-sm" title="Delete">
													<i class="fa fa-trash"></i>
												</button>
											</div>
										</td>
										<td><img class="img-thumbnail" src="<?= base_url() . 'assets/img/slideshow/' . $arr->banner_path; ?>" alt="" style="width: 300px;"></td>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
					<?= $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user"></i>Tambah Slide Show
					</div>
				</div>
				<div class="portlet-body">
					<form id="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="banner_path">Banner</label>
							<input type="file" class="form-control" id="banner_path" name="banner_path" required>
						</div>
						<div class="form-group">
							<button type="submit" id="submit" class="btn btn-primary btn-block">Tambah Slide Show</button>
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