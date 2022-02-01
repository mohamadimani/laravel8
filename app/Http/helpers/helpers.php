<?php


function currentMenu()
{
   return request()->route()->getName();
}

function shorterText($text, $length = 50)
{
   return mb_strlen($text) > 50 ? mb_substr($text, 0, $length) . '...' : $text;
}

function uploadImage($image)
{
   $fileName = bin2hex(random_bytes(10)) . '.' . $image->getClientOriginalExtension();
   $image->move(base_path('storage/app/public'), $fileName);
   return  $fileName;
}

function deleteFile($file)
{
   \File::delete('storage/'.$file);
}

function carbonToJalaliDate($carbonDate)
{
  return $jalalidate = \Morilog\Jalali\Jalalian::fromCarbon($carbonDate);
}
