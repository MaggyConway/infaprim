<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (CModule::IncludeModule("iblock")):
    global $USER;
    $filter = [];
    if (isset($_REQUEST['last_name'])) {
        $filter['LAST_NAME'] = $_REQUEST['last_name'];
    }
    if (isset($_REQUEST['work_department'])) {

        if($_REQUEST['work_department'] != 'all'){
            $filter['WORK_DEPARTMENT'] = $_REQUEST['work_department'];
        }
    }
    if (isset($_REQUEST['personal_state'])) {
        if($_REQUEST['personal_state'] != 'all'){
            $filter['PERSONAL_STATE'] = $_REQUEST['personal_state'];
        }
    }
    $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);

        while ($arUser = $rsUsers->Fetch()) {  ?>
            <div class="team__item">
                <? if (!empty($arUser['PERSONAL_PHOTO'])) { ?>
                <?  $file = CFile::GetPath($arUser['PERSONAL_PHOTO']); ?>
				<a href="/adress-book/<?= $arUser['ID']; ?>" class="photo"
                       style="background: url(<?= $file ?>) no-repeat center center;"></a>
                <? } else { ?>
                    <a href="/adress-book/<?= $arUser['ID']; ?>" class="photo"
                       style="background: url(/local/templates/infaprim/img/adress_book_image_wrapper.png) no-repeat center center;"></a>
                <? } ?>

                <div class="name">
                    <a href="/adress-book/<?= $arUser['ID']; ?>">

                        <span><?= $arUser["LAST_NAME"] ?></span>
                        <span><?= $arUser["NAME"] ?></span>
                        <span><?= $arUser["SECOND_NAME"] ?></span>

                    </a>
                </div>
                <div class="position">
                    <?= $arUser["WORK_POSITION"] ?>
                </div>
                <div class="city">
                    <?= $arUser["PERSONAL_STATE"] ?>
                </div>
                <a href="mailto:<?= $arUser["EMAIL"] ?>" class="email">
                    <?= $arUser["EMAIL"] ?>
                </a>
            </div>
            <?php
        };

endif;