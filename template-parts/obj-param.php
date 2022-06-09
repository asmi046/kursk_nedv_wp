<div class="apartment__charact">
					<h3>Характеристики <?echo $obj_nedv_id?></h3>
					<div class="info__charact">
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Код объекта</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc"><? echo $args["obj"]->row_id?></div>
						</div>
						
                        <div class="info__charact-row d-flex">
							<div class="info__charact-name">Тип объекта</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc"><? echo $args["obj"]->type?></div>
						</div>

						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Тип сделки</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc"><? echo $args["obj"]->deistvie?></div>
						</div>

						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Общая площадь</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc"><? echo $args["obj"]->area1?> м²</div>
						</div>
						
						<? if (empty($args["obj"]->area2)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">Жилая площадь</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->area2?> м²</div>
							</div>
						<? }?>


						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Этаж/Этажность</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc"><? echo $args["obj"]->floor?> из <? echo $args["obj"]->floors?></div>
						</div>

						<? if (!empty($args["obj"]->param3)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">
									<?
										$param3 = "Материал стен";
										if (in_array($args["obj"]->type, ["Комната", "Квартира", "Новостройка", "Таунхаус", "Дом", "Дача", "Коттедж"])) $param3 = "Материал стен";
										if (in_array($args["obj"]->type, ["Коммерческая"])) $param3 = "Тип здания";
										echo $param3;
									?>
								</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->param3?></div>
							</div>
						<? }?>

						<? if (!empty($args["obj"]->param6)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">
									<?
										$param6 = "Ремонт";
										if (in_array($args["obj"]->type, ["Комната", "Квартира", "Новостройка"])) $param6 = "Ремонт";
										if (in_array($args["obj"]->type, ["Земельный участок", "Земля (коммерческая)", "Таунхаус", "Дача", "Коттедж", "Дом"])) $param6 = "Форма участка";
										if (in_array($args["obj"]->type, ["Коммерческая"])) $param6 = "Состояние";
										echo $param6;
									?>
								</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->param6?></div>
							</div>
						<? }?>

						<? if (!empty($args["obj"]->param9)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">
									<?
										$param9 = "Вид использования";
										if (in_array($args["obj"]->type, ["Комната", "Квартира", "Новостройка"])) $param9 = "Окна";
										
										echo $param9;
									?>
								</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->param9?></div>
							</div>
						<? }?>

						<? if (!empty($args["obj"]->param11)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">
									<?
										$param11 = "Тип квартиры";
										if (in_array($args["obj"]->type, ["Комната", "Квартира", "Новостройка"])) $param11 = "Тип квартиры";
                                        if (in_array($args["obj"]->type, ["Коммерческая"])) $param11 = "Класс здания";
										
										echo $param11;
									?>
								</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->param11?></div>
							</div>
						<? }?>

                        <? if (!empty($args["obj"]->param22)) {?>
							<div class="info__charact-row d-flex">
								<div class="info__charact-name">
									<?
										$param11 = "Собственников";
										if (in_array($args["obj"]->type, ["Комната", "Квартира", "Новостройка"])) $param22 = "Собственников";
                                        if (in_array($args["obj"]->type, ["Коммерческая"])) $param22 = "Готовность";
										
										echo $param22;
									?>
								</div>
								<div class="info__charact-line"></div>
								<div class="info__charact-desc"><? echo $args["obj"]->param22?></div>
							</div>
						<? }?>
						
					</div>

					<?
						global $wpdb;
						$q = "SELECT `kn_agents`.*, `wp_agents_photo`.`photo` FROM `kn_agents` LEFT JOIN `wp_agents_photo` ON `wp_agents_photo`.`f` = `kn_agents`.`f` WHERE `kn_agents`.`sys_id` = ".$args["obj"]->user;
						$agent = $wpdb->get_results( $q );
						$agent = $agent[0]; 
						if (!empty($agent)) {
						
					?>
						
						<div class="agent_info_wrap">
							<h3>По всем вопросам:</h3>
							<div class="agent_info">
								<div class = "foto_blk">
									<img src="<? echo $agent->photo;?>" alt="Продажа данного объекта недвижимости: <? echo $agent->f." ".$agent->i." ".$agent->o?>">
								</div>
								<div class = "info_blk">
									<span class = "ag_name"><? echo $agent->f." ".$agent->i." ".$agent->o?></span>
									<span class = "ag_phone"><a href="tel:<? echo preg_replace('/[^0-9]/', '', $agent->phone); ?>"><?echo $agent->phone?></a></span>
									<span class = "ag_mail"><a href="mailto:<?echo $agent->email?>"><?echo $agent->email?></a></span>
								</div>
							</div>
						</div>
					<?}?>

				</div>