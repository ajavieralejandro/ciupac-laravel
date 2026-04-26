@extends('layouts.homelayout')

@section('content')
@php
    $featuredPost = $posts->first();
    $aboutBody = function_exists('clean')
        ? clean($about->body ?? '', 'ciupac_content')
        : strip_tags($about->body ?? '', '<p><br><b><strong><i><em><ul><ol><li><h2><h3><h4><blockquote>');
    $portraitBody = function_exists('clean')
        ? clean($portrait->body ?? '', 'ciupac_content')
        : strip_tags($portrait->body ?? '', '<p><br><b><strong><i><em><ul><ol><li><h2><h3><h4><blockquote>');
    $aboutGallery = collect($asambleas)->take(3);
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    #mapid {
        min-height: 420px;
        width: 100%;
        border-radius: 1rem;
    }

    .reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity .7s ease, transform .7s ease;
    }

    .reveal.show {
        opacity: 1;
        transform: translateY(0);
    }

    .glass-card {
        background: rgba(255, 255, 255, .82);
        backdrop-filter: blur(8px);
    }

    .surface-gradient {
        background: radial-gradient(circle at top right, rgba(59, 130, 246, .18), transparent 45%), radial-gradient(circle at bottom left, rgba(14, 165, 233, .12), transparent 35%);
    }

    .logo-card img {
        filter: grayscale(100%);
        transition: filter .35s ease, transform .35s ease;
    }

    .logo-card:hover img {
        filter: grayscale(0%);
        transform: scale(1.03);
    }

    .map-popup-title {
        font-weight: 700;
        margin-bottom: 6px;
    }

    .map-popup-item {
        margin-top: 8px;
    }

    .map-popup-item img {
        border-radius: 8px;
    }
</style>

<div class="w-full overflow-x-hidden bg-slate-50 text-slate-800">
    <section class="relative overflow-hidden surface-gradient">
        <div class="mx-auto max-w-7xl px-4 pt-24 pb-14 sm:px-6 lg:px-8 lg:pt-28 lg:pb-20">
            <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
                <div class="reveal lg:col-span-7">
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl transition duration-500 hover:-translate-y-1 hover:shadow-2xl">
                        <img class="h-[320px] w-full object-cover sm:h-[430px]" src="{{ asset($portrait->image_path.'/'.$portrait->image_name) }}" alt="Portada CIUPAC">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/55 via-slate-900/15 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between gap-4 text-white">
                            <span class="inline-flex items-center rounded-full border border-white/40 bg-white/15 px-4 py-1 text-xs font-semibold uppercase tracking-widest">Proyecto CIUPAC</span>
                            <a href="#contactsection" class="inline-flex items-center rounded-full border border-white/45 bg-white/10 px-4 py-2 text-sm font-semibold transition hover:bg-white/25">Contactanos</a>
                        </div>
                    </div>
                </div>

                <div class="reveal lg:col-span-5">
                    <div class="glass-card rounded-3xl border border-slate-200 p-6 shadow-xl sm:p-8">
                        <img class="mb-5 h-16 w-auto" src="{{ asset('/public/images/Ciupac.jpeg') }}" alt="Logo CIUPAC" />
                        <h1 class="mb-3 text-3xl font-extrabold leading-tight text-slate-900 sm:text-4xl">{{ $portrait->title }}</h1>
                        <div class="prose prose-slate max-w-none text-base leading-relaxed">{!! $portraitBody !!}</div>
                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <a href="#news" class="inline-flex items-center rounded-xl bg-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600 hover:shadow-lg">Ver novedades</a>
                            <a href="#about" class="inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-slate-400 hover:shadow-md">Conocer más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" id="mediciones">
        <div class="reveal mb-10 text-center">
            <span class="inline-flex rounded-full bg-sky-100 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-sky-700">Proyecto CIUPAC</span>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Mediciones</h2>
            <p class="mx-auto mt-3 max-w-3xl text-sm leading-relaxed text-slate-600 sm:text-base">En esta sección podés explorar los distintos módulos de datos del proyecto y participar activamente registrando eventos y observaciones.</p>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            <a href="http://ciupacperfiles.iado-conicet.gob.ar/" class="reveal group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-sky-200 hover:shadow-xl">
                <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-lg bg-sky-100 text-sky-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 15l4-4 4 4 6-6"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Perfiles de Playa</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">Consultá las últimas mediciones de perfiles de playa de distintas localidades de la costa bonaerense.</p>
                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-sky-600 transition group-hover:gap-2">Ingresar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
            </a>

            <a href="http://ciupaceventos.iado-conicet.gob.ar/" class="reveal group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-sky-200 hover:shadow-xl">
                <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999A5 5 0 005 9.5"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Eventos y tormentas</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">Registrá daños y eventos térmicos en tu localidad para fortalecer la base de datos colaborativa.</p>
                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 transition group-hover:gap-2">Ingresar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
            </a>

            <a href="{{ route('estaciones') }}" class="reveal group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-sky-200 hover:shadow-xl">
                <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 13v-1m4 1v-3m4 3V8m-9 9h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Estaciones Meteorológicas</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">Seguí las mediciones en vivo de nuestras estaciones y su evolución temporal.</p>
                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 transition group-hover:gap-2">Ingresar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
            </a>

            <a href="http://ciupaccoastsnap.iado-conicet.gob.ar/" class="reveal group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-sky-200 hover:shadow-xl">
                <div class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18M7 3v4m10-4v4M5 11h14v9H5z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">CoastSnap</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">Pronto vas a poder sumar tus fotos de costa para analizar su variación temporal.</p>
                <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-amber-600 transition group-hover:gap-2">Ingresar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
            </a>
        </div>
    </section>

    @if($featuredPost)
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="reveal overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
            <div class="grid lg:grid-cols-12">
                <div class="relative h-64 lg:col-span-7 lg:h-full">
                    <img src="{{ asset($featuredPost->image_path.'/'.$featuredPost->image_name) }}" alt="Noticia destacada" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/65 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="mb-2 inline-flex rounded-full bg-white/20 px-3 py-1 text-xs font-semibold uppercase tracking-wider">Destacada</span>
                        <h2 class="text-2xl font-bold leading-tight sm:text-3xl">{{ $featuredPost->title }}</h2>
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div class="flex h-full flex-col justify-between p-6 sm:p-8">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wide text-sky-600">Última publicación</p>
                            <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">{{ $featuredPost->description }}</p>
                            <div class="mt-6 space-y-3 text-sm text-slate-600">
                                <a href="{{ route('showArchivos') }}" class="group flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 transition hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700">
                                    <span class="font-semibold">Archivos de interés</span>
                                    <span class="transition group-hover:translate-x-1">→</span>
                                </a>
                                <a href="{{ route('showTutoriales') }}" class="group flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 transition hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700">
                                    <span class="font-semibold">Tutoriales</span>
                                    <span class="transition group-hover:translate-x-1">→</span>
                                </a>
                                <a href="{{ route('showLinks') }}" class="group flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 transition hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700">
                                    <span class="font-semibold">Entrevistas</span>
                                    <span class="transition group-hover:translate-x-1">→</span>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('showPost', ['id' => $featuredPost->id]) }}" class="mt-8 inline-flex w-full items-center justify-center rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-slate-800 hover:shadow-lg">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <a id="news"></a>
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <span class="inline-flex rounded-full bg-slate-200 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-slate-700">Novedades</span>
                <h2 class="mt-3 text-3xl font-bold text-slate-900 sm:text-4xl">Últimas Noticias</h2>
            </div>
            <a href="{{ route('showNoticias') }}" class="inline-flex items-center rounded-xl bg-sky-500 px-4 py-2 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600">Ver más...</a>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach($posts as $post)
                @if(!$loop->first)
                    <article class="reveal group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative overflow-hidden">
                            <img class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset($post->image_path.'/'.$post->image_name) }}" alt="{{ $post->title }}">
                            <span class="absolute left-3 top-3 rounded-full bg-white/90 px-2.5 py-1 text-[11px] font-semibold text-slate-700">{{ $post->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="text-lg font-semibold leading-snug text-slate-900">{{ $post->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ Str::limit($post->description, 90) }}</p>
                            <a class="mt-auto pt-4 text-sm font-semibold text-sky-600 transition hover:text-sky-700" href="{{ route('showPost', ['id' => $post->id]) }}">Leer más →</a>
                        </div>
                    </article>
                @endif
            @endforeach
        </div>
    </section>

    <a id="about"></a>
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-12">
            <div class="reveal lg:col-span-6">
                <div class="grid grid-cols-2 gap-4">
                    @forelse($aboutGallery as $galleryAsamblea)
                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm {{ $loop->first ? 'col-span-2' : '' }}">
                            <img src="{{ asset($galleryAsamblea->image_path.'/'.$galleryAsamblea->image_name) }}" alt="{{ $galleryAsamblea->name }}" class="h-52 w-full object-cover transition duration-500 hover:scale-105 {{ $loop->first ? 'sm:h-64' : 'sm:h-52' }}">
                        </div>
                    @empty
                        <div class="col-span-2 rounded-2xl border border-dashed border-slate-300 p-10 text-center text-slate-500">Sin imágenes disponibles</div>
                    @endforelse
                </div>
            </div>
            <div class="reveal lg:col-span-6">
                <span class="inline-flex rounded-full bg-sky-100 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-sky-700">Proyecto CIUPAC</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl">Nosotros</h2>
                <div class="prose prose-slate mt-5 max-w-none leading-relaxed">{!! $aboutBody !!}</div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="reveal overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <div class="grid gap-6 p-6 lg:grid-cols-12 lg:p-8">
                <div class="lg:col-span-4">
                    <h2 class="text-2xl font-bold text-slate-900">Localidades</h2>
                    <p class="mt-2 text-sm text-slate-600">Explorá las asambleas disponibles por ubicación.</p>
                    <ul class="mt-5 max-h-[320px] divide-y divide-slate-200 overflow-y-auto rounded-xl border border-slate-200">
                        @foreach($asambleas as $asamblea)
                            <li class="px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-700">
                                <a href="{{ route('showAsamblea', ['id' => $asamblea->id]) }}" class="block">{{ $asamblea->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="lg:col-span-8">
                    <div id="mapid" class="z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <a name="team"></a>
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="reveal mb-10 text-center">
            <span class="inline-flex rounded-full bg-indigo-100 px-4 py-1 text-xs font-semibold uppercase tracking-wide text-indigo-700">Equipo</span>
            <h2 class="mt-3 text-3xl font-bold text-slate-900 sm:text-4xl">Conocé a nuestro equipo</h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($members as $member)
                <article class="reveal group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="relative h-72 overflow-hidden">
                        <img alt="{{ $member->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset($member->image_path.'/'.$member->image_name) }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>
                        <div class="absolute inset-x-4 bottom-4 translate-y-3 text-sm text-white opacity-0 transition duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                            <p class="line-clamp-5 whitespace-pre-line text-xs leading-relaxed">{{ $member->description }}</p>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <p class="text-lg font-semibold text-slate-900">{{ $member->name }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $member->email }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
        <div class="space-y-14 text-center text-slate-800">
            <div class="reveal">
                <h2 class="text-2xl font-bold sm:text-3xl">Instituciones contrapartes</h2>
                <div class="mt-8 grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach($logos as $logo)
                        <div class="logo-card rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                            <img src="{{ asset($logo->image_path.'/'.$logo->image_name) }}" class="mx-auto h-16 w-auto object-contain" alt="Logo contraparte">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal">
                <h2 class="text-2xl font-bold sm:text-3xl">Financia</h2>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($logos1 as $logo)
                        <div class="logo-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:shadow-md">
                            <img src="{{ asset($logo->image_path.'/'.$logo->image_name) }}" class="mx-auto h-20 w-auto object-contain" alt="Logo financia">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal">
                <h2 class="text-2xl font-bold sm:text-3xl">Instituciones que nos acompañan</h2>
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($logos2 as $logo)
                        <div class="logo-card rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
                            <img src="{{ asset($logo->image_path.'/'.$logo->image_name) }}" class="mx-auto h-16 w-auto object-contain" alt="Logo institución">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <a name="contactsection"></a>
    <section class="relative overflow-hidden py-16">
        <div class="absolute inset-0 opacity-20" style="background-image:url({{ asset($about->image_path.'/'.$about->image_name) }});background-size:cover;background-position:center"></div>
        <div class="absolute inset-0 bg-slate-900/70"></div>

        <div class="relative mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="reveal rounded-3xl border border-white/25 bg-white/10 p-6 shadow-2xl backdrop-blur sm:p-10">
                <h2 class="text-center text-3xl font-extrabold text-white sm:text-4xl">Contactanos</h2>
                <p class="mx-auto mt-3 max-w-xl text-center text-sm text-slate-200 sm:text-base">Hacenos conocer tu inquietud. Te respondemos a la brevedad.</p>

                <form id="myForm" class="mt-8 space-y-5">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-white">E-mail</label>
                        <input name="email" type="email" id="email" class="w-full rounded-xl border border-white/30 bg-white/90 px-4 py-3 text-sm text-slate-900 shadow-sm transition focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div>
                        <label for="subject" class="mb-2 block text-sm font-semibold text-white">Título</label>
                        <input name="name" type="text" id="subject" class="w-full rounded-xl border border-white/30 bg-white/90 px-4 py-3 text-sm text-slate-900 shadow-sm transition focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div>
                        <label for="message" class="mb-2 block text-sm font-semibold text-white">Mensaje</label>
                        <textarea name="message" id="message" rows="6" class="w-full rounded-xl border border-white/30 bg-white/90 px-4 py-3 text-sm text-slate-900 shadow-sm transition focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-300" required></textarea>
                    </div>
                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-sky-500 px-6 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-sky-600 hover:shadow-xl sm:w-auto">Enviar mensaje</button>
                </form>
            </div>
        </div>
    </section>

    @include('layouts.footerPage',['conf'=>$conf])
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const revealItems = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        revealItems.forEach((item, index) => {
            item.style.transitionDelay = (index % 6) * 60 + 'ms';
            observer.observe(item);
        });
    });
</script>

<script>
    var greenIcon = L.icon({
        iconUrl: "{{ url('/public/images/iconomalvinas.ico') }}",
        iconSize: [159, 120],
        shadowSize: [50, 64],
        iconAnchor: [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    });

    var southWest = L.latLng(-20.712, -77.227),
        northEast = L.latLng(-41.774, -42.227),
        bounds = L.latLngBounds(southWest, northEast);

    var mymap = L.map('mapid', {
        maxBounds: bounds,
        minZoom: 7,
        maxZoom: 12,
    }).setView([-38.505, -62.09], 4);

    mymap.setZoom(8);
    L.marker([-52.7, -61.29], {
        icon: greenIcon
    }).addTo(mymap);

    var app = @json($locations);
    var aux = @json($asambleas);

    app.forEach(element => {
        var display = `<h1 class="map-popup-title">${element.name}</h1>`;
        var asambleas = aux.filter(asamblea => asamblea.location_id == element.id);

        asambleas.forEach(asamblea =>
            display += `
            <div class="map-popup-item">
                <a href="/asamblea/${asamblea.id}">
                    <img alt="asamblea" src="/${asamblea.image_path}/${asamblea.image_name}" />
                    <span>${asamblea.name}</span>
                </a>
            </div>
            `
        );

        var marker = L.marker([element.latitude, element.longitude]).addTo(mymap);
        marker.bindPopup(display);
    });

    L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
</script>

<script>
    $('#myForm').on('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const username = $('[name="name"]').val();
        const email = $('[name="email"]').val();
        const message = $('[name="message"]').val();

        formData.append('from_name', username);
        formData.append('message', message);
        formData.append('email', email);
        formData.append('service_id', 'service_9dgk7kn');
        formData.append('template_id', 'template_xkto9ir');
        formData.append('user_id', 'user_KRxr45LRpsTkhXElJp8Wx');

        $.ajax('https://api.emailjs.com/api/v1.0/email/send-form', {
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false
        }).done(function () {
            alert('Tu mail fue enviado!');
            $('#myForm')[0].reset();
        }).fail(function (error) {
            alert('Oops... ' + JSON.stringify(error));
        });
    });
</script>

@endsection
