<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/profile/index');?>">Profile</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">Edit Profile</a>
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">
				<a href="<?=site_url('backend/profile/index');?>" class="btn green btn-sm btn-outline"><i class="fa fa-backward fa-fw"></i> List Profile </a>
			</div>
		</div>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Profile <i class="fa fa-fw fa-angle-right"></i>
		<small>Edit Profile</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="portlet box blue-hoki">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-table"></i>Form Edit Profile 
					</div>
				</div>
				<div class="portlet-body">
					<form id="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul" value="<?=$judul_profile;?>" required autofocus>
						</div>
            <div class="form-group">
            	<label for="summernote_1">Isi</label>
            	<textarea name="isi" id="summernote_1" required><?=$isi_profile;?></textarea>
            </div>
            <div class="form-group">
            	<label for="gambar">Gambar</label>
            	<input type="file" class="form-control" id="gambar" name="gambar">
            	<img src="<?=base_url('assets/img/profile/');?><?=$gambar_profile;?>" style="max-width: 200px; margin-top: 10px;">
            </div>
            <div class="form-group">
            	<input type="hidden" name="id" value="<?=$id_profile;?>">
            	<input type="hidden" name="prev_image" value="<?=$gambar_profile;?>">
            	<button type="submit" class="btn btn-primary btn-block">Update Profile Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>