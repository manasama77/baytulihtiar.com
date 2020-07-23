<div class="container-fluid grey lighten-5" style="background-image: url('<?=base_url();?>assets/img/berita/patternng.png');">
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
				<div class="col m8 l8 offset-m2 offset-l2">
					<div class="row">
						<?php foreach ($beritas->result() as $berita) { ?>
							<div class="col s12 m4 l4 center-align">

								<!-- <div class="card berita hoverable scale-transition scale-out blue-grey lighten-2 center-align"> -->
								<div class="card berita">
									<!-- <div class="card-image waves-effect waves-block waves-light center-align"> -->
									<div class="card-image">
										<img class="activator center-align" src="<?=base_url();?>assets/img/berita/<?=$berita->gambar;?>" style="height:180px;">
										<a href="<?=site_url('berita/show/'.$berita->id);?>" class="white-text">
											<span class="card-title waves-effect waves-light" style="background-color: rgb(96,125,139,0.8); font-size:16px; padding:8px; width:100%;"><?=$berita->judul;?>
											</span>
										</a>
									</div>
									<div class="card-reveal left-align" style="background-image: url('<?=base_url();?>assets/img/berita/patternng.png');">
										<!-- <span class="card-title grey-text text-darken-4 right-align btn-small red right hoverable" style="font-size:14px;"> -->
										<span class="card-title grey-text text-darken-4" style="font-size:16px; font-weight: bold;">
											<?=$berita->judul;?>
										</span>
										<a href="<?=site_url('berita/show/'.$berita->id);?>" class="black-text">
											<!-- <p class="text-justify" style="font-size:13px;"><?=mb_strimwidth(trim($berita->isi), 0, 250, "&hellip;");?></p> -->
											<p class="flow-text" style="font-size:13px;"><?=mb_strimwidth(trim($berita->isi), 0, 250, "&hellip;");?></p>
										</a>
									</div>
								</div>

							</div>
						<?php } ?>
					</div>
				</div>
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