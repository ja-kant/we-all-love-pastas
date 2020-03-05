<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        @if (count($publicListing))
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Последние публичные пасты</span>
        </h6>
        @endif
        <ul class="nav flex-column mb-2">
            @forelse ($publicListing as $pl)
            <li class="nav-item">
                <a class="nav-link" href="{{ url("/" . $pl->uid) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>

                    @if ($pl->title)
                    {{$pl->title}}
                    @else    
                    Без имени
                    @endif                    
                    <div class="nav-time"><small>{{ \App\formatDatetime($pl->created_at) }}</small></div>
                </a>
            </li>
            @empty
                <div class="alert alert-primary" role="alert">
                    Создайте публичную пасту, и она появится здесь!
                </div>
            @endforelse
        </ul>
    </div>
</nav>