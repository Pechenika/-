
let offset = 0;
const sliderLine = document.querySelector('.slider-line');
let a = document.querySelector('.slider-next');
//var wid = document.querySelector('.slider').clientWidth;
//console.log(wid);
if (a) {
    a.addEventListener('click', function () {
        offset = offset + 208
        if (offset > 1100) {
            offset = 0;
        }
        sliderLine.style.left = -offset + 'px';
    });

    document.querySelector('.slider-prev').addEventListener('click', function () {
        offset = offset - 208;
        if (offset < 0) {
            offset = 208;
        }
        sliderLine.style.left = -offset + 'px';
    });
    
}

//222 444

