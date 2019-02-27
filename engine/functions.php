<?php

function render($file, $variables = [])
{
    if (!is_file($file)) {
        echo 'Template file "' . $file . '" not found';
        exit();
    }

    if (filesize($file) === 0) {
        echo 'Template file "' . $file . '" is empty';
        exit();
    }

    $templateContent = file_get_contents($file);

    if (empty($variables)) {
        return $templateContent;
    }

    foreach ($variables as $key => $value) {
        if (empty($value) || !is_string($value)) {
            continue;
        }
        $key = '{{' . strtoupper($key) . '}}';
        $templateContent = str_replace($key, $value, $templateContent);
    }
    return $templateContent;
}

function render_menu($menu, $ul_class, $li_class, $a_class)
{
    echo "<ul class= '$ul_class' >";
    foreach ($menu as $list_item) {
        echo "<li class='$li_class'>";
        echo "<a class='$a_class' href='{$list_item['url']}'>{$list_item['title']}</a>";
        //if (isset($list_item['items']) && is_array($list_item['items'])) { // вариант преподавателя
        if (array_key_exists('items', $list_item) && is_array($list_item['items'])) {
            render_menu($list_item['items'], 'sub_menu', 'sub_menu_list', 'sub_menu_link');
        }
        echo '</li>';
    }
    echo "</ul>";
}

function render_img($img)
{
    foreach ($img as $key => $src) {
        $key = $key + 1;
        echo "<a href='../img/$src' target='_blank'><img class='img' src='../img/$src' alt='img-$key'></a>";
    }
}

function render_img_v2($dir, $link_class)
{
    //$img = array_diff(scandir($dir), ['..', '.']);
    //sort($img);
    $img = array_slice(scandir($dir), 2);
    foreach ($img as $key => $src) {
        $key = $key + 1;
        echo "<a class='$link_class' href='../img/$src' target='_blank' data-src ='../img/$src' 
data-alt='img-$key'><img class='img' src='../img/$src' alt='img-$key'></a>";
    }
}

function createGallery()
{
    $result = '';
    $images = scandir(WWW_DIR . IMG_DIR);

    foreach ($images as $image) {
        if (is_file(WWW_DIR . IMG_DIR . $image)) {
            $result .= render(TEMPLATES_DIR . 'galleryItem.tpl', [
                'src' => IMG_DIR . $image
            ]);
        }
    }
    return $result;
}