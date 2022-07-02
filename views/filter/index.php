<?php


use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
section {
    font-family: 'Roboto', sans-serif;
}

a {
    text-decoration: none;
    color: #333;
}


@media (max-width: 800px) {

}
.sect::-webkit-scrollbar {
  display: none; 
  }
/* Hide scrollbar for IE, Edge and Firefox */
.sect {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
.subcategory-item:hover {
	background-color: #8FB764; 
}
.categories-item:hover {
	background-color: #5F8A32;
}
.categories-item:hover {
	color: white; 
}
.categories-item {
	padding: 10px;
	border-top: 1px solid #e1e1e1;	
}
.subcategory-item:hover a {
	color: white; 
	text-decoration: none; 
}
.subcategory-item a {
	color: #333; 
	text-decoration: none; 
}
.subcategory-item {
	border-top: 1px solid #e1e1e1;
	padding-top: 10px;
	padding-bottom: 10px;
}
.subcategory {
	margin-left: -40px;
}
</style>
<section class="sect" style = "overflow:auto;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m">
                <?php if(!empty($category)): ?>
	<ul id="categories" class="categories" style="text-align: left;" >
		<?php foreach($category as $cat): ?>
		<li class="categories-item" onclick="Fallout(cat_<?= $cat['id']?>)" style="padding-right: 30px;" id="cat_<?= $cat['id']?>">
			<?= $cat['name']?> 
			<svg xmlns="http://www.w3.org/2000/svg" style="float: right;" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
			  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
			</svg>
		</li>
		 <!-- ид с товарами подкатегорий -->
		<?php if(!empty($subcategory)): ?>
			<ul id="subcategory" class="subcategory" style="display: none;" >
			<?php foreach($subcategory as $subcat): ?>
				<?php if(!empty($subcat['id_parent']==$cat['id'])): ?>
					<li style="padding-left: 20px;"  class="subcategory-item" id="subcategory-item">
						<a style=""href="/home/catalog/product/<?= $subcat['id']?>">
						<?= $subcat['name']?></a> 
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
			</ul>
			
		<?php endif; //?> 
		<?php endforeach; ?>
	</ul>
	<?php
endif;
?>
            </div>
        </div>
    </div>
</section>

<!--svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>


<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
</svg-->
<script  type="text/javascript">
function Fallout(el){
	//const sub = el.getEle('.subcategory');
	if(el.querySelector(".subcategory").style.display == 'none') {
		el.querySelector(".subcategory").style.display = 'block';
	}
	else if(el.querySelector(".subcategory").style.display == 'block') {
		el.querySelector(".subcategory").style.display = 'none'; 
	}
}

    $(".categories-item").click(function(){				//плавное раскрытие/скрытие списка подкатегорий по клику
    if($(this).next().css('display') == 'block'){
		$($(this).next()).slideUp();
		$(this).children().css({
		"transition" : "transform 300ms",
		"transform": "rotate(0deg)"
		});
    }else{
		$(this).children().css({
		"transition" : "transform 300ms",
		"transform": "rotate(180deg)"
		});
		$($(this).next()).slideDown();
    }
    });
	
</script>