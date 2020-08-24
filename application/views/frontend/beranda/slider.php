<div class="container-fluid">
	<div class="carousel carousel-slider" id="carousel1">
    <?php
    // print_r($slideshows->result());
    // exit;
    foreach ($slideshows->result() as $slide) {
      echo '<a class="carousel-item" href="javascript:;"><img src="'.base_url().'assets/img/slideshow/'.$slide->banner_path.'" class="responsive-img"></a>';
    }
    ?>
		<!-- <a class="carousel-item" href="javascript:;"><img src="<?=base_url();?>assets/img/slider/banner1.jpg" class="responsive-img"></a>
		<a class="carousel-item" href="javascript:;"><img src="<?=base_url();?>assets/img/slider/banner2.jpg" class="responsive-img"></a>
		<a class="carousel-item" href="javascript:;"><img src="<?=base_url();?>assets/img/slider/banner3.jpg" class="responsive-img"></a>
		<a class="carousel-item" href="javascript:;"><img src="<?=base_url();?>assets/img/slider/banner4.jpg" class="responsive-img"></a> -->
	</div>
</div>