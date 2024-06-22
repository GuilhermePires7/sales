

<header class="p-3 text-bg-dark">
    <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('sales.index') }}" class="nav-link px-2 text-white">Nova venda</a></li>
                <li><a href="{{ route('customers.index') }}" class="nav-link px-2 text-white">Clientes</a></li>
                <li><a href="{{ route('products.index') }}" class="nav-link px-2 text-white">Produtos</a></li>

                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>
                @auth
                <li><a href="{{ route('site.sale') }}" class="nav-link px-2 text-white">Nova venda</a></li>
                <li><form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" class="nav-link px-2 text-white"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair</a>
                </form></li>
                @endauth
                @guest
                <div class="text-end">
                    <li><a href="/login" class="nav-link px-2 text-white">Entrar</a></li>
                    <li><a href="/register" class="nav-link px-2 text-white">Cadastrar</a></li>
                </div>
                @endguest

            </div>
            </div>
    </header>
