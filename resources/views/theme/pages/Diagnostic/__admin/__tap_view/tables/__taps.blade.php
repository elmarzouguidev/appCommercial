<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#diagnistique-attend" role="tab">
            <span class="badge rounded-pill bg-info float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'en-attent-de-devis'))
                    {{ count($tickets['en-attent-de-devis']) }}
                @else
                    0
                @endif
            </span>
            <span class="d-none d-sm-block">en attente de devis</span>
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-attend-bc" role="tab">
            <span class="badge rounded-pill bg-info float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'en-attent-de-bc'))
                    {{ count($tickets['en-attent-de-bc']) }}
                @else
                    0
                @endif
            </span>
            <span class="d-none d-sm-block">en attente de BC</span>
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-non" role="tab">
            <span class="badge rounded-pill bg-warning float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'retour-non-reparable'))
                    {{ count($tickets['retour-non-reparable']) }}
                @else
                    0
                @endif
            </span>
            <span class="d-none d-sm-block">Retour non reparable</span>
        </a>
    </li>
</ul>
