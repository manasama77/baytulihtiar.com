<div class="container-fluid ">
	<a id="beritabaik" class="section scrollspy"></a>
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=site_url('berita');?>"><img src="<?=base_url();?>assets/img/berita baik 2.png" class="responsive-img"></a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s12 m4" style="vertical-align: bottom;">
				<p class="grey-text">
					Total <?=$total_data;?> Berita<br>
					<?=($keyword != NULL)? '<a href="'.site_url('berita').'" class="tooltipped red-text waves-effect waves-yellow" data-position="top" data-tooltip="Hapus Keyword"><i class="fas fa-times fa-fw fa-2x"></i></a>'.'Keyword: '.$keyword : '' ?>
				</p>
			</div>
			<form method="get" action="<?=site_url('berita');?>">
				<div class="input-field col s12 m8">
					<i class="material-icons prefix">search</i>
					<input id="keyword_berita" name="keyword" type="text" required>
					<label for="keyword_berita">Pencarian Berita</label>
					<button type="submit" style="display:none;"></button>
				</div>
			</form>

			<?php if($arr_berita->num_rows() == 0){ ?>
				<div class="col s12 center">
					<h5 class="title">Tidak Ada Berita</h5>
				</div>
			<?php }else{ ?>
				<?php foreach ($arr_berita->result() as $berita) { ?>
					<div class="col s12 m4 l4 center">

						<div class="card hoverable scale-transition scale-out blue-grey lighten-2" >
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator responsive-img" src="<?=base_url();?>assets/img/berita/<?=$berita->gambar;?>" style="min-width:400px !important; min-height: 250px !important; max-width:400px !important; max-height: 250px !important;">
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
			<?php } ?>

		</div>

		<div class="row">
			<div class="col s12 center">
				<?=$this->pagination->create_links();?>
			</div>
		</div>
	</div>
	<div class="divider"></div>
</div>