<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm mb-4 custom-navbar">


    <div class="container-fluid">

        {{-- LOGO + POS --}}
<a class="navbar-brand fw-bold d-flex align-items-center"
href="{{ route('info') }}">

<img src="{{ asset('images/logo2.jpg') }}"
alt="Logo POS"
class="navbar-logo">

<span>POS</span>

</a>


          


        {{-- TOMBOL MOBILE --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                       <i class="bi bi-house-heart-fill"></i>
                        Dashboard
                    </a>
                </li>

@if(auth()->check() && auth()->user()->role->name === 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="bi bi-tags me-2"></i>
            Users
        </a>
    </li>
@endif





                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('jenis-produk.index') }}">
                         <i class="bi bi-tags me-2"></i>
                        Jenis Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk') }}">
                         <i class="bi bi-box-seam me-2"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/penjualan') }}">
                        <i class="bi bi-cart-check me-2"></i>
                        Penjualan
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">
                         <i class="bi bi-person-vcard me-2"></i>
                        Profile
                    </a>
                </li>

            </ul>


            {{-- LOGOUT --}}
            @auth

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-info text-white fw-bold">

                        Logout

                    </button>

                </form>

            @endauth

        </div>

    </div>

</nav>


<style>
.custom-navbar {
    width: calc(100% - 60px);
    margin: 24px auto 20px auto !important;
    border-radius: 0 !important;
}

.custom-navbar .container-fluid {
    padding-left: 12px !important;
    padding-right: 12px !important;
}

.custom-navbar .navbar-logo {
    width: 38px;
    height: 38px;
    object-fit: contain;
    margin-right: 10px;
}

.custom-navbar .navbar-brand {
    margin-right: 20px !important;
}

.custom-navbar .nav-link {
    padding-left: 8px !important;
    padding-right: 8px !important;
}

.custom-navbar .btn {
    padding: 8px 14px !important;
    border-radius: 10px !important;
}

@media (max-width: 767px) {
    .custom-navbar {
        width: calc(100% - 30px);
    }
}


</style>