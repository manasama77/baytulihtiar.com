<div class="container-fluid" style="margin-top:10px;">
	<div class="parallax-container white-text text-shadow" style="height:210px;">
		<div class="parallax"><img src="<?=base_url();?>assets/img/parallax/22032012198.jpg" width="1000px"></div>
		<div class="section">
			<div class="row">
				<div class="col s4">
					<div class="center scale scale-transition scale-out">
						<div><i class="medium material-icons">people</i></div>
						<h5><?=number_format($anggota, 0);?></h5>
						<h5>Jumlah Anggota</h5>
					</div>
				</div>
				<div class="col s4">
					<div class="center scale scale-transition scale-out">
						<div><i class="medium material-icons">account_balance</i></div>
						<h5><?=number_format($outstanding, 0);?></h5>
						<h5>Outstanding Pembiayaan</h5>
					</div>
				</div>
				<div class="col s4">
					<div class="center scale scale-transition scale-out">
						<div><i class="medium material-icons waves-effect waves-orange">access_time</i></div>
						<h5><?=number_format($angsuran, 2);?></h5>
						<h5>Angsuran Tepat Waktu</h5>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>