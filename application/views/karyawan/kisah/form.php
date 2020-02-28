<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?=site_url('karyawan/kisah/index');?>">Kisah</a>
				<i class="fa fa-circle"></i>
				<a href="javascript:;">Tambah Kisah</a>
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">
				<a href="<?=site_url('karyawan/kisah/index');?>" class="btn green btn-sm btn-outline"><i class="fa fa-backward fa-fw"></i> List Kisah </a>
			</div>
		</div>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Kisah <i class="fa fa-fw fa-angle-right"></i>
		<small>Tambah Kisah</small>
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="portlet box blue-hoki">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-table"></i>Form Tambah Kisah 
					</div>
				</div>
				<div class="portlet-body">
					<form id="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul" required autofocus>
						</div>
            <div class="form-group">
            	<label for="video">Youtube Video Link</label>
            	<input type="text" class="form-control" id="video" name="video">
            	<div class="alert alert-info" role="alert" style="margin-top: 10px;">
                <h4>Cara mengambil link video Youtube ?</h4><hr>Untuk menyisipkan video Youtube cukup dengan <b>Copy</b> text pada Address Bar, seperti gambar berikut<br><img src="http://baytulikhtiar.com/assets/img/how youtube.png" class="img-responsive img-thumbnail"><br>Lalu <b>Paste</b> pada form diatas.
              </div>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary btn-block">Buat Kisah Baik</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</div>