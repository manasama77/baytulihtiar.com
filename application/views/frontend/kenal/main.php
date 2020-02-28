<div class="container-fluid ">
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=site_url('kenal');?>"><img src="<?=base_url();?>assets/img/kenal baik 2.png" class="responsive-img"></a>
				</div>
			</div>
		</div>

		<div class="row">

			<?php if($arr_berita->num_rows() == 0){ ?>
				<div class="col s12 center">
					<h5 class="title">Tidak Ada Berita</h5>
				</div>
			<?php }else{ ?>
				<?php foreach ($arr_berita->result() as $berita) { ?>
					<div class="col s12 m4 l4 center">
						<div class="card medium hoverable waves-effect waves-green scale-transition scale-out">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator responsive-img" src="<?=base_url();?>assets/img/profile/<?=$berita->gambar;?>" style="max-width:400px !important; max-height: 225px !important;">
							</div>
							<div class="card-content activator">
								<span class="card-title activator grey-text text-darken-4 left-align" style="font-size:16px; margin-top:-10px !important;">
									<strong><?=$berita->judul;?></strong>
								</span>
							</div>
							<div class="card-action left-align">
								<a href="<?=site_url('kenal/show/'.$berita->id);?>" class="green-text text-darken-3" style="font-size: 14px; vertical-align: middle;">
									<strong>Baca Selengkapnya <i class="fas fa-chevron-right fa-fw"></i></strong>
								</a>
								<span class="activator"><i class="material-icons right">more_vert</i></span>
							</div>
							<div class="card-reveal left-align">
								<span class="card-title right-align btn-small red right hoverable">
									<i class="material-icons">arrow_drop_down</i>
								</span>
								<a href="<?=site_url('berita/show/'.$berita->id);?>" class="black-text">
									<span class="card-title" style="font-size:18px;"><?=$berita->judul;?></span>
									<p class="text-justify"><?=mb_strimwidth(trim($berita->isi), 0, 200, "&hellip;");?></p>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>

		</div>

	</div>
	<div class="divider"></div>
</div>