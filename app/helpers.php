<?php

use App\Models\Category;
use App\Models\Group;

function getAllGroups()
{
    return Group::all();
}
function getAllCategories()
{
    return Category::all();
}