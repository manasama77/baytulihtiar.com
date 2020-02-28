<div class="container-fluid grey lighten-5">

	<div class="row">
		<div class="col s12">
			<!-- <h5 class="center green-text text-darken-3 text-shadow">Berita BAIK</h5> -->
			<div class="center">
				<a href="<?=site_url('berita');?>">
					<img src="<?=base_url();?>assets/img/berita baik 2.png" class="responsive-img">
				</a>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col s12 m4" style="text-align:center; margin-top:10px;">
			
			<img class="materialboxed responsive-img" align="center" src="<?=base_url('assets/img/berita/'.$gambar);?>" >
		</div>
		<div class="col s12 m8">
			<div class="card-panel" style="min-height:400px;">
				<h4 class="green-text text-darken-3" style="margin-top:0px;"><?=$judul;?></h4>
				<blockquote>
					<p style="font-size:12px;" class="grey-text text-darken-1 left-align">
						<i class="fas fa-user fa-fw"></i> <?=$created_name;?><br>
						<i class="fas fa-calendar-alt fa-fw"></i> <?=$created_date;?>
					</p>
				</blockquote>
				<p id="vcontent" style="font-size:14px; text-align: justify;"><?=$isi;?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 right-align">
			<a href="<?=site_url('berita');?>" class="waves-effect waves-yellow btn-small green darken-3"><i class="fas fa-chevron-left"></i> Kembali</a>
		</div>
	</div>

</div>