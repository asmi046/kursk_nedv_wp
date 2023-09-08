<div class="chesVrapper">
    <div class="histo">
    <form method = "GET">
<?// echo "SELECT `home`, `city` FROM `kn_ches_home` WHERE 'city' = '" . $_COOKIE["city"] . "'  GROUP BY `home`"; ?>

        <select name = "homes" class="form" onchange = "this.form.submit()">
            <option value = "Выбрать" disabled <? echo empty($_REQUEST["homes"])?"selected = 'selected'":"" ?>>Выбрать</option>
            
            <?
                global $wpdb;
                if ($_COOKIE["login"] === "asmi046")
                    $home = $wpdb->get_results("SELECT `home` FROM `kn_ches_home` GROUP BY `home`");
                else 
                    $home = $wpdb->get_results("SELECT `home`, `city` FROM `kn_ches_home` WHERE `city` = '" . $_COOKIE["city"] . "'  GROUP BY `home`");
                foreach ($home as $h) {
                    if (($_COOKIE["login"] === "saninov") && (strpos($h->home, "Клыкова") === false) ) continue;
                    if (($_COOKIE["login"] !== "volovina") && ($_COOKIE["login"] !== "asmi046") && ($_COOKIE["login"] !== "skulkova") && (strpos($h->home, "Метрополь") !== false) ) continue;
            ?>
                <option value="<?echo $h->home; ?>" <? echo ($_REQUEST["homes"] == $h->home)?"selected = 'selected'":"" ?> ><?echo $h->home; ?></option>
            <?
                }
            ?>
        </select>
    </form>
    
    <div class="historyElems">
        <div class="historyElem prodana">
             Продана
        </div>
        <div class="historyElem rezerv">
             Резерв
        </div>
        <div class="historyElem svobodna">
             Свободна
        </div>
        <div class="historyElem ruk">
             Руководитель
        </div>
        <div class="historyElem uhred">
             Учредитель
        </div>
    </div>
    </div>
    <div class="etazi">
        <? if (!empty($_REQUEST["homes"])) { 
            
            
            $homeInfo = $wpdb->get_results("SELECT * FROM `kn_ches_home_info` where `home` = '".$_REQUEST["homes"]."'");        
            // echo "SELECT * FROM `kn_ches_home_info` where `etazg` = '".$_REQUEST["homes"]."'";
            $homeInfo = $homeInfo[0];
            $etazji = $wpdb->get_results("SELECT `etazg` FROM `kn_ches_home`  where `home` = '".$_REQUEST["homes"]."' GROUP BY `etazg` ORDER BY `etazg` DESC");
            // for ($i = 0; $i<count($hous); $i+=7) {
                foreach ($etazji as $e) {
        ?>
            <div class="etazg">
                <div class="etagn_number">
                    <?echo $e->etazg;?>
                </div>
                  

                <div class="kvartiri" >
                    <?
                        $hous = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$_REQUEST["homes"]."' AND `etazg` = ".$e->etazg." ORDER BY `number` ASC");
                        foreach ($hous as $h) {
                            $status = "";
                            $title = "";
                            if ($h->status === "Продана") {
                                $status = "prodana"; 
                                $title = "Продана";
                            }
                            
                            if ($h->status === "Резерв") {
                                $status = "rezerv"; 
                                $title = "Резерв: ".$h->klient_name." от ".date("d.m.Y", strtotime($h->rezerv_data));
                            }

                            if ($h->status === "Свободна") {
                                $status = "svobodna"; 
                                $title = "Свободна";
                            }

                            if ($h->status === "Резерв учередителя") {
                                $status = "uhred"; 
                                $title = "Резерв учередителя";
                            }

                            if ($h->status === "Резерв руководителя") {
                                $status = "ruk"; 
                                $title = "Резерв руководителя";
                            }
                    ?>

                    <?php 
                        $lnk = get_permalink(103)."?kvartira=".$h->id;
                        
                        // if ($_COOKIE["login"] === "view")
                        if (strpos($_COOKIE["login"], "view") !== false)
                            $lnk = "#";
                    ?>
                        <a href = "<? echo $lnk?>" class="kvartira <?echo $status; ?>" title = "<?echo $title;?>">
                            <div class="kinfo">
                                <div class = "knumber">
                                    № <? echo $h->number;  
                                    if (!empty($h->number2) ) echo "/".$h->number2;
                                    ?>
                                </div>
                                <div class="karea">
                                    <? echo $h->area; ?>  м² 
                                </div>
                            </div>
                            <div class="kprice  rub">
                                <span class = "price_formator"><?echo round($h->base_price * $h->area, 2); ?></span>
                            </div>
                            <div class="roomCount">
                                <? echo $h->rooms; ?> ком.
                            </div>
                        </a>
                    <?}?>
                </div>
            </div>
        <?
            }
        } else {?>       
            <strong>Выберите дом</strong>
        <?}?>    
    </div>
</div>