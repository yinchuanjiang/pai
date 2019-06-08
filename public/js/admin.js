/**
 * Created by yinchuanjiang on 2019/5/22.
 */
$(function () {
    //后台删除ajax
    $('.admin-ajax-delete').on('click', function (e) {
        let url = $(this).attr('ajax-url');
        swal({
            title: '确定操作吗？',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '确定',
            cancelButtonText: '取消'
        }).then(dismiss => {
            if(dismiss.dismiss !== 'cancel') {
                axios.get(url).then(res => {
                    if (res.status == 200) {
                        swal({
                            text: res.data.msg,
                            type: res.data.type,
                            timer: 3000,
                        }).then(
                            function () {
                                window.location.reload();
                            });
                    }
                }).catch(error => {
                    swal({
                        text: '网络异常',
                        type: 'error'
                    });
                })
            }
        })
    });
})