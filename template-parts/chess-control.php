<div class="chess_control">
    <div class="left"><strong>Пользователь: </strong> <?echo $_COOKIE["name"];?></div>
    <div class="right">
        <? if ($_COOKIE["adm"] == 1) { ?>    
            <a href="<?echo get_permalink(106)?>" class="ch_stat" id = "ch_stat">Статистика</a>
        <?}?>
        
        <a href="#" class="ch_exit" id = "ch_exit">Выход</a>
        
    </div>
</div>