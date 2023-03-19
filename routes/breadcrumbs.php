<?php

use App\Models\User;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

/////// Super Admin Menu
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
//murid
Breadcrumbs::for('murids.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Data Murid', route('murids.index'));
});
Breadcrumbs::for('murids.create', function ($trail) {
    $trail->parent('murids.index');
    $trail->push('Tambah', route('murids.create'));
});
$user = User::find(1);
Breadcrumbs::for('murids.show', function ($trail, $user) {
    $trail->parent('murids.index');
    $trail->push('Show', route('murids.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('murids.edit', function ($trail, $user) {
    $trail->parent('murids.index');
    $trail->push('Edit', route('murids.edit', $user));
});
//pegawai
Breadcrumbs::for('pegawais.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Data Pegawai', route('pegawais.index'));
});
Breadcrumbs::for('pegawais.create', function ($trail) {
    $trail->parent('pegawais.index');
    $trail->push('Tambah', route('pegawais.create'));
});
$user = User::find(1);
Breadcrumbs::for('pegawais.show', function ($trail, $user) {
    $trail->parent('pegawais.index');
    $trail->push('Show', route('pegawais.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('pegawais.edit', function ($trail, $user) {
    $trail->parent('pegawais.index');
    $trail->push('Edit', route('pegawais.edit', $user));
});
//orang tua
Breadcrumbs::for('orangtuas.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Data Orang tua', route('orangtuas.index'));
});
Breadcrumbs::for('orangtuas.create', function ($trail) {
    $trail->parent('orangtuas.index');
    $trail->push('Tambah', route('orangtuas.create'));
});
$user = User::find(1);
Breadcrumbs::for('orangtuas.show', function ($trail, $user) {
    $trail->parent('orangtuas.index');
    $trail->push('Show', route('orangtuas.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('orangtuas.edit', function ($trail, $user) {
    $trail->parent('orangtuas.index');
    $trail->push('Edit', route('orangtuas.edit', $user));
});
//staff
Breadcrumbs::for('admins.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Data Staff', route('admins.index'));
});
Breadcrumbs::for('admins.create', function ($trail) {
    $trail->parent('admins.index');
    $trail->push('Tambah', route('admins.create'));
});
$user = User::find(1);
Breadcrumbs::for('admins.show', function ($trail, $user) {
    $trail->parent('admins.index');
    $trail->push('Show', route('admins.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('admins.edit', function ($trail, $user) {
    $trail->parent('admins.index');
    $trail->push('Edit', route('admins.edit', $user));
});
//setting app
Breadcrumbs::for('profilapps.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Setting App', route('profilapps.index'));
});
$user = User::find(1);
Breadcrumbs::for('profilapps.edit', function ($trail, $user) {
    $trail->parent('profilapps.index');
    $trail->push('Edit', route('profilapps.edit', $user));
});
//jadwal
Breadcrumbs::for('jadwals.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Jadwal Pembelajaran', route('jadwals.index'));
});
Breadcrumbs::for('jadwals.create', function ($trail) {
    $trail->parent('jadwals.index');
    $trail->push('Tambah', route('jadwals.create'));
});
$user = User::find(1);
Breadcrumbs::for('jadwals.show', function ($trail, $user) {
    $trail->parent('jadwals.index');
    $trail->push('Show', route('jadwals.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('jadwals.edit', function ($trail, $user) {
    $trail->parent('jadwals.index');
    $trail->push('Edit', route('jadwals.edit', $user));
});
//kelas
Breadcrumbs::for('kelas.index', function ($trail) {
    $trail->parent('super_admin.index');
    $trail->push('Informasi Kelas', route('kelas.index'));
});
Breadcrumbs::for('kelas.create', function ($trail) {
    $trail->parent('kelas.index');
    $trail->push('Tambah', route('kelas.create'));
});
$user = User::find(1);
Breadcrumbs::for('kelas.show', function ($trail, $user) {
    $trail->parent('kelas.index');
    $trail->push('Show', route('kelas.show', $user));
});
$user = User::find(1);
Breadcrumbs::for('kelas.edit', function ($trail, $user) {
    $trail->parent('kelas.index');
    $trail->push('Edit', route('kelas.edit', $user));
});

//////Super admin End Menu