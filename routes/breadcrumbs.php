<?php

use App\Models\User;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Dashboard
Breadcrumbs::for('super_admin.index', function ($trail) {
    $trail->push('Dashboard', route('super_admin.index'));
});
// menu user management
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('User Management', route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Tambah', route('users.create'));
});
$user = User::find(1);
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Show', route('users.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Edit', route('users.edit', $user));
});
