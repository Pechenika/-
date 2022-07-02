<h6 class="" style="font-weight: 600; margin-top: 15px; text-align: left;">Популярные товары</h6>
	<div class="row" style="padding: 20px;">
		<div class="container" style="display: flex; max-width: 100%;">
			<button class="slider-prev" style="margin-left: -20px;">
				<svg
					width="24"
					height="24"
					viewBox="0 0 24 24"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z"
						fill="currentColor"
					/>
				</svg>
			</button>
	<div class="col-lg-12 slider" style="">
		<div class="col-lg-10 slider-line" style="">
		<?php
			for($i = 0; $i<10; $i++){
			foreach($product as $prod){
				echo ('
		<div class="card_product" style=" margin-left: 35px;text-align:center; display: grid; border: 1px solid #e1e1e1; padding: 15px;  border-radius: 4px;">
				<div class="" style="text-align:center; width: 140px;
					height: 229px; justify-self: center; align-self: center;  display: grid;">
					<a href="/home/catalog/product/discription/'.$prod->id.'"> 
						<img src="'.$prod->image.'" style="Width: 100%; Height: 138px; border-radius: 4px;">
					</a>
					
					<div class="text_catalog" style="text-align: left;">
						<h6 style="">'.$prod->name.'</h6>
						<p style="">'.$prod->price.'  ₽</p>
					</div>
					
				</div>
				<div class="buttons" style="width: 100%;" >
						<a style="" href="/baskcet/'.$prod->id.'" data-id="'.$prod->id.'" 
						data-count="1" class="add" id="add">В корзину</a>
				</div>');
				?>
			<?php echo ('</div>');}}?>
		</div>
	</div>
	<button class="slider-next" style="margin-right: -50px;">
		<svg
			width="24"
			height="24"
			viewBox="0 0 24 24"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M10.5858 6.34317L12 4.92896L19.0711 12L12 19.0711L10.5858 17.6569L16.2427 12L10.5858 6.34317Z"
				fill="currentColor"
			/>
		</svg>
	</button></div></div><br><br>