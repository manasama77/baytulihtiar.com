<div class="container-fluid grey lighten-5">
	<a id="tanyabaik" class="section scrollspy"></a>
	<div class="divider"></div>
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="center">
					<img src="<?=base_url();?>assets/img/tanya baik 2.png" class="responsive-img" style="max-width: 170px !important;">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s11 m5">
				<div class="row">
					<form id="tanya-form">
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix fa-fw">account_circle</i>
								<input id="nama" name="nama" type="text" class="validate" required="" aria-required="true">
								<label for="nama">Nama</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix fa-fw">email</i>
								<input id="email" name="email" type="email" class="validate" required>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="fas fa-question prefix"></i>
								<textarea id="pesan" name="pesan" class="materialize-textarea" style="height: 100px;" required></textarea>
								<label for="pesan">Pertanyaan</label>
								<div class="row">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light right green darken-3" type="submit" name="action">
											Kirim
											<i class="material-icons right">send</i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div clas="col s11 m5">
				<div class="center-align">
					<img src="<?=base_url();?>assets/img/cp.png" class="responsive-img circle tanyaimg" width="400px">
				</div>
			</div>


		</div>
	</div>
	<div class="divider"></div>
</div>