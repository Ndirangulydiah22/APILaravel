<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Controllers\PermissionController;
use App\Http\Resources\PermissionResource;

class PermissionsController extends Controller
{public function index()
    {
        return PermissionResource::collection(Permission::all());
    }
}
