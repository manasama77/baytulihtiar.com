<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('backend/berita/index');?>">Berita</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">Tambah Berita</a>
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">
				<a href="<?=site_url('backend/berita/index');?>" class="btn green btn-sm btn-outline"><i class="fa fa-backward fa-fw"></i> List Berita </a>
			</div>
		</div>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Berita <i class="fa fa-fw fa-angle-right"></i>
		<small>Tambah Berita</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="portlet box blue-hoki">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-table"></i>Form Tambah Berita 
					</div>
					<!-- <div class="actions">
						<a href="javascript:;" class="btn btn-default btn-sm">
							<i class="fa fa-pencil"></i> Edit 
						</a>
						<a href="javascript:;" class="btn btn-default btn-sm">
							<i class="fa fa-plus"></i> Add 
						</a>
					</div> -->
				</div>
				<div class="portlet-body">
					<form id="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul" required autofocus>
						</div>
            <div class="form-group">
            	<label for="summernote_1">Isi</label>
            	<textarea name="isi" id="summernote_1" required></textarea>
            </div>
            <div class="form-group">
            	<label for="gambar">Gambar</label>
            	<input type="file" class="form-control" id="gambar" name="gambar">
            	<img src="" style="max-width: 200px;">
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary btn-block">Buat Berita Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>