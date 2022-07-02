<?php use yii\helpers\Url;?>
<style>
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
<!--h4 class="title_cat" style="margin-top: 9%;">Каталог</h4-->



	<div class="categories-menu mrg-xs">
		<div class="category-heading">
			<h3 style="margin-top: 0px;">Категории</h3>
        </div>
        <?php if(!empty($category)): ?>
        <div class="category-menu-list">
			<ul>
				<?php foreach($category as $cat): ?>
					<li ><a href="/home/catalog/<?= $cat['id']?>"><img alt="" src=""><?= $cat['name']?><i class="zmdi zmdi-chevron-right"></i></a>
                                        <div class="category-menu-dropdown">
											<div class="category-menu-dropdown-left">
												<div class="category-part-1 category-common mb--30">
													<h4 class="categories-subtitle"><?= $cat['name']?></h4>
													<ul>
													<?php foreach($subcategory as $subcat): ?>
													<?php if(!empty($subcat['id_parent']==$cat['id'])): ?>
														<li><a href="/home/catalog/product/<?= $subcat['id']?>"><?= $subcat['name']?></a></li>
													<?php endif; ?>
													<?php endforeach; ?>
													</ul>
												</div>
											</div>
											<div class="category-menu-dropdown-right">
												
                                                    <img style="width: 250px; height: 250px;" src="<?= $cat['url']?>" alt="">
                                                
											</div>
                                        </div>
                    </li>
                    <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>


<script  type="text/javascript">
/*function Fallout(el){
	const sub = el.querySelector('.subcategory');
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
	*/
</script>
