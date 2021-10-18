<div class="info__block-tabs block__tabs tabs">
	<nav class="block__nav">
		<div class="block__navitem building-icon-01 tab__navitem active">Вторичная</div>
		<div class="block__navitem building-icon-02 tab__navitem">Новостройки</div>
		<div class="block__navitem building-icon-03 tab__navitem">Дома, участки, дачи</div>
		<div class="block__navitem building-icon-04 tab__navitem">Коммерческая</div>
	</nav>
	<div class="block__items">
		<div class="block__item tab__item active">
			<?php get_template_part('template-parts/vtorichnaya-form-block');?>
		</div>
		<div class="block__item tab__item">
			<?php get_template_part('template-parts/novostroyki-form-block');?> 
		</div>
		<div class="block__item tab__item">
			<?php get_template_part('template-parts/home-form-block');?> 
		</div>
		<div class="block__item tab__item">
			<?php get_template_part('template-parts/commercial-form-block');?> 
		</div>
	</div>
</div>