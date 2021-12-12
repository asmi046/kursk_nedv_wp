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
            if ( $kinfo->status == "Резерв руководителя") echo "ruk";
            if ( $kinfo->status == "Резерв учередителя") echo "uhred";
        ?>
        ">
            <div class="kei_blk">
                <strong>Дом: </strong><? echo $kinfo->home;?></br>
                <strong>Этаж: </strong><? echo $kinfo->etazg;?></br>
                <strong>Квартира №: </strong><? echo $kinfo->number;?></br>
                <strong>Комнат: </strong><? echo $kinfo->rooms;?></br>
                <strong>Площадь: </strong><? echo $kinfo->area;?></br>
                <strong>Цена за м²: </strong><? echo $kinfo->base_price;?></br>
            </div>

            <div class="kei_blk">
                <h4>Клиент:</h4>
                <? if (!empty($kinfo->klient_phone)) {?>
                    <strong>Дата резерва: </strong><? echo date("d-m-Y", strtotime($kinfo->rezerv_data));?></br>
                    <strong>Имя клиента: </strong><? echo $kinfo->klient_name;?></br>
                    <strong>Телефон клиента: </strong><? echo $kinfo->klient_phone;?></br>
                    <strong>Цена резерва: </strong><? echo $kinfo->rezerv_price;?></br>
                    <strong>Эскроу: </strong><? echo $kinfo->scrou;?></br>
                <?}?>
            </div>
            
            <div class="kei_blk">
                <h4>Информация:</h4>
                <p>
                <? echo $kinfo->info;?>
                </p>
            </div>
            
        </div>
        <form class = "edit_kv_form" method="get">
            
        <? if ($kinfo->status == "Свободна") { ?>
                <?
                    $priceInput = round($kinfo->base_price * $kinfo->area, 2);

                    if (!empty($kinfo->rezerv_price))
                        $priceInput = $kinfo->rezerv_price
                ?>
                <label for = "">Цена в резерве (₽)</label>
                <input <? echo (empty($_COOKIE["adm"]))?"disabled":""?> id = "rform_rezerv_price" class = "input" type = "text" name = "rezerv_price" placeholder = "Введите цену резерва" value = "<?echo $priceInput; ?>" />
            
                <label for = "">Ф.И.О. клиента</label>
                <input id = "rform_klient_name" class = "input" type = "text" name = "klient_name" placeholder = "Введите имя клиента" value = "" />
            
                <label for = "">Телефон клиента</label>
                <input id = "rform_klient_tel" class = "input _phone _tel" data-value="Телефон клиента*" type = "text" name = "klient_tel" placeholder = "Введите телефон клиента" value = "" />
            
                <label for = "">Менеджер</label>
                <input id = "rform_manager_name" disabled  class = "input" type = "text" name = "manager_name" placeholder = "Введите имя менеджера" value = "<?echo $_COOKIE["name"]?>" />
                
                <label for = "">Информация</label>
                <input id = "rform_info" class = "input" type = "text" name = "klient_info" placeholder = "Введите дополнительную информацию" value = "" />
                
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
                if ( !empty($_COOKIE["adm"])) {
            ?>
                <button type = "submit" id = "svobodna_btn" class = "btn btn_svobodna">Снять пометку о продаже</button>
            <?
                }
            ?>      
        <?
            }
            if ( $kinfo->status == "Свободна") {
        ?>
            <button type = "submit" id = "to_rezerv_btn" class = "btn">Зарезервировать</button>
        
            <?
                if ( !empty($_COOKIE["adm"])) {
            ?>
                <button type = "submit" id = "uhred_btn" class = "btn btn_uhred">Резерв учредителя</button>
                <button type = "submit" id = "ruk_btn" class = "btn btn_ruk">Резерв руководителя</button>
            <?
                }
            ?> 
        <?
            }
            if (($kinfo->status == "Резерв") && ($_COOKIE["name"] === $kinfo->manager_name)) {
        ?>
            <h3>Данная квартира в резерве Вы можете снять этот резерв и назначить статус:</h3>
            
            <label for = "">Ф.И.О. клиента</label>
                <input id = "rform_klient_name" class = "input" type = "text" name = "klient_name" placeholder = "Введите имя клиента" value = "<? echo $kinfo->klient_name;?>" />
            
                <label for = "">Телефон клиента</label>
                <input id = "rform_klient_tel" class = "input _phone _tel" data-value="Телефон клиента*" type = "text" name = "klient_tel" placeholder = "Введите телефон клиента" value = "<? echo $kinfo->klient_phone;?>" />
            
                <button type = "submit" id = "save_chenge" class = "btn">Сохранить</button>
                <br/>
                <br/>

            <label for = "">№ ДДУ</label>
            <input id = "rform_escro" class = "input" type = "text" name = "klient_escro" placeholder = "Введите № ДДУ" value = "" />

            <button type = "submit" id = "prodana_btn" class = "btn btn_prodana">Продана</button>
            <button type = "submit" id = "svobodna_btn" class = "btn btn_svobodna">Свободна</button>
        <?      
            }

            if (($kinfo->status == "Резерв") && ($_COOKIE["name"] !== $kinfo->manager_name)) {
        ?>
            <h3>Данная квартира в резерве. Оформил(ла): <? echo $kinfo->manager_name; ?> </h3>
            <?
                if ( !empty($_COOKIE["adm"])) {
            ?>

                <label for = "">Ф.И.О. клиента</label>
                <input id = "rform_klient_name" class = "input" type = "text" name = "klient_name" placeholder = "Введите имя клиента" value = "<? echo $kinfo->klient_name;?>" />
            
                <label for = "">Телефон клиента</label>
                <input id = "rform_klient_tel" class = "input _phone _tel" data-value="Телефон клиента*" type = "text" name = "klient_tel" placeholder = "Введите телефон клиента" value = "<? echo $kinfo->klient_phone;?>" />
            
                <button type = "submit" id = "save_chenge" class = "btn">Сохранить</button>

                <button type = "submit" id = "svobodna_btn" class = "btn btn_svobodna">Снять пометку о продаже</button>
            <?
                }
            ?> 
        <?  
            }

            if (($kinfo->status == "Резерв руководителя")||($kinfo->status == "Резерв учередителя")) {
        ?>
            <h3>Данная квартира в резерве</h3>
            <?
                if ( !empty($_COOKIE["adm"])) {
            ?>
                <button type = "submit" id = "svobodna_btn" class = "btn btn_svobodna">Снять пометку о резерве</button>
            <?
                }
            ?>  
        <?
            }
        ?>
 
            
        </form>
    <? } else {?>       
        <strong>Выберите квартиру</strong>
    <?}?>    
</div>