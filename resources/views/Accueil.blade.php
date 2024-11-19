<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MaterailM Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    /* Personnalisation globale */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f6f9;
    }

    /* Personnalisation du bouton "Partager votre article" */
    .custom-button {
      padding: 12px 25px;
      background-color: #007bff;
      color: white;
      border: 2px solid #007bff;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      transition: all 0.3s ease;
      margin-top: 30px;
      width: 100%;
      display: block;
    }

    .custom-button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .custom-button:focus {
      outline: none;
      box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
    }

    /* Sidebar - Couleurs et effet */
    .left-sidebar {
      background-color: #2a3d47;
      width: 250px;
      position: fixed;
      height: 100%;
      padding-top: 20px;
      transition: all 0.3s ease;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    }

    .brand-logo {
      padding: 10px;
      text-align: center;
    }

    .brand-logo img {
      max-width: 150px;
    }

    .sidebar-nav {
      padding-left: 0;
    }

    .sidebar-nav .sidebar-item {
      padding: 12px;
      list-style: none;
      transition: background-color 0.3s ease;
    }

    .sidebar-nav .sidebar-item a {
      color: #c1c1c1;
      text-decoration: none;
      display: flex;
      align-items: center;
      font-size: 16px;
      padding: 8px 15px;
      width: 100%;
      transition: color 0.3s ease;
    }

    .sidebar-nav .sidebar-item a:hover {
      color: #ffffff;
      background-color: #1f2a33;
    }

    /* Profil Dropdown */
    .dropdown-menu {
      background-color: #2a3d47;
      border-radius: 8px;
      border: none;
      padding: 10px;
    }

    .dropdown-menu .dropdown-item {
      color: #c1c1c1;
      font-size: 16px;
      padding: 10px;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #1f2a33;
      color: white;
    }

    /* Navbar et éléments */
    .navbar-nav .nav-item .nav-link {
      color: #333;
      font-size: 16px;
      font-weight: 600;
      padding: 10px 15px;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-item .nav-link:hover {
      color: #007bff;
    }

    /* Espacement navbar */
    .navbar-nav .nav-item {
      margin-left: 15px;
    }

    /* Corps principal avec la sidebar */
    .body-wrapper {
      margin-left: 250px; /* Espace pour la sidebar */
      padding: 20px;
    }

    /* Header */
    .app-header {
      background-color: transparent !important;  /* Annule le fond par défaut */
      box-shadow: none !important;  /* Supprime l'ombre */
    }

    .navbar {
      background-color: transparent !important;  /* Annule le fond de la navbar elle-même */
    }

    /* Avatar du profil */
    .navbar-nav .nav-item img {
      border-radius: 50%;
    }

    /* Section Articles */
    .articles-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .article {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      padding: 15px;
      display: flex;
      flex-direction: column;
    }

    .article:hover {
      transform: translateY(-5px);
    }

    .article-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .article .title {
      font-size: 22px;
      font-weight: bold;
      margin: 15px 0;
      color: #333;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Ajout des boutons modifier/supprimer */
    .article .title .action-buttons {
      display: flex;
      gap: 10px;
    }

    .article .title .action-buttons button {
      background: transparent;
      border: none;
      cursor: pointer;
      font-size: 18px;
      color: #007bff;
      transition: color 0.3s ease;
    }

    .article .title .action-buttons button:hover {
      color: #0056b3;
    }

    .article .author {
      font-size: 14px;
      color: #777;
    }

    .article .excerpt {
      font-size: 16px;
      color: #555;
      margin: 10px 0;
    }

    .article .read-more {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
      margin: 10px 0 15px;
      display: inline-block;
      padding: 6px 15px;
      border: 1px solid #007bff;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .article .read-more:hover {
      background-color: #007bff;
      color: white;
    }

    /* Adaptabilité mobile */
    @media (max-width: 768px) {
      .left-sidebar {
        width: 80px;
      }

      .body-wrapper {
        margin-left: 80px;
      }

      .navbar-nav .nav-item {
        margin-left: 10px;
      }

      .articles-container {
        grid-template-columns: 1fr;
      }

      .article {
        width: 100%;
      }
      /* Ajout du fond sous la barre de recherche et le profil */
      .navbar-collapse {
        background-color: #f8f9fa; /* Couleur de fond légère */
        padding: 10px 20px; /* Padding pour espacer les éléments */
        border-radius: 8px; /* Bord arrondi */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre légère sous la barre */
      }

      /* Pour la barre de recherche */
      .navbar-nav .nav-item form {
        margin-right: 20px; /* Espacement à droite pour ne pas coller les éléments */
      }

      /* Pour l'image du profil et son menu */
      .navbar-nav .nav-item.dropdown {
        margin-left: 15px; /* Espacement entre les éléments de la navbar */
      }

    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo.svg" alt="Logo"/>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu" style="color:white">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/acceuil" aria-expanded="false">
                <iconify-icon icon="solar:widget-add-line-duotone"></iconify-icon>
                <span class="hide-menu" style="color:white"> Accueil</span>
              </a>
            </li>
            <li><span class="sidebar-divider lg"></span></li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/home" aria-expanded="false">
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                <span class="hide-menu" style="color:white">Vos articles</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/affichercategories" aria-expanded="false">
                <iconify-icon icon="solar:danger-circle-line-duotone"></iconify-icon>
                <span class="hide-menu" style="color:white">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <iconify-icon icon="solar:bookmark-square-minimalistic-line-duotone"></iconify-icon>
                <span class="hide-menu" style="color:white">Favorites</span>
              </a>
            </li>
            <li style="color:blue">
              <a href="{{ route('ajouter') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 custom-button-wrapper">
                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md bg-blue-500 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition duration-150 ease-in-out custom-button">
                  {{ __('Partager votre article') }}
                </button>
              </a>
            </li>
            <li><span class="sidebar-divider lg"></span></li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
    </aside>

    <!-- Main Content -->
    <div class="body-wrapper">
      <!-- Header Start -->
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <!-- Barre de recherche -->
        <li class="nav-item">
          <form class="d-flex" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="query">
            <button class="btn btn-outline-primary" type="submit">
              <i class="ti ti-search"></i> <!-- Icône de recherche -->
            </button>
          </form>
        </li>
        <!-- Profil dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <form method="GET" action="{{ route('profile.edit') }}">
                <center><div style="color:lightblue">{{ Auth::user()->name }}</div></center>
                @csrf
                <button type="submit" class="d-flex align-items-center gap-2 dropdown-item btn btn-link text-decoration-none text-left">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">{{ __('Profile') }}</p>
                </button>
              </form>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="d-flex align-items-center gap-2 dropdown-item btn btn-link text-decoration-none text-left" onclick="event.preventDefault(); this.closest('form').submit();">
                  <i class="ti ti-mail fs-6"></i>
                  <p class="mb-0 fs-3">{{ __('Log Out') }}</p>
                </button>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Header End -->


      <!-- Articles Section -->
      <div class="articles-container" style="margin_top:100px">
          @foreach($articles as $article)
              <article class="article" style="margin-top:50px">
                  <img src="{{ $article->image ? asset('storage/images/' . $article->image) : 'https://via.placeholder.com/800x400' }}" 
                       alt="Image de l'article" class="article-image">
                  <h1 class="title">{{ $article->title }}</h1>
                  @foreach($categories as $category)
                      <h6>{{ $category->name }}</h6>
                  @endforeach
                  <div class="excerpt">
                      <label for="content">{{ $article->excerpt }}</label>
                  </div>
                  <div class="datetime" style="color:blue">
                      <label for="datetime">{{ $article->published_at }}</label>
                  </div>
                  <label>{{ $article->user->name }}</label>
                  <a href="{{ route('articles.show', $article->id) }}" class="read-more">Lire la suite</a>
              </article>
          @endforeach
      </div>

    </div>
  </div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>  
</html>
