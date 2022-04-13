// 商品マスタ取込処理
$(function(){
    $("[id=item_master_import]").on("change",function(){
        const form = document.getElementById('item_master_import_form');
        const select_file = document.getElementById('item_master_import');
        const select_file_split = select_file.value.split('\\');
        // 処理を実行するか確認
        var result = window.confirm('商品マスタを取り込みますか？\r\n\r\n' + select_file_split[select_file_split.length -1]);
        // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
        if(result == true) {
            form.submit();
        }else {
            // 同じファイルを続けて選択するとイベントが発生しないので空にしている
            select_file.value = '';
            return false;
        }
    });
});