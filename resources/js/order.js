// 受注データ取込処理
$(function(){
    $("[id^=bto]").on("change",function(){
        const form = document.getElementById('order_data_import');
        const select_btn_id = $(this).attr('id');
        const select_file = document.getElementById(select_btn_id);
        const select_file_split = select_file.value.split('\\');
        const import_type = document.getElementById('import_type');
        const shipment_category = document.getElementById('shipment_category');
        // 処理を実行するか確認
        var result = window.confirm('以下の受注データを取り込みますか？\r\n\r\n' + select_file_split[select_file_split.length -1]);
        // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
        if(result == true) {
            import_type.value = select_btn_id;
            shipment_category.value = select_btn_id.indexOf('toriyose') != -1 ? 'B to B(取り寄せ)' : select_btn_id.indexOf('zaiko') != -1 ? 'B to B(在庫)' : 'B to C';
            form.submit();
        }else {
            //alert('受注データ取込がキャンセルされました。');
            // 同じファイルを続けて選択するとイベントが発生しないので空にしている
            select_file.value = '';
            return false;
        }
    });
});