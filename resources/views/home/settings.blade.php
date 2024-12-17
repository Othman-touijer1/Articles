<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MaterialM Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    /* Global Styles */
    body {
      font-family: 'Helvetica Neue', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f7f7f7;
      color: #444;
    }

    /* Sidebar */
    .left-sidebar {
      background-color: #333;
      width: 270px;
      position: fixed;
      height: 100%;
      padding-top: 20px;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      color: #fff;
    }

    .brand-logo img {
      max-width: 120px;
      margin: 0 auto;
      display: block;
    }

    .sidebar-nav {
      padding-left: 0;
    }

    .sidebar-nav .sidebar-item {
      list-style: none;
      transition: background-color 0.3s ease;
    }

    .sidebar-nav .sidebar-item a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      font-size: 18px;
      padding: 12px 20px;
      width: 100%;
      transition: color 0.3s ease;
    }

    .sidebar-nav .sidebar-item a:hover {
      background-color: #4e5b66;
      color: #c1c1c1;
    }

    .sidebar-nav .sidebar-item.active a {
      background-color: #007bff;
      color: white;
    }

    /* Main Content Area */
    .body-wrapper {
      margin-left: 270px;
      padding: 30px;
      background-color: #fff;
      min-height: 100vh;
      transition: margin-left 0.3s ease;
    }

    /* Navbar */
    .app-header {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
      color: #444;
      font-size: 16px;
      font-weight: 600;
      padding: 12px 18px;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #007bff;
    }

    /* Articles Section */
    .articles-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }

    .article {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      padding: 20px;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .article:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .article-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
    }

    .article .title {
      font-size: 24px;
      font-weight: 700;
      margin: 20px 0;
      color: #333;
      transition: color 0.3s ease;
    }

    .article .excerpt {
      font-size: 18px;
      color: #555;
      margin-bottom: 20px;
    }

    .article .read-more {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
      border: 1px solid #007bff;
      padding: 10px 20px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .article .read-more:hover {
      background-color: #007bff;
      color: #fff;
    }

    .article .author {
      font-size: 16px;
      color: #777;
    }

    .article .datetime {
      font-size: 14px;
      color: #aaa;
    }

    /* Button Styles */
    .custom-button {
      padding: 14px 30px;
      background-color: #007bff;
      color: white;
      border: 2px solid #007bff;
      border-radius: 50px;
      font-size: 18px;
      font-weight: 600;
      text-align: center;
      display: block;
      width: 100%;
      margin-top: 30px;
      transition: all 0.3s ease;
    }

    .custom-button:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .custom-button:focus {
      outline: none;
      box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
    }

    /* Responsive Design */
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

      /* Navbar and Dropdown Adjustments */
      .navbar-collapse {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
      }

      .navbar-nav .nav-item form {
        margin-right: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    <!-- Sidebar -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo.svg" alt="Logo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>

        <!-- Sidebar navigation -->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
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
              <a class="sidebar-link" href="{{ route('user.article') }}" aria-expanded="false">
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="/adminpage" aria-expanded="false">
                <iconify-icon icon="solar:bookmark-square-minimalistic-line-duotone"></iconify-icon>
                <span class="hide-menu" style="color:white">Admin page</span>
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
              <form class="d-flex" method="GET" action="" >
                  <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="search" value="" style="margin-right:70px">
                  <button class="btn btn-outline-primary" type="submit">
                      <i class="ti ti-search"></i> <!-- Icône de recherche -->
                  </button>
              </form>

              <!-- Icône de paramètres à côté de la barre de recherche -->
              <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" id="settings-icon" aria-expanded="false">
                      <iconify-icon icon="solar:settings-line-duotone" style="font-size: 1.5rem; color: #007bff;"></iconify-icon> <!-- Icône de paramètres -->
                  </a>
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
      <!-- Formulaire d'email -->
       
      <div class="email-form-container">
            <h3>Paramètres d'Email</h3>
            <form method="POST" action="/settings/email">
                @csrf
                <div class="form-group">
                    <label for="email_delay">Délai avant envoi de l'email (en minutes)</label>
                    <input type="number" name="email_delay" id="email_delay" min="1" value="{{ old('email_delay', $settings->email_delay ?? 1) }}" required>
                </div>
                <div class="form-group">
                    <label for="email_content">Contenu de l'Email</label>
                    <textarea class="form-control" id="email_content" name="email_content" rows="5" placeholder="Entrez le contenu de l'email">{{ old('email_content', $settings->email_content ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>

            


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
<style>
    /* Formulaire Email */
.email-form-container {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin-top: 40px;
}

.email-form-container h3 {
  font-size: 24px;
  font-weight: 700;
  color: #333;
  margin-bottom: 20px;
}

.email-form-container .form-group {
  margin-bottom: 20px;
}

.email-form-container label {
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.email-form-container .form-control {
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 10px;
  width: 100%;
}

.email-form-container .form-control:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.email-form-container button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 12px 30px;
  font-size: 16px;
  font-weight: 600;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.email-form-container button:hover {
  background-color: #0056b3;
}

</style>
