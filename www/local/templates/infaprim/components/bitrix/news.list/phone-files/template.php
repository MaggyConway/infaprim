<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!-- .read_more -->
<ul class="files_list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <? //echo '<pre>'; var_dump($arItem); echo "</pre>"; ?>
        
        <li>
            <a href="<?= $arItem["DISPLAY_PROPERTIES"]["FILE_DOC"]["FILE_VALUE"]["SRC"]?>" target="_blank">
                <? echo $arItem["NAME"] ?></a>
        </li>


        <? /*
        <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>" class="articles__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                <div class="articles__item__img" style="background: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);"> </div>

                <div class="articles__item__tags">
                    <div class="articles__item__img" style="background: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>') no-repeat top center; background-size: cover;"></div>

                    <ul>
                        <?  foreach ($arrayTags as $tagItem) : ?>  
                            <li class="elemTags itemTag">
                                <?= $tagItem; ?> 
                            </li>
                        <?  endforeach; ?>
                    </ul>
                </div>

                <div class="articles__item__txt">
                    <h3><? echo $arItem["NAME"] ?></h3>
                    <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                </div>
        </a> */ ?>
    <? endforeach; ?>
</ul>