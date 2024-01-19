<?php

use App\Models\Group;

function getAllGroups()
{
    return Group::orderBy('created_at', 'desc')->get();
}


// Calculate the time spent reading the article
function estimateReadingTime($text, $wpm = 200)
{
    $totalWords = str_word_count(strip_tags($text));
    $minutes = floor($totalWords / $wpm);
    return $minutes;
}

// Create url path
function createSlug($string)
{
    // Convert the string to lowercase
    $string = strtolower($string);

    // Remove special characters
    $string = preg_replace('/[^a-z0-9\-]/', '', $string);

    // Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);

    // Remove consecutive hyphens
    $string = preg_replace('/-+/', '-', $string);

    // Trim any leading or trailing hyphens
    $string = trim($string, '-');

    return $string;
}
// Check permissions
function isRole($dataArr, $module, $role = 'view')
{
    if (!empty($dataArr)) {
        $roleArr = $dataArr[$module] ?? [];
        if (!empty($roleArr) && in_array($role, $roleArr)) {
            return true;
        }
    }
    return false;
}
