// テーブルのチェックボックスON/OFFが変更されたら
$(function(){
    $("[id^=chk_]").on("change",function(){
        const select_chk_id = $(this).attr('id');
        const select_chk = document.getElementById(select_chk_id);
        const target_tr = document.getElementById(select_chk_id.replace('chk', 'tr'));
        // 
        if(select_chk.checked != true){
            target_tr.classList.remove('bg-blue-200');
        }else{
            target_tr.classList.add('bg-blue-200');
        }
    });
});