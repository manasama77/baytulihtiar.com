<div class="container-fluid grey lighten-5">
	<a id="beritabaik" class="section scrollspy"></a>
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=site_url('berita');?>">
						<img src="<?=base_url();?>assets/img/berita baik 2.png" class="responsive-img" style="max-width: 170px !important;">
					</a>
				</div>
			</div>
		</div>
		<?php if($beritas->num_rows() == 0){ ?>
			<div class="row">
				<div class="col s12 center">
					<h5 class="title">Tidak Ada Berita</h5>
				</div>
			</div>
		<?php }else{ ?>
			<div class="row">
				<?php foreach ($beritas->result() as $berita) { ?>
					<div class="col s12 m4 l4 center">

						<div class="card berita hoverable scale-transition scale-out blue-grey lighten-2">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator responsive-img center-align" src="<?=base_url();?>assets/img/berita/<?=$berita->gambar;?>" style="min-width:408px !important; min-height: 250px !important; max-width:4085px !important; max-height: 250px !important;">
								<a href="<?=site_url('berita/show/'.$berita->id);?>" class="white-text">
									<span class="card-title waves-effect waves-light" style="background-color: rgb(96,125,139,0.8); font-size:16px; padding:8px; width:100%;"><?=$berita->judul;?>
									</span>
								</a>
							</div>
							<div class="card-reveal left-align">
								<span class="card-title right-align btn-small red right hoverable">
									<i class="material-icons">arrow_drop_down</i>
								</span>
								<a href="<?=site_url('berita/show/'.$berita->id);?>" class="black-text">
									<span class="card-title" style="font-size:18px;"><?=$berita->judul;?></span>
									<p class="text-justify"><?=mb_strimwidth(trim($berita->isi), 0, 250, "&hellip;");?></p>
								</a>
							</div>
						</div>

					</div>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col s12 center">
					<a href="<?=site_url('berita');?>" target="_blank" class="waves-effect waves-light btn green darken-3 hoverable">Selengkapnya <i class="material-icons right">more</i></a>
				</div>
			</div>
		<?php } ?>

	</div>
	<div class="divider"></div>
</div>