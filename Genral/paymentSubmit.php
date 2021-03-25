<?php include 'header.php'; ?>

<div class="container-fluid">
<ul class="nav nav-tabs nav-tabs__service"><br>
    <li class="p-b"><button class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="new_service">새로운 서비스</button></li>
    <li class="p-b"><button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="new_subscriptions">새로운 구독</button></li>
    <li class="p-b"><button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="new_category">새로운 카테고리</button></li>


    <li class="p-b"><a class="btn btn-default m-l" href="admin/services?siralama=asc">가격별 증가</a></li>
    <li class="p-b"><a class="btn btn-default m-l" href="admin/services?siralama=desc">가격별 감소</a></li>


    <li class="pull-right">
        <div class="form-inline"><label for="service-search-input" class="service-search__icon"></label>
            <input class="form-control" placeholder="Search" id="priceService" type="text" value="">
        </div>
    </li>
    <br>
    <li class="pull-right">
        <button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="import_services">서비스 가져오기</button>
    </li>
</ul>
<ul></ul>
<div class="sticker-head">
    <table class="service-block__header" id="sticker">
        <thead>
        <th class="checkAll-th service-block__checker null">
            <div class="checkAll-holder">
                <input type="checkbox" id="checkAll">
                <input type="hidden" id="checkAllText" value="order">
            </div>
            <div class="action-block">
                <ul class="action-list">
                    <li><span class="countOrders"></span> 선택된 서비스</li>
                    <li>
                        <div class="dropdown">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown"> 서비스 설정 <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="bulkorder" data-type="active">모든 서비스 활성화</a>
                                    <a class="bulkorder" data-type="deactive">모든 서비스 비활성화</a>
                                    <a class="bulkorder" data-type="secret">모든 서비스 비밀로 만들기</a>
                                    <a class="bulkorder" data-type="desecret">비밀 서비스에서 모두 제거</a>
                                    <a class="bulkorder" data-type="del_price">모든 사용자 지정 가격 삭제</a>
                                    <a class="bulkorder" data-type="del_service">모든 서비스 삭제</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </th>
        <th class="service-block__id">ID</th>
        <th class="service-block__service">서비스</th>
        <th class="service-block__type">
            서비스 유형
        </th>
        <th class="service-block__provider">공급자</th>
        <th class="service-block__rate">가격</th>
        <th class="service-block__minorder">최소</th>
        <th class="service-block__minorder">최대</th>
        <th class="service-block__visibility">상태</th>
        <th class="service-block__action text-right"><span id="allServices" class="service-block__hide-all fa fa-compress"></span></th>
        </tr>
        </thead>
    </table>
</div>

<div class="service-block__body">
    <div class="service-block__body-scroll">
        <div style="width: 100%; height: 0px;"></div>
        <form action="<?php echo site_url("admin/services/multi-action") ?>" method="post" id="changebulkForm">
            <div style="" class="category-sortable">
                <?php $c=0;foreach($serviceList as $category => $services ): $c++; ?>
                    <div class="categories" data-id="<?=$services[0]["category_id"]?>">
                        <div class="<?php if( $services[0]["category_type"] == 1 ): echo 'grey'; endif;?>  service-block__category ">
                            <div class="service-block__category-title"  class="categorySortable" data-category="<?=$category?>" id="category-<?=$c?>">
                                <div class="service-block__drag handle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>드래그-핸들</title>
                                        <path d="M7 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6-8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"></path>
                                    </svg>
                                </div>
                                <?php if( $services[0]["category_secret"] == 1 ): echo '<small data-toggle="tooltip" data-placement="top" title="" data-original-title="gizli kategori"><i class="fa fa-lock"></i></small> '; endif; echo $category; ?>
                                <div class="dropdown-inline">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown">옵션 <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_category" data-id="<?=$services[0]["category_id"]?>">카테고리 수정</a></li>
                                            <?php if( $services[0]["category_type"] == 1 ): $type = "category-active"; else: $type = "category-deactive"; endif; ?>
                                            <li><a href="<?php echo site_url("admin/services/".$type."/".$services[0]["category_id"]) ?>">카테고리 사용 안함 <?php if( $services[0]["category_type"] == 1 ): echo "aktifleştir"; else: echo "pasifleştir"; endif; ?></a></li>
                                            <li><a href="<?php echo site_url("admin/services/category-delete/".$services[0]["category_id"]) ?>">지우다 </a></li>

                                        </ul>
                                    </div>
                                </div>
                                <?php if( !empty($services[0]["service_id"]) ): ?>

                                    <div class="service-block__collapse-block"><div id="collapedAdd-<?=$c?>" class="service-block__collapse-button" data-category="category-<?=$c?>"></div></div>
                                <?php endif; ?>
                            </div>
                            <div class="collapse in">
                                <div class="service-block__packages">
                                    <table id="servicesTableList" class="Servicecategory-<?=$c?>">
                                        <tbody class="service-sortable">
                                        <div class="serviceSortable" id="Servicecategory-<?=$c?>" data-id="category-<?=$c?>">
                                            <?php for($i=0;$i<count($services);$i++): $api_detail = json_decode($services[$i]["api_detail"],true); ?>
                                                <tr id="serviceshowcategory-<?=$c?>" class="ui-state-default <?php if( $services[$i]["service_type"] == 1 ): echo "grey"; endif; ?>"  data-category="category-<?=$c?>" data-id="service-<?php echo $services[$i]["service_id"] ?>" data-service="<?php echo $services[$i]["service_name"] ?>">
                                                    <?php if( !empty($services[0]["service_id"])  ):?>
                                                        <td class="service-block__checker">
                                                            <?php if($services[$i]["api_servicetype"]==1): echo '<div class="service-block__danger"></div>'; endif;?>
                                                            <span></span>
                                                            <div class="service-block__checkbox">
                                                                <div class="service-block__drag handle">
                                                                    <svg>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                            <title>드래그-핸들</title>
                                                                            <path d="M7 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6-8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"></path>
                                                                        </svg>
                                                                    </svg>
                                                                </div>
                                                                <input type="checkbox" class="selectOrder" name="service[<?php echo $services[$i]["service_id"] ?>]" value="1" style="border:1px solid #fff">
                                                            </div>
                                                        </td>
                                                        <td class="service-block__id"><?php echo $services[$i]["service_id"] ?></td>
                                                        <td class="service-block__service"><?php if( $services[$i]["service_secret"] == 1 ): echo '<small data-toggle="tooltip" data-placement="top" title="" data-original-title="Secret Service"><i class="fa fa-lock"></i></small> '; endif; echo $services[$i]["service_name"]; ?></td>
                                                        <td class="service-block__type" nowrap=""><?php echo servicePackageType($services[$i]["service_package"]); ?></td>
                                                        <td class="service-block__provider"><?php if( $services[$i]["service_api"] != 0 ): echo $services[$i]["api_name"]; else: echo "Manual"; endif; ?></td>
                                                        <td class="service-block__rate">
                                                            <?php
                                                            if( $api_detail["currency"] == "USD" ):
                                                                $api_price  = $api_detail["rate"]*$settings["dolar_charge"];
                                                            elseif( $api_detail["currency"] == "EUR" ):
                                                                $api_price  = $api_detail["rate"]*$settings["euro_charge"];
                                                            elseif( $api_detail["currency"] == "TRY" ):
                                                                $api_price  = $api_detail["rate"];
                                                            endif;
                                                            ?>
                                                            <div style="<?php
                                                            if( !$api_detail["rate"] ): echo ""; elseif( $services[$i]["service_api"] != 0 && $services[$i]["service_price"] > $api_price ): echo "color: green"; elseif( $services[$i]["service_api"] != 0 && $services[$i]["service_price"] < $api_price ): echo "color: red"; endif ?>"><?php echo ($c == 1) ? sprintf("%1.2f",(float)$services[$i]["service_price"]/1000.0) : $services[$i]["service_price"] ?></div>

                                                            <?php if( $services[$i]["service_api"] != 0 && $api_detail["rate"] ): echo '<div class="service-block__provider-value"><i class="fa fa-'.strtolower($api_detail["currency"]).'"></i> '.priceFormat($api_detail["rate"]).'</div>'; endif; ?>
                                                        </td>
                                                        <td class="service-block__minorder">
                                                            <div><?php echo $services[$i]["service_min"] ?></div>
                                                            <?php if( $services[$i]["service_api"] != 0 ): echo '<div class="service-block__provider-value">'.$api_detail["min"].'</div>'; endif; ?>
                                                        </td>
                                                        <td class="service-block__minorder">
                                                            <div><?php echo $services[$i]["service_max"] ?></div>
                                                            <?php if( $services[$i]["service_api"] != 0 ): echo '<div class="service-block__provider-value">'.$api_detail["max"].'</div>'; endif; ?>
                                                        </td>
                                                        <td class="service-block__visibility"><?php if( $services[$i]["service_type"] == 1 ): echo "Pasif"; else: echo "Active"; endif; ?> <?php if($services[$i]["api_servicetype"]==1): echo '<span class="text-danger" title="Service provider removed service"><span class="fa fa-exclamation-circle"></span></span>'; endif;?> </td>
                                                        <td class="service-block__action">
                                                            <div class="dropdown pull-right">
                                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown">옵션 <span class="caret"></span></button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_service" data-id="<?=$services[$i]["service_id"]?>">서비스 수정</a></li>
                                                                    <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_description" data-id="<?=$services[$i]["service_id"]?>">설명 수정</a></li>
                                                                    <?php if( $services[$i]["service_type"] == 1 ): $type = "service-active"; else: $type = "service-deactive"; endif; ?>
                                                                    <li><a href="<?php echo site_url("admin/services/".$type."/".$services[$i]["service_id"]) ?>">서비스 <?php if( $services[$i]["service_type"] == 1 ): echo "Activate"; else: echo "Deactivate"; endif; ?></a></li>
                                                                    <li><a href="<?php echo site_url("admin/services/del_price/".$services[$i]["service_id"]) ?>">가격 삭제</a></li>
                                                                    <li><a href="<?php echo site_url("admin/services/delete/".$services[$i]["service_id"]) ?>">서비스 삭제</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endfor; ?>
                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php
                $services       = $conn->prepare("SELECT * FROM services LEFT JOIN service_api ON service_api.id = services.service_api WHERE services.category_id=:c_id ORDER BY services.service_line ASC ");
                $services       -> execute(array("c_id"=>0));
                $services       = $services->fetchAll(PDO::FETCH_ASSOC);
                if( $services ):
                    ?>
                    <div class="service-block__category ">
                        <div class="service-block__category-title"  class="categorySortable" data-category="notcategory" id="category-0">
                            분류되지 않음
                            <div class="service-block__collapse-block"><div id="collapedAdd-0" class="service-block__collapse-button" data-category="category-0"></div></div>
                        </div>
                        <div class="collapse in">
                            <div class="service-block__packages">
                                <table id="servicesTableList" class="Servicecategory-0">
                                    <tbody class="service-sortable">
                                    <div class="serviceSortable" id="Servicecategory-0" data-id="category-0">
                                        <?php foreach($services as $service): $api_detail = json_decode($service["api_detail"],true); ?>
                                            <tr id="serviceshowcategory-0" class="ui-state-default <?php if( $service["service_type"] == 1 ): echo "grey"; endif; ?>"  data-category="category-0" data-id="service-<?php echo $service["service_id"] ?>" data-service="<?php echo mb_convert_encoding($service["service_name"],"UTF-8","UTF-8") ?>">
                                                <td class="service-block__checker">
                                                    <!-- <div class="service-block__danger"></div> //Servis diğer sitede pasifse burayı aktif et-->
                                                    <span></span>
                                                    <div class="service-block__checkbox">
                                                        <div class="service-block__drag handle">
                                                            <svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <title>드래그-핸들</title>
                                                                    <path d="M7 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6-8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 6c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"></path>
                                                                </svg>
                                                            </svg>
                                                        </div>
                                                        <input type="checkbox" class="selectOrder" name="service[<?php echo $service["service_id"] ?>]" value="1" style="border:1px solid #fff">
                                                    </div>
                                                </td>
                                                <td class="service-block__id"><?php echo $service["service_id"] ?></td>
                                                <td class="service-block__service"><?php if( mb_convert_encoding($service["service_secret"],"UTF-8","UTF-8") == 1 ): echo '<small data-toggle="tooltip" data-placement="top" title="" data-original-title="Secret service"><i class="fa fa-lock"></i></small> '; endif; echo mb_convert_encoding($service["service_name"],"UTF-8","UTF-8"); ?></td>
                                                <td class="service-block__type" nowrap=""><?php echo servicePackageType($service["service_package"]); ?></td>
                                                <td class="service-block__provider"><?php if( $service["service_api"] != 0 ): echo $service["api_name"]; else: echo "Manual"; endif; ?></td>
                                                <td class="service-block__rate">
                                                    <?php
                                                    if( $api_detail["currency"] == "USD" ):
                                                        $api_price  = $api_detail["rate"]*$settings["dolar_charge"];
                                                    elseif( $api_detail["currency"] == "EUR" ):
                                                        $api_price  = $api_detail["rate"]*$settings["euro_charge"];
                                                    elseif( $api_detail["currency"] == "TRY" ):
                                                        $api_price  = $api_detail["rate"];
                                                    endif;
                                                    ?>
                                                    <div style="<?php if( $service["service_api"] != 0 && $service["service_price"] > $api_price ): echo "color: green"; elseif( $service["service_api"] != 0 && $service["service_price"] < $api_price ): echo "color: red"; endif ?>"><?php echo $service["service_price"] ?></div>
                                                    <?php if( $service["service_api"] != 0 ): echo '<div class="service-block__provider-value"><i class="fa fa-'.strtolower($api_detail["currency"]).'"></i> '.priceFormat($api_detail["rate"]).'</div>'; endif; ?>
                                                </td>
                                                <td class="service-block__minorder">
                                                    <div><?php echo $service["service_min"] ?></div>
                                                    <?php if( $service["service_api"] != 0 ): echo '<div class="service-block__provider-value">'.$api_detail["min"].'</div>'; endif; ?>
                                                </td>
                                                <td class="service-block__minorder">
                                                    <div><?php echo $service["service_max"] ?></div>
                                                    <?php if( $service["service_api"] != 0 ): echo '<div class="service-block__provider-value">'.$api_detail["max"].'</div>'; endif; ?>
                                                </td>
                                                <td class="service-block__visibility"><?php if( $service["service_type"] == 1 ): echo "Deactive"; else: echo "Active"; endif; ?> </td>
                                                <td class="service-block__action">
                                                    <div class="dropdown pull-right">
                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown">옵션 <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_service" data-id="<?=$service["service_id"]?>">서비스 수정</a></li>
                                                            <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_description" data-id="<?=$service["service_id"]?>">설명 수정</a></li>
                                                            <?php if( $service["service_type"] == 1 ): $type = "service-active"; else: $type = "service-deactive"; endif; ?>
                                                            <li><a href="<?php echo site_url("admin/services/".$type."/".$service["service_id"]) ?>">서비스 <?php if( $service["service_type"] == 1 ): echo "Activated"; else: echo "Deactivated"; endif; ?></a></li>
                                                            <li><a href="<?php echo site_url("admin/services/del_price/".$service["service_id"]) ?>">가격 삭제</a></li>
                                                            <li><a href="<?php echo site_url("admin/services/delete/".$services[$i]["service_id"]) ?>">서비스 삭제</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <input type="hidden" name="bulkStatus" id="bulkStatus" value="-1">
        </form>
    </div>
</div>
</div>

</div>

<div class="modal modal-center fade" id="confirmChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>상태를 업데이트하시겠습니까?</h4>
                <div align="center">
                    <a class="btn btn-primary" href="" id="confirmYes">네</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">아니요</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
