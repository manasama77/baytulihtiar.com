<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/profile/index');?>">Profile</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">List Profile</a>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Profile <i class="fa fa-fw fa-angle-right"></i>
		<small>List Profile</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="portlet box blue-hoki ">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-newspaper-o"></i>Data Profile
					</div>
				</div>
				<div class="portlet-body">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center" style="width: 100px;"><i class="fa fa-fw fa-cogs"></i> </th>
								<th>Judul</th>
								<th class="text-center">Gambar</th>
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
										<td class="text-center">
											<div class="btn-group btn-group-solid">
												<a href="<?=site_url();?>backend/profile/edit/<?=$arr->id;?>" class="btn blue btn-sm" title="Edit">
													<i class="fa fa-pencil"></i>
												</a>
												<button type="button" class="btn yellow btn-sm" onclick="showModal('<?=$arr->id;?>');" title="Preview">
													<i class="fa fa-newspaper-o"></i>
												</button>
											</div>
										</td>
										<td><?=$arr->judul;?></td>
										<td class="text-center">
											<img src="<?=base_url('assets/img/profile/');?><?=$arr->gambar;?>" style="max-width:100px;">
										</td>
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