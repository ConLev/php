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