<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#diagnistique-open" role="tab">
            <span class="badge rounded-pill bg-info float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'ouvert'))
                    {{ count($tickets['ouvert']) }}
                @else
                    0
                @endif
            </span>
            <span class="d-none d-sm-block">Diagnostique ouverts</span>
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-wait" role="tab">
            <span class="badge rounded-pill bg-warning float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'en-attent-de-devis'))
                    {{ count($tickets['en-attent-de-devis']) }}
                @else
                    0
                @endif
            </span>
            <span class="d-none d-sm-block">Diagnostique envoyeé en attente de devis</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-repare" role="tab">
            <span class="badge rounded-pill bg-info float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'a-preparer'))
                    {{ count($tickets['a-preparer']) }}
                @else
                  0
                @endif
            </span>
            <span class="d-none d-sm-block">Produits a réparer</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-repare-encours" role="tab">
            <span class="badge rounded-pill bg-info float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'encours-de-reparation'))
                    {{ count($tickets['encours-de-reparation']) }}
                @else
                  0
                @endif
            </span>
            <span class="d-none d-sm-block">Produits en cours de réparation</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-repare-done" role="tab">
            <span class="badge rounded-pill bg-success float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'pret-a-etre-livre'))
                    {{ count($tickets['pret-a-etre-livre']) }}
                @else
                  0
                @endif
            </span>
            <span class="d-none d-sm-block">Produits réparé</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#diagnistique-cancled" role="tab">
            <span class="badge rounded-pill bg-danger float-end" style="font-size: 1rem;">
                @if (Arr::exists($tickets, 'annuler'))
                    {{ count($tickets['annuler']) }}
                @else
                  0
                @endif
            </span>
            <span class="d-none d-sm-block">Annuler par L'administration</span>
        </a>
    </li>
</ul>
