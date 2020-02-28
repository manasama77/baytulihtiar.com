<?php
$kisahs->result()[0]->judul
?>
<div class="container-fluid ">
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<a href="<?=site_url('berita');?>"><img src="<?=base_url();?>assets/img/kisah baik 2.png" class="responsive-img"></a>
				</div>
			</div>
		</div>

		<div class="row">
			<?php if($kisahs->num_rows() == 0){ ?>
				<div class="col s12 center">
					<h5 class="title">Tidak Ada Kisah</h5>
				</div>
			<?php
			}else{
				if($kisahs->result()[0]->id_admin != NULL){
					$created_name = $kisahs->result()[0]->nama_admin;
					$created_date = $kisahs->result()[0]->date_admin;
				}else{
					$created_name = $kisahs->result()[0]->nama_karyawan;
					$created_date = $kisahs->result()[0]->date_karyawan;
				}
			?>
				<div class="col s12 center" style="margin-top:-20px;">
					<div class="valign-wrapper">
						<!-- <div class="col s2">
							<button type="button" class="btn red hoverable scale-transition scale-out" onclick="prev();"><i class="material-icons">skip_previous</i></button>
						</div> -->
						<div class="col s8 offset-s2">
							<div class="video-container scale-transition scale-out hoverable" style="margin-bottom: 20px;">
								<iframe id="h_video" width="560" height="315" src="https://www.youtube.com/embed/<?=$kisahs->result()[0]->video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
						<!-- <div class="col s2">
							<button type="button" class="btn red hoverable scale-transition scale-out" onclick="next();"><i class="material-icons">skip_next</i></button>
						</div> -->
					</div>
				</div>
				<div class="col s12 center" style="margin-top:-20px;">
					<h5 class="scale-transition scale-out">
						<span id="h_judul">
							<div class="progress" style="display:none;">
								<div class="indeterminate"></div>
							</div>
							<span id="h_judulx" style="display:none;" class="green-text text-darken-3">
								<strong><i class="fab fa-youtube fa-fw red-text"></i> <?=$kisahs->result()[0]->judul;?></strong>
							</span>
							<div class="row">
								<div class="col s6">
									<p class="sub_judulx" style="display: none; font-size:12px !important;">
										<i class="fas fa-user"></i> <span id="cn"><?=$created_name;?></span>
									</p>
								</div>
								<div class="col s6">
									<p class="sub_judulx" style="display: none; font-size:12px !important;">
										<i class="fas fa-calendar-alt"></i> <span id="cd"><?=$created_date;?></span>
									</p>
								</div>
						</span>
					</h5>
				</div>
				<div class="col s12" style="margin-top:-100px;">
					<div class="carousel">
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

							<a class="carousel-item" href="#" onclick="changeVideo('<?=$kisah->judul;?>', '<?=$kisah->video;?>', '<?=$created_name;?>', '<?=$created_date;?>');">
								<img src="http://img.youtube.com/vi/<?=$kisah->video;?>/mqdefault.jpg" class="responsive-img" style="max-width:400px;">
								<h6 class="card-title green-text text-darken-4" style="font-size:16px !important; font-weight: bolder !important;"><?=$kisah->judul;?><br>
									<small class="grey-text">
										<i class="fas fa-user"></i> <?=$created_name;?><br>
										<i class="fas fa-calendar-alt"></i> <?=$created_date;?><br>
									</small>
								</h6>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
	<div class="divider"></div>
</div>