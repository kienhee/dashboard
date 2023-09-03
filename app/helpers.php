<?php

use App\Models\Group;

function getAllGroups()
{
    return Group::all();
}