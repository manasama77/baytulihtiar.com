<div class="container-fluid">
	<a id="kisahbaik" class="section scrollspy"></a>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=site_url('kisah');?>">
						<img src="<?=base_url();?>assets/img/kisah baik 2.png" class="responsive-img">
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if($kisahs->num_rows() == 0){ ?>
				<div class="row">
					<div class="col s12 center">
						<h5 class="title">Tidak Ada Kisah</h5>
					</div>
				</div>
			<?php }else{ ?>
				<div class="col s12 l7">
					<div class="video-container scale-transition scale-out hoverable" style="margin-bottom: 20px;">
						<iframe id="h_video" width="560" height="315" src="https://www.youtube.com/embed/<?=$kisahs->result()[0]->video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h5 class="scale-transition scale-out">
						<i class="fab fa-youtube fa-fw red-text"></i> 
						<span id="h_judul">
							<div class="progress" style="display:none;">
								<div class="indeterminate"></div>
							</div>
							<span id="h_judulx" style="display:none;"><strong><?=$kisahs->result()[0]->judul;?></strong></span>
						</span>
					</h5>
				</div>
				<div class="col s12 l4 offset-l1 left">
					<div class="row">
						<?php 
						foreach ($kisahs->result() as $kisah) {
							if($kisah->id_admin != NULL){
								$created_name = $kisah->nama_admin;
								$created_date = $kisah->date_admin;
							}else{
								$created_name = $kisah->nama_karyawan;
								$created_date = $kisah->date_karyawan;
							}
						?>
							<div class="col s12">
								<div class="card horizontal hoverable waves-effect waves-yellow" onclick="changeVideo('<?=$kisah->judul;?>', '<?=$kisah->video;?>');">
									<div class="card-image" style="max-width:200px;">
										<img src="http://img.youtube.com/vi/<?=$kisah->video;?>/mqdefault.jpg" width="150px">
									</div>
									<div class="card-stacked">
										<div class="card-content" style="padding:5px !important;">
											<p><?=$kisah->judul;?><br>
												<small class="grey-text">
													<i class="fas fa-user"></i> <?=$created_name;?><br>
													<i class="fas fa-calendar-alt"></i> <?=$created_date;?><br>
												</small>
											</p>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="col s12">
							<a href="<?=site_url('kisah');?>" class="waves-effect waves-light btn green darken-3 hoverable">Kisah Lainnya <i class="material-icons right">more</i></a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

</div>