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
    }

    /* Séparateurs dans la sidebar */
    .sidebar-divider {
      border-bottom: 1px solid #444;
      margin: 15px 0;
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

    /* Section Categories (Tableau des catégories) */
    .categories-table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
    }

    .categories-table th, .categories-table td {
      padding: 15px;
      text-align: left;
      border: 1px solid #ddd;
    }

    .categories-table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    .categories-table td {
      background-color: #fff;
    }

    .categories-table tr:hover {
      background-color: #f1f1f1;
    }

    /* Boutons d'édition et suppression */
    .action-buttons button {
      background-color: transparent;
      border: none;
      color: #007bff;
      cursor: pointer;
      font-size: 18px;
      transition: color 0.3s ease;
    }

    .action-buttons button:hover {
      color: #0056b3;
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

      .categories-table th, .categories-table td {
        padding: 10px;
      }
    }

    /* Bouton "Ajouter une catégorie" centré */
    .add-category-button {
      display: inline-block;
      margin-top: 20px;
      padding: 8px 16px;
      background-color: blue; /* Vert pour ajouter */
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .add-category-button:hover {
      background-color: #218838;
    }

    /* Formulaire d'ajout de catégorie caché */
    .category-form {
      display: none;
      margin-top: 30px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .category-form input,
    .category-form button {
      padding: 10px;
      margin: 10px 0;
      width: 100%;
      font-size: 14px;
    }

    .category-form button {
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .category-form button:hover {
      background-color: #218838;
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
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
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
              <a class="sidebar-link" href="" aria-expanded="false">
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
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Page Content -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header header-light">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
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
        </nav>
      </header>

      <!-- Table des Categories -->
      <div class="table-responsive">   
      <table class="categories-table" style="margin-top:100px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td class="action-buttons">
                    <!-- Edit button with link -->
                    <a href="{{ route('categorie.edit', ['id' => $category->id]) }}" class="edit-btn">
                        <button>
                            <iconify-icon icon="material-symbols:edit-outline"></iconify-icon>
                            Edit
                        </button>
                    </a>
                    <!-- Delete button with link -->
                    <a href="{{ route('categorie.destroy', ['id' => $category->id]) }}" class="delete-btn" data-method="DELETE" data-id="{{ $category->id }}">
                        <button>
                            <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>
                            Delete
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

        <!-- Bouton Ajouter une catégorie -->
        <div class="text-center">
          <button class="add-category-button" onclick="toggleForm()">Ajouter une catégorie</button>
        </div>

        <!-- Formulaire d'ajout de catégorie -->
        <div class="category-form" id="categoryForm">
          <form method="POST" action="{{ route('categorie.store') }}">
            @csrf
            <label for="categoryName">Nom de la catégorie :</label>
            <input type="text" name="name" id="categoryName" required placeholder="Entrez le nom de la catégorie">

            <button type="submit">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script pour afficher/masquer le formulaire -->
  <script>
    function toggleForm() {
      const form = document.getElementById('categoryForm');
      form.style.display = form.style.display === 'block' ? 'none' : 'block';
    }
  </script>

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
