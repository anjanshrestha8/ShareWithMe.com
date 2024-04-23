<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"></span>{{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login"><button
                                class="btn btn-info">Login</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register"><button class="btn btn-outline-info">Register</button></a>
                    </li>
                @endguest

                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><button
                                class="btn btn-primary">{{ Auth::user()->name }}</button></a>
                    </li>
                    <li class="nav-item mt-2">
                        <form action={{ route('logout') }} method="post">
                            @csrf
                            <button class="btn btn-outline-danger">Log Out</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
