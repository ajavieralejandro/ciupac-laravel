@php
    $title = $title ?? '';
    $breadcrumbs = $breadcrumbs ?? [];
    $actions = $actions ?? null;
@endphp

<div class="d-flex flex-wrap align-items-start justify-content-between mb-3">
    <div>
        <h4 class="mb-1">{{ $title }}</h4>

        @if(!empty($breadcrumbs))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    @foreach($breadcrumbs as $breadcrumb)
                        @php
                            $label = is_array($breadcrumb) ? ($breadcrumb['label'] ?? '') : (string) $breadcrumb;
                            $url = is_array($breadcrumb) ? ($breadcrumb['url'] ?? null) : null;
                        @endphp

                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current=page' : '' }}>
                            @if(!$loop->last && $url)
                                <a href="{{ $url }}">{{ $label }}</a>
                            @else
                                {{ $label }}
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        @endif
    </div>

    <div class="d-flex align-items-center gap-2">
        @if($actions)
            {!! $actions !!}
        @endif
    </div>
</div>
