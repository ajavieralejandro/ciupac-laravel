@extends('layouts.admin')

@section('title', 'Panel de administracion')

@section('content')
@php
    $totalUsuarios = \App\Models\User::count();

    $iconsSvg = [
        'globe'    => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H11.78c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/></svg>',
        'image'    => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/></svg>',
        'info'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>',
        'news'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11z"/></svg>',
        'doc'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/><path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/></svg>',
        'building' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1z"/></svg>',
        'link'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/><path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/></svg>',
        'logo'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.5 7h-5a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1zm0-2h-5a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1zm4-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg>',
        'map'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/></svg>',
        'pin'      => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.53 31.53 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>',
        'station'  => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 1 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/></svg>',
        'recycle'  => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.537-4.44z"/></svg>',
        'compass'  => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/><path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/></svg>',
        'team'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/></svg>',
        'user'     => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z"/></svg>',
        'settings' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/><path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319z"/></svg>',
        'config'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/></svg>',
    ];

    $moduleGroups = [
        [
            'id'       => 'contenido',
            'icon'     => 'globe',
            'title'    => 'Contenido del sitio',
            'subtitle' => 'Gestiona la informacion publica, noticias, documentos y recursos visibles del sitio.',
            'modules'  => [
                ['title' => 'Portada',   'description' => 'Actualiza la imagen principal del sitio.',              'icon' => 'image',    'url' => route('uploadImage')],
                ['title' => 'About',     'description' => 'Edita contenido e imagen de la seccion institucional.', 'icon' => 'info',     'url' => route('showAbout')],
                ['title' => 'Posts',     'description' => 'Publica y edita noticias del sitio.',                   'icon' => 'news',     'url' => route('posts')],
                ['title' => 'Articulos', 'description' => 'Sube y administra documentos y archivos.',              'icon' => 'doc',      'url' => route('showArticles')],
                ['title' => 'Asambleas', 'description' => 'Gestiona asambleas e imagenes relacionadas.',           'icon' => 'building', 'url' => route('asambleas')],
                ['title' => 'Links',     'description' => 'Administra links y recursos de interes.',               'icon' => 'link',     'url' => route('links')],
                ['title' => 'Logos',     'description' => 'Gestiona logos y variantes visibles.',                  'icon' => 'logo',     'url' => route('logos')],
            ],
        ],
        [
            'id'       => 'territorio',
            'icon'     => 'map',
            'title'    => 'Territorio y mediciones',
            'subtitle' => 'Administra locaciones, estaciones conectadas y mediciones ambientales.',
            'modules'  => [
                ['title' => 'Locaciones',        'description' => 'Administra locaciones y puntos asociados.',     'icon' => 'pin',     'url' => route('locations')],
                ['title' => 'Estaciones',         'description' => 'Conecta, edita y monitorea estaciones.',       'icon' => 'station', 'url' => route('stations')],
                ['title' => 'Basuras',            'description' => 'Visualiza y gestiona las mediciones cargadas.','icon' => 'recycle', 'url' => route('basuras_index')],
                ['title' => 'Asignar locaciones', 'description' => 'Relaciona usuarios con sus locaciones.',       'icon' => 'compass', 'url' => route('assign.locations')],
            ],
        ],
        [
            'id'       => 'administracion',
            'icon'     => 'settings',
            'title'    => 'Administracion interna',
            'subtitle' => 'Gestiona usuarios, equipo institucional y configuracion general.',
            'modules'  => [
                ['title' => 'Equipo',        'description' => 'Crea, edita o elimina miembros del equipo.',  'icon' => 'team',   'url' => route('team')],
                ['title' => 'Usuarios',      'description' => 'Registra y administra usuarios del sistema.', 'icon' => 'user',   'url' => route('usersIndex')],
                ['title' => 'Configuracion', 'description' => 'Ajusta datos institucionales y visibilidad.', 'icon' => 'config', 'url' => route('config')],
            ],
        ],
    ];
@endphp

<style>
    .admin-hero {
        background: linear-gradient(135deg, #0a2540 0%, #0d6efd 60%, #0dcaf0 100%);
        border-radius: 14px; padding: 2rem 2.5rem; margin-bottom: 2rem;
        box-shadow: 0 4px 18px rgba(13,110,253,.25); color: #fff;
    }
    .admin-hero h1 { font-size: 1.75rem; font-weight: 700; margin-bottom: .35rem; }
    .admin-hero p  { opacity: .85; margin: 0; font-size: .95rem; }
    .admin-hero-badge {
        display: inline-flex; align-items: center; gap: .45rem;
        background: rgba(255,255,255,.15); border: 1px solid rgba(255,255,255,.25);
        border-radius: 50px; padding: .3rem .85rem; font-size: .8rem; color: #fff; margin-top: 1rem;
    }
    .admin-stat-card {
        background: #fff; border: 1px solid #e2ecf7; border-radius: 12px;
        padding: 1.1rem 1.25rem; display: flex; align-items: center; gap: 1rem;
        box-shadow: 0 2px 8px rgba(10,37,64,.05);
    }
    .admin-stat-card .stat-icon { background: #e6f3ff; border-radius: 10px; padding: .55rem .7rem; color: #0d6efd; }
    .admin-stat-card .stat-value { font-size: 1.6rem; font-weight: 800; color: #0a2540; line-height: 1; }
    .admin-stat-card .stat-label { font-size: .8rem; color: #5a7a99; margin-top: .2rem; }
    .admin-module-group {
        background: #fff; border-radius: 14px; border: 1px solid #e2ecf7;
        box-shadow: 0 2px 10px rgba(10,37,64,.06); margin-bottom: 1.75rem; overflow: hidden;
    }
    .admin-module-group-header {
        background: linear-gradient(90deg,#f0f7ff,#e6f3ff); border-bottom: 1px solid #d0e4f7;
        padding: 1.1rem 1.5rem; display: flex; align-items: center; gap: .75rem;
    }
    .admin-module-group-header .group-icon { color: #0d6efd; flex-shrink: 0; }
    .admin-module-group-header h5 { margin: 0; font-weight: 700; color: #0a2540; font-size: 1rem; }
    .admin-module-group-header p  { margin: .15rem 0 0; color: #5a7a99; font-size: .83rem; }
    .admin-module-group-header .module-count {
        margin-left: auto; background: #0d6efd; color: #fff;
        border-radius: 50px; padding: .2rem .7rem; font-size: .75rem; font-weight: 600; white-space: nowrap;
    }
    .admin-module-group-body { padding: 1.25rem 1.5rem; }
    .admin-module-card {
        background: #f8fbff; border: 1px solid #d8ecff; border-radius: 12px;
        padding: 1.1rem 1rem; height: 100%; display: flex; flex-direction: column;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .admin-module-card:hover {
        transform: translateY(-3px); box-shadow: 0 6px 20px rgba(13,110,253,.14); border-color: #91c4f2;
    }
    .admin-module-card .card-icon { color: #0d6efd; margin-bottom: .6rem; display: block; }
    .admin-module-card h6 { font-weight: 700; color: #0a2540; font-size: .9rem; margin-bottom: .3rem; }
    .admin-module-card p  { color: #5a7a99; font-size: .8rem; flex-grow: 1; margin: 0 0 .75rem; }
    .admin-module-card .btn-manage {
        display: inline-flex; align-items: center; gap: .35rem;
        padding: .35rem .9rem; font-size: .8rem; font-weight: 600; border-radius: 8px;
        background: #0d6efd; color: #fff; text-decoration: none;
        transition: background .15s ease; align-self: flex-start;
    }
    .admin-module-card .btn-manage:hover { background: #0a58ca; color: #fff; }
</style>

<div class="admin-hero">
    <h1>Panel de administracion</h1>
    <p>Gestiona el contenido, las mediciones y la configuracion institucional desde un solo lugar.</p>
    <div class="admin-hero-badge">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4z"/></svg>
        {{ auth()->user()->name ?? 'Administrador' }}
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="admin-stat-card">
            <div class="stat-icon">{!! $iconsSvg['user'] !!}</div>
            <div>
                <div class="stat-value">{{ $totalUsuarios }}</div>
                <div class="stat-label">Usuarios registrados</div>
            </div>
        </div>
    </div>
</div>

@foreach($moduleGroups as $group)
<div class="admin-module-group" id="group-{{ $group['id'] }}">
    <div class="admin-module-group-header">
        <span class="group-icon">{!! $iconsSvg[$group['icon']] !!}</span>
        <div>
            <h5>{{ $group['title'] }}</h5>
            <p>{{ $group['subtitle'] }}</p>
        </div>
        <span class="module-count">{{ count($group['modules']) }} modulos</span>
    </div>
    <div class="admin-module-group-body">
        <div class="row g-3">
            @foreach($group['modules'] as $module)
            <div class="col-12 col-sm-6 col-xl-4">
                <div class="admin-module-card">
                    <span class="card-icon">{!! $iconsSvg[$module['icon']] !!}</span>
                    <h6>{{ $module['title'] }}</h6>
                    <p>{{ $module['description'] }}</p>
                    <a href="{{ $module['url'] }}" class="btn-manage">
                        Gestionar
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach
@endsection
