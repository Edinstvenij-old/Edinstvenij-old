<li class="nav-item dropdown">
    <a id="cashiersList" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Cashiers
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cashiersList">
        <a class="dropdown-item" href="{{ route('cashiers.create') }}">
            Create Cashiers
        </a>
        <a class="dropdown-item" href="{{ route('cashiers.index') }}">
            All Cashiers
        </a>
    </div>
</li>

<li class="nav-item dropdown">
    <a id="exchangersList" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Exchangers
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="exchangersList">
        <a class="dropdown-item" href="{{ route('exchangers.create') }}">
            Create Exchangers
        </a>
        <a class="dropdown-item" href="{{ route('exchangers.index') }}">
            All Exchangers
        </a>
    </div>
</li>
