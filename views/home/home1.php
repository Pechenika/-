<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://css.gg/chevron-right.css' rel='stylesheet'>
<link href='https://css.gg/chevron-left.css' rel='stylesheet'>
<style>

.sliderT {
    /*border: 2px solid black;
    /* width: 100%; */
    max-width: 90%;
    /* height: 300px; */
    margin: 20px auto;
    overflow: hidden;
}

.slline {
    width: 1024px;
    display: flex;
    /*background: orange;*/
    position: relative;
    left: 0;
    transition: all ease 1s;
}
@import url('https://css.gg/chevron-right.css');

.next:hover {
color: #fff;
background-color: #8FB764;
border-radius: 1px;
}
.prev:hover {
color: #fff;
background-color: #8FB764;
border-radius: 1px;
}
.next {
	border: none;
	background-color:#fff;	
	height: 30px;
	margin-top: 15%;
}
.prev {
	border: none;
	background-color:#fff;
	height: 30px;
	margin-top: 15%;
}

.navigation {
position:absolute;
width:100%;

left:0;
z-index:1;
cursor:pointer;
}
.navigation .dot{
display:inline-block;
width:12px;
height:12px;
background:#e1e1e1;
cursor:pointer;
border-radius:16px;
margin:0 20px;
border:1px solid #e1e1e1;
}
.navigation .active{
background:#8FB764;
}
</style>
		<div class="row"  style="">
			<div class="container" style="display: flex;">
				<button class="slide prev">
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
					<div class="sliderT" style="">
						<div class="slline" style="">
							<img src="../web/image/background.jpg" alt="">
							<img src="../web/image/background.jpg" alt="">
							<img src="../web/image/background.jpg" alt="">
							<img src="../web/image/background.jpg" alt="">
							<img src="../web/image/background.jpg" alt="">
						</div>
						<br>
						<div class="navigation"></div>
					</div>
				<button class="slide next">
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
				</button>
				
			</div>
		
		</div>
		

<?=  app\components\SliderWidget::widget() ?>
<iframe style="border-radius: 4px;
    margin-left: -18%;
    border: none;" src="https://www.google.com/maps/d/u/0/embed?mid=15YeNwhqfZ21ejD1gTZdVtJ1-rYV2aVev&ehbc=2E312F"></iframe>


<script>
const images = document.querySelectorAll('.sliderT .slline img');
const sliderLine1 = document.querySelector('.sliderT .slline');
let count = 0;
let width;

function init() {
    width = document.querySelector('.sliderT').offsetWidth;
    sliderLine1.style.width = width * images.length + 'px';
    images.forEach(item => {
        item.style.width = width + 'px';
        item.style.height = 'auto';
    });
    rollSlider();
}

init();
window.addEventListener('resize', init);

document.querySelector('.next').addEventListener('click', function () {
    count++;
    if (count >= images.length) {
        count = 0;
    }
    rollSlider();
});

document.querySelector('.prev').addEventListener('click', function () {
    count--;
    if (count < 0) {
        count = images.length - 1;
    }
    rollSlider();
});

function rollSlider() {
    sliderLine1.style.transform = 'translate(-' + count * width + 'px)';
}








$(document).ready(function() { // Ждём загрузки страницы
	width = document.querySelector('.sliderT').offsetWidth;		
	
	//var slides = $(".slider .slides").children(".slide"); // Получаем массив всех слайдов
	var countss = 5;
	var maxWidth = width * countss;
	//var width = $(".slider .slides").width(); // Получаем ширину видимой области
	//var i = slides.length; // Получаем количество слайдов
	var offset = countss * width; // Задаем начальное смещение и ширину всех слайдов
	
	var cheki = countss-1;
	
	
	//$(".slider .slides").css('width',offset); // Задаем блоку со слайдами ширину всех слайдов
	
	for (j=0; j < countss; j++) {
		if (j==0) {
			$(".navigation").append("<div class='dot active'></div>");
		}
		else {
			$(".navigation").append("<div class='dot'></div>");
		}
	}
	
	var dots = $(".navigation").children(".dot");
	offset = 0; // Обнуляем смещение, так как показывается начала 1 слайд
	countss = 0; // Обнуляем номер текущего слайда
	
	$('.navigation .dot').click(function(){
		$(".navigation .active").removeClass("active");								  
		$(this).addClass("active");
		//i = $(this).index();
		//offset = count * width;
		//$(".sliderT .slline").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); // Смещаем блок со слайдами к следующему
	});
	
	$(".next").click(function(){	// Событие клика на кнопку "следующий слайд
		if (offset < width * cheki) {	// Проверяем, дошли ли мы до конца
			offset += width; // Увеличиваем смещение до следующего слайда
			$(".sliderT .slline").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); // Смещаем блок со слайдами к следующему
			$(".sliderT .navigation .active").removeClass("active");	
			$(dots[++countss]).addClass("active");
		}
		else {
			countss = 0;
			offset = 0; // Увеличиваем смещение до следующего слайда
			$(".sliderT .slline").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); // Смещаем блок со слайдами к следующему
			$(".sliderT .navigation .active").removeClass("active");	
			$(dots[0]).addClass("active");
		}
	});


	$(".prev").click(function(){	// Событие клика на кнопку "предыдущий слайд"
		if (offset > 0) { // Проверяем, дошли ли мы до конца
			offset -= width; // Уменьшаем смещение до предыдущегоо слайда
			$(".sliderT .slline").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); // Смещаем блок со слайдами к предыдущему
			$(".sliderT .navigation .active").removeClass("active");	
			$(dots[--countss]).addClass("active");
			}
			else {
				countss = 5;
				offset = maxWidth;
				$(".sliderT .slline").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); // Смещаем блок со слайдами к предыдущему
				$(".sliderT .navigation .active").removeClass("active");	
				$(dots[--countss]).addClass("active");
			}
		
	});

});
</script>