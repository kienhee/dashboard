<?php

use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Size;
use App\Models\Tag;

function getAllGroups()
{
    return Group::all();
}
function getAllCategories()
{
    return Category::all();
}
function getAllColors()
{
    return Color::all();
}
function getAllSizes()
{
    return Size::all();
}
function getAllTags()
{
    return Tag::all();
}