<?php

function getImg($sql)
{
    return getAssocResult($sql);
}

function renderImg($file, $images)
{
    $gallery = '';
    foreach ($images as $image) {
        $gallery .= render($file, $image);
    }
    return $gallery;
}