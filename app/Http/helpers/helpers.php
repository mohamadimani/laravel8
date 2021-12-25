<?php
function currentMenu()
{
   return request()->route()->getName();
}

function shorterText($text,$length=50)
{
   return mb_strlen($text) >50 ? mb_substr($text , 0 , $length) . '...' : $text;
}

