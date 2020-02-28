<!-- DEBUG PURPOSE ONLY -->
<!-- <link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->

<table class="table">
	<tbody>
		<tr>
			<td>Judul</td>
			<td><?=$arrs->row()->judul;?></td>
		</tr>
		<tr>
			<td>Video</td>
			<td>
				<iframe id="player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/<?=$arrs->row()->video;?>?enablejsapi=1&amp;" frameborder="3" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
			</td>
		</tr>
	</tbody>
</table>

<!-- DEBUG PURPOSE ONLY -->
<!-- <script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->