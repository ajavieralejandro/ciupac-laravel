@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
    $totalUsuarios = \App\Models\User::count();
    $totalProfesores = class_exists(\App\Models\Team::class) ? \App\Models\Team::count() : 0;

    $metricCards = [
        [
            'title' => 'Total usuarios',
            'value' => $totalUsuarios,
            'icon' => '👥',
            'accent' => 'primary',
            'description' => 'Usuarios registrados en el sistema.',
        ],
        [
            'title' => 'Total turnos',
            'value' => 0,
            'icon' => '🗓️',
            'accent' => 'success',
            'description' => 'Métrica pendiente de integración.',
        ],
        [
            'title' => 'Total inscripciones',
            'value' => 0,
            'icon' => '📝',
            'accent' => 'warning',
            'description' => 'Métrica pendiente de integración.',
        ],
        [
            'title' => 'Total profesores',
            'value' => $totalProfesores,
            'icon' => '🎓',
            'accent' => 'info',
            'description' => 'Miembros cargados en el equipo.',
        ],
    ];

    $modules = [
        [
            'title' => 'Equipo',
            'description' => 'Crea, edita o elimina miembros del equipo.',
            'icon' => '👥',
            'url' => route('team'),
            'button' => 'Gestionar equipo',
        ],
        [
            'title' => 'Portada',
            'description' => 'Actualiza la imagen principal del sitio.',
            'icon' => '🖼️',
            'url' => route('uploadImage'),
            'button' => 'Editar portada',
        ],
        [
            'title' => 'Locaciones',
            'description' => 'Administra locaciones y puntos asociados.',
            'icon' => '📍',
            'url' => route('locations'),
            'button' => 'Ver locaciones',
        ],
        [
            'title' => 'Logos',
            'description' => 'Gestiona logos y variantes visibles.',
            'icon' => '🏷️',
            'url' => route('logos'),
            'button' => 'Gestionar logos',
        ],
        [
            'title' => 'About',
            'description' => 'Edita contenido e imagen de la sección institucional.',
            'icon' => '💬',
            'url' => route('showAbout'),
            'button' => 'Editar about',
        ],
        [
            'title' => 'Artículos',
            'description' => 'Sube y administra documentos y archivos.',
            'icon' => '📄',
            'url' => route('showArticles'),
            'button' => 'Ver artículos',
        ],
        [
            'title' => 'Asambleas',
            'description' => 'Gestiona asambleas e imágenes relacionadas.',
            'icon' => '🏛️',
            'url' => route('asambleas'),
            'button' => 'Ir a asambleas',
        ],
        [
            'title' => 'Posts',
            'description' => 'Publica y edita noticias del sitio.',
            'icon' => '📰',
            'url' => route('posts'),
            'button' => 'Gestionar posts',
        ],
        [
            'title' => 'Configuración',
            'description' => 'Ajusta datos institucionales y visibilidad.',
            'icon' => '⚙️',
            'url' => route('config'),
            'button' => 'Abrir configuración',
        ],
        [
            'title' => 'Links',
            'description' => 'Administra links y recursos de interés.',
            'icon' => '🔗',
            'url' => route('links'),
            'button' => 'Ver links',
        ],
        [
            'title' => 'Estaciones',
            'description' => 'Conecta, edita y monitorea estaciones.',
            'icon' => '📡',
            'url' => route('stations'),
            'button' => 'Gestionar estaciones',
        ],
        [
            'title' => 'Usuarios',
            'description' => 'Registra y administra usuarios del sistema.',
            'icon' => '🙍',
            'url' => route('usersIndex'),
            'button' => 'Ver usuarios',
        ],
        [
            'title' => 'Asignar locaciones',
            'description' => 'Relaciona usuarios con sus locaciones.',
            'icon' => '🧭',
            'url' => route('assign.locations'),
            'button' => 'Asignar locaciones',
        ],
        [
            'title' => 'Basuras',
            'description' => 'Visualiza y gestiona las mediciones cargadas.',
            'icon' => '♻️',
            'url' => route('basuras_index'),
            'button' => 'Ver mediciones',
        ],
    ];
@endphp

<style>
    .dashboard-ocean {
        background: linear-gradient(180deg, #e0f7fa 0%, #ffffff 100%);
        border-radius: 16px;
        padding: 1rem;
    }

    .dashboard-hero {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        color: #ffffff;
        border-radius: 12px;
    }

    .ocean-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(4px);
        border-radius: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .ocean-card:hover {
        transform: translateY(-3px);
    }

    .metric-icon {
        font-size: 2rem;
        line-height: 1;
        color: #0d6efd;
    }
</style>

<div class="dashboard-ocean">
@include('admin.partials.page-header', [
    'title' => 'Dashboard',
])

<div class="mb-4 p-3 dashboard-hero shadow-sm">
    <h4 class="mb-0">Dashboard</h4>
    <small>Panel de administración</small>
    <div class="d-flex gap-3 mt-3">
        <a href="#modulos-admin" class="btn btn-outline-light">Ver módulos</a>
    </div>
</div>

<div class="row g-4 mb-4">
    @foreach($metricCards as $metric)
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100 ocean-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted mb-1">{{ $metric['title'] }}</p>
                            <h2 class="mb-0 fw-bold">{{ $metric['value'] }}</h2>
                        </div>
                        <div class="metric-icon text-primary">{{ $metric['icon'] }}</div>
                    </div>
                    <span class="badge bg-{{ $metric['accent'] }}-subtle text-dark">
                        Resumen
                    </span>
                    <p class="text-muted small mb-0 mt-3">{{ $metric['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-lg-7">
        <div class="card shadow-sm border-0 h-100 ocean-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="mb-1">Acciones rápidas</h5>
                        <p class="text-muted mb-0">Accesos directos para tareas frecuentes del panel.</p>
                    </div>
                    <span class="badge bg-light text-dark border">Atajos</span>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" disabled>Crear turno</button>
                    <button type="button" class="btn btn-outline-primary" disabled>Ver inscripciones</button>
                    <button type="button" class="btn btn-outline-secondary" disabled>Gestionar alumnos</button>
                </div>

                <div class="alert alert-light border mt-3 mb-0" role="alert">
                    Estos accesos quedan preparados como placeholders hasta integrar sus módulos reales.
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="card shadow-sm border-0 h-100 ocean-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="mb-1">Actividad reciente</h5>
                        <p class="text-muted mb-0">Últimos movimientos del panel administrativo.</p>
                    </div>
                    <span class="badge bg-light text-dark border">Placeholder</span>
                </div>

                <div class="border rounded p-3 bg-light-subtle">
                    <p class="mb-2 fw-semibold">Todavía no hay actividad reciente disponible.</p>
                    <p class="text-muted mb-0 small">
                        Cuando se conecten eventos o auditoría, esta sección podrá mostrar altas, ediciones y cambios relevantes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modulos-admin" class="card shadow-sm border-0 ocean-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Módulos de administración</h5>
                <p class="text-muted mb-0">Accesos existentes del sistema preservados dentro del nuevo dashboard.</p>
            </div>
            <span class="badge bg-dark">{{ count($modules) }} módulos</span>
        </div>

        <div class="row g-4">
            @foreach($modules as $module)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card h-100 border-0 shadow-sm ocean-card">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="mb-1">{{ $module['title'] }}</h6>
                                    <p class="text-muted small mb-0">{{ $module['description'] }}</p>
                                </div>
                                <span class="fs-4">{{ $module['icon'] }}</span>
                            </div>

                            <div class="mt-auto pt-3">
                                <a href="{{ $module['url'] }}" class="btn btn-primary">
                                    {{ $module['button'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
