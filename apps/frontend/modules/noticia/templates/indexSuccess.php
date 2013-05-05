<?php use_helper('Date') ?>
<?php use_helper('Text') ?>
<div id="main">
	<?php include_component('noticia', 'ultimasnoticias') ?>
</div>
<?php slot('lateral') ?>
	<?php include_partial('global/lateral') ?>
	<div class="popular">
		<h3>Ultimos comentarios</h3>
		<?php include_component('noticia', 'ultimoscomentarios') ?>
	</div>
<?php end_slot() ?>
