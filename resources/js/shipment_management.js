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
    $("[id=a]").on("click",function(){
        // チェックボックスの選択数を取得
        const el = document.getElementsByClassName("checks");
        let count = 0;
        for (let i = 0; i < el.length; i++) {
            if (el[i].checked) {
                count++;
            }
        }
        // 選択数が0だったら、処理を中d何
        if(count == 0){
            alert('変更対象が選択されていません。');
            return false;
        }
        // 処理を実行するか確認
        var result = window.confirm('ステータス変更を実行しますか？\r\n\r\n');
        // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
        if(result == true) {
            form.submit();
        }else{
            return false;
        }
    });
});