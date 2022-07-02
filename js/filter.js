function showFilter(filter_modal) {        //����������� ���������� ����
    $('#filter_modal .modal-body').html(filter_modal);
    $('#filter_modal').modal();
}


$('.icon ').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/filter/show',
        type: 'get',
        success: function (res) {
            if (!res) res = '������� �����';
            showFilter(res);
        },
        error: function (res) {
            res = '������';
            showFilter(res);
        }
    });
});