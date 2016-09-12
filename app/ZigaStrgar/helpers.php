<?php

function checkForUser($text)
{
    return preg_replace('/@(\w+)/', '<a href="' . url("users") . '/${1}">@${1}</a>', $text);
}