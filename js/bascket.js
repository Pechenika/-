
/*function showCart2(table) {
    $('#table .table').html(table);
   
}*/
function showCart(bascket) {        //отображение модального окна
    $('#bascket .modal-body').html(bascket);
    $('#bascket').modal();
}
$('.show').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/baskcet/show',
        type: 'get',
        success: function (res) {
            if (!res) res = 'Корзина пуста';
            //document.getElementById("bascket").innerHTML = res;
            showCart(res);
        },
        error: function (res) {
            res = 'Ошибка';
            showCart(res);
        }
    });
});

$('.add').on('click', function (e){
    e.preventDefault();
    var id = $(this).data('id');
    var count = $(this).data('count');
    //document.getElementById("countBascket").style.display = 'block';
    
    $.ajax({
        url: '/baskcet/add',
        data: { id: id, count: count },
        type: 'get',
        success: function (res) {
            if (!res) res = 'Корзина пуста';
            if (document.getElementById("countBascket").style.display == 'flex') var basck = Number(document.getElementById("countBascket").textContent); //span по ид, получаем его значение
            else { document.getElementById("countBascket").style.display = 'flex'; basck = 0;}
            var val = 1 + basck;
            document.getElementById("countBascket").textContent = val;
            console.log('lol');
            //showCart(res);
           /* if (res == false) {
               
                document.getElementById('message_model').textContent = 'Вы добавили максимальное количество товара';
            }*/
        },
        error:function (res) {
            res = 'Ошибка';
        }
    });
});


$('#bascket ').on('click', '.plus', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var count = $(this).data('count');
    var basck = Number(document.getElementById("countBascket").textContent); //span по ид, получаем его значение
    var val = 1 + basck;
    $.ajax({
        url: '/baskcet/plus',
        data: { id: id, count: count },
        type: 'get',
        success: function (res) {
            if (!res) {
                /*let value_message = 'Вы добавили максимальное количество товара';
                document.getElementById('message_model').textContent = value_message;*/
            }
            document.getElementById("countBascket").textContent = val;
            //document.getElementById("quantity").textContent = val;
            //document.getElementById("countBascket").textContent = val;
            showCart(res);
        },
        error: function (res) {
            res = 'Ошибка';;
        }
    });
});

$('#bascket ').on('click', '.remove', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var count = $(this).data('count');
    var basck = Number(document.getElementById("countBascket").textContent); //span по ид, получаем его значение
    var val = basck - 1;
    $.ajax({
        url: '/baskcet/remove',
        data: { id: id, count: count },
        type: 'get',
        success: function (res) {
            if (!res) res = 'Корзина пуста';
            document.getElementById("countBascket").textContent = val;
            showCart(res);
        },
        error: function (res) {
            res = 'Ошибка';
            showCart(res);
        }
    });
});

    $('#bascket ').on('click', '.del', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
        var count = $(this).data('count');
    var basck = Number(document.getElementById("countBascket").textContent);
    var val = basck - count;
    $.ajax({
        url: '/baskcet/delete',
        data: { id: id, count: count },
        type: 'get',
        success: function (res) {
            if (!res) res = 'Корзина пуста';
            document.getElementById("countBascket").textContent = val;
            showCart(res);
        },
        error: function (res) {
            res = 'Ошибка';
            showCart(res);
        }
    });
});

$('.clear').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/baskcet/clear',

        type: 'get',
        success: function (res) {
            if (!res) res = 'Корзина пуста';
            showCart(res);
        },
        error: function (res) {
            res = 'Ошибка';
            showCart(res);
        }
    });
});