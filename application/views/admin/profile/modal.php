<!-- DEBUG PURPOSE ONLY -->
<!-- <link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->

<table class="table">
	<tbody>
		<tr>
			<td>Judul</td>
			<td><?=$arrs->row()->judul;?></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td><img src="<?=base_url();?>assets/img/berita/<?=$arrs->row()->gambar;?>" width="200px"></td>
		</tr>
		<tr>
			<td>Isi</td>
			<td style="vertical-align: top !important;"><?=$arrs->row()->isi;?></td>
		</tr>
	</tbody>
</table>

<!-- DEBUG PURPOSE ONLY -->
<!-- <script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->