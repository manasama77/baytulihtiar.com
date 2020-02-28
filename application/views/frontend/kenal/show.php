<div class="container-fluid">

	<div class="row">
		<div class="col s12">
			<div class="center">
				<a href="<?=site_url('kenal');?>">
					<img src="<?=base_url();?>assets/img/kenal baik 2.png" class="responsive-img">
				</a>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col s12 m4" style="text-align:center; margin-top:10px;">
			
			<img class="materialboxed responsive-img" align="center" src="<?=base_url('assets/img/profile/'.$gambar);?>" >
		</div>
		<div class="col s12 m8">
			<div class="card-panel" style="min-height:400px;">
				<h4 class="green-text text-darken-3" style="margin-top:0px;"><?=$judul;?></h4>
				<p id="vcontent" style="font-size:14px; text-align: justify;"><?=$isi;?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 right-align">
			<a href="<?=site_url('kenal');?>" class="waves-effect waves-yellow btn-small green darken-3"><i class="fas fa-chevron-left"></i> Kembali</a>
		</div>
	</div>

</div>