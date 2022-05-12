// var dat_delete_bt = document.getElementById('dat_delete_bt')
// dat_delete_bt.addEventListener('click', function(){
//     alert('Hello world');
// })

var dat_delete_bt = document.getElementById('dat_delete_bt')
dat_delete_bt.addEventListener('click', function(){
    // dat_delete_bt = $(this).closest(".dap_lo").find(".dat_delete");
    dat_delete_bt.dialog({
        modal:true,
        width:400,
        title:"댓글 삭제확인"});
})


        // var dat_delete_bt = $(this).closest(".dap_lo").find(".dat_edit");
        // dat_delete_bt.dialog({
        //     modal:true,
        //     width:650,
        //     height:200,
        //     title:"댓글 수정"});
    // });