<div class="container-fluid grey lighten-5">
	<a id="kenalbaik" class="section scrollspy"></a>
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=base_url('kenal');?>">
						<img src="<?=base_url();?>assets/img/kenal baik 2.png" class="responsive-img">
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($kenals->result() as $kenal) { ?>
				<div class="col s12 m4 center">
					<div class="card hoverable waves-effect waves-light">
						<div class="card-image">
							<a href="<?=site_url('kenal/show/'.$kenal->id);?>" style="text-align: center !important;">
								<img src="<?=base_url();?>assets/img/berita/<?=$kenal->gambar;?>" class="responsive-img">
							</a>
							<a href="<?=site_url('kenal/show/'.$kenal->id);?>" target="_blank" class="btn-floating halfway-fab waves-effect waves-light green darken-3 hoverable"><i class="material-icons">more_horiz</i></a>
						</div>
						<div class="card-content left-align">
							<a href="<?=site_url('kenal/show/'.$kenal->id);?>" target="_blank" class="black-text">
								<h5><?=$kenal->judul;?></h5>
								<?=preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', mb_strimwidth(trim($kenal->isi), 0, 200, "&hellip;"));?>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
	<div class="divider"></div>
</div>