<nav class="navbar navbar-expand-lg navbar-theme fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MSIB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.product') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.category') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.cart') }}">Cart</a>
                </li>
            </ul>
        </div>  
    </div>
</nav>
