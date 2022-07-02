let arv = document.getElementById("order-id_delivery");
if(arv){
arv.addEventListener("change", (e) => {
    if (e.target.value === '2') {
        document.getElementById("order-id_shop").style.display = 'block';
	//document.getElementById("map").style.display = 'none';
        document.getElementById("order-adress").style.display = 'none';
    }
    if (e.target.value === '1') {
        document.getElementById("order-id_shop").style.display = 'none';
	//document.getElementById("map").style.display = 'block';
	//document.querySelector(".ymaps-2-1-79-searchbox-input__input").classList.add("order-adress");
//document.querySelector(".order-adress").classList.remove("ymaps-2-1-79-searchbox-input__input");
//console.log(document.querySelector(".order-adress"));
        document.getElementById("order-adress").style.display = 'block';
    }
});
}
