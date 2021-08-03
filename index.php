<?php get_header(); ?>

<section>
	<div class = "container">
		<div class="lgozon">
			<img src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="" class="logomain">
			<form action="" class="search">
				<input class = "searchstr" type = "text" name = "serchstr" placeholder = "Введите улицу или район">
				<button class = "btn">Поиск</button>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>