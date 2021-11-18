<div class="chesVrapper">
                        
    <? if (!empty($_REQUEST["kvartira"])) { 
        global $wpdb;
        $kinfo = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `id` = '".$_REQUEST["kvartira"]."'");
        $kinfo = $kinfo[0];
    ?>
        
        <div class="kvartira_edit_info 
        <?
            if ( $kinfo->status == "Продана") echo "prodana";
            if ( $kinfo->status == "Свободна") echo "svobodna";
            if ( $kinfo->status == "Резерв") echo "rezerv";
        ?>
        ">
            
                <strong>Дом: </strong><? echo $kinfo->home;?></br>
                <strong>Этаж: </strong><? echo $kinfo->etazg;?></br>
                <strong>Квартира №: </strong><? echo $kinfo->number;?></br>
                <strong>Комнат: </strong><? echo $kinfo->rooms;?></br>
                <strong>Площадь: </strong><? echo $kinfo->area;?></br>
            
        </div>
        <form class = "edit_kv_form" method="get">
            
        <? if ($kinfo->status == "Свободна") { ?>
                <label for = "">Цена в резерве (₽)</label>
                <input id = "rform_rezerv_price" class = "input" type = "text" name = "rezerv_price" placeholder = "Введите цену резерва" value = "<?echo round($kinfo->base_price * $kinfo->area, 2); ?>" />
            
                <label for = "">Ф.И.О. клиента</label>
                <input id = "rform_klient_name" class = "input" type = "text" name = "klient_name" placeholder = "Введите имя клиента" value = "" />
            
                <label for = "">Телефон клиента</label>
                <input id = "rform_klient_tel" class = "input _phone _tel" data-value="Телефон клиента*" type = "text" name = "klient_tel" placeholder = "Введите телефон клиента" value = "" />
            
                <label for = "">Менеджер</label>
                <input id = "rform_manager_name" disabled  class = "input" type = "text" name = "manager_name" placeholder = "Введите имя менеджера" value = "<?echo $_COOKIE["name"]?>" />
                
                
            <?
                }
            ?>

                <input id = "rform_manager_phone" type = "hidden" name = "manager_phone"  value = "<?echo $_COOKIE["phone"]?>" />
                <input id = "rform_manager_login" type = "hidden" name = "manager_login"  value = "<?echo $_COOKIE["login"]?>" />
                <input id = "rform_id" type = "hidden" name = "manager_login"  value = "<?echo $kinfo->id?>" />

        <?
            if ( $kinfo->status == "Продана") {
        ?>
            <h3>Данная квартира продана и не может быть отправлена в резерв</h3>
        <?
            }
            if ( $kinfo->status == "Свободна") {
        ?>
            <button type = "submit" id = "to_rezerv_btn" class = "btn">Зарезервировать</button>
        <?
            }
            if (($kinfo->status == "Резерв") && ($_COOKIE["name"] === $kinfo->manager_name)) {
        ?>
            <h3>Данная квартира в резерве Вы можете снять этот резерв и назначить статус:</h3>
            <button type = "submit" id = "prodana_btn" class = "btn btn_prodana">Продана</button>
            <button type = "submit" id = "svobodna_btn" class = "btn btn_svobodna">Свободна</button>
        <?      
            }

            if (($kinfo->status == "Резерв") && ($_COOKIE["name"] !== $kinfo->manager_name)) {
        ?>
            <h3>Данная квартира в резерве. Оформил(ла): <? echo $kinfo->manager_name; ?> </h3>
            
        <?  
            }
        ?>
            
        </form>
    <? } else {?>       
        <strong>Выберите квартиру</strong>
    <?}?>    
</div>