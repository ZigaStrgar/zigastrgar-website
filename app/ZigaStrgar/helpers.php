<?php

function checkForUser($text)
{
    return preg_replace('/@(\w+)/', '<a href="' . url("user") . '/${1}">${1}</a>', $text);
}