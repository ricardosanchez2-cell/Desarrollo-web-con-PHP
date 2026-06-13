
<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    //usuario logeado
    header("Location: ../user/login/");
    exit(); //siempre que haya un redireccionamiento
}
   

$ruta = ['assets' => '../../', 'components' => '../'];
$_SESSION['ruta'] = $ruta;
?>

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_SESSION['titulos']['webTitle']; ?></title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
      (() => {
        'use strict';
        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage may be unavailable (private mode, sandboxed iframe).
        }
        const prefersDark = globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
        // Mirror the resolution in _scripts.astro: explicit "dark"/"light" win,
        // otherwise ("auto" or unset) fall back to the OS preference.
        let resolved = 'light';
        if (stored === 'light' || stored === 'dark') {
          resolved = stored;
        } else if (prefersDark) {
          resolved = 'dark';
        }
        document.documentElement.setAttribute('data-bs-theme', resolved);
        document.documentElement.style.colorScheme = resolved;
      })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light" />
   <meta name="theme-color" content="#ffffff" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | General UI Elements" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="<?php echo $ruta['assets']; ?>/assets/css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php echo $ruta['assets']; ?>assets/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
        <!--begin::Container-->
        <?php include_once ($ruta['components'].'/components/navbar-v1.php'); ?>
        <!--end::Container-->
      
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include_once ($ruta['components'].'/components/aside-v1.php'); ?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Mantenedor de Usuarios</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/Desarrollo-web-con-PHP/backoffice/">Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                  <li class="breadcrumb-item active" aria-current="page"><button class = "btn btn-sm btn-outline-primary">Agregar +</button></li> 
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
            <div class="col-12">
                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                   <strong>Tipo!</strong>  mensaje <?php echo $msgError;  ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                
            </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-12"><
                <!--begin::Accordion-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Lista de Usuarios del Sistema</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
      
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">#</th>
                          <th scope="col">Nombre completo</th>
                          <th scope="col">Estado</th>
                          <th style="width: 40px" scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td>1.</td>
                          <td>Rick Sorkin</td>
                          <td>
                            <span class="badge text-bg-success">Activo</span>
                          </td>
                          <td>
                           <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class = "bi bi-list"></i>
                      </button>
                      <ul class="dropdown-menu show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 40px, 0px);" data-popper-placement="bottom-start">
                        <li><a class="dropdown-item" href="#">Ver</a></li>
                        <li>
                          <a class="dropdown-item" href="#">Editar</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Apagar</a>
                       
                          <a class="dropdown-item" href="#">Encender</a>
                        </li>
                      </ul>
                    </div> 
                       </td>
                        </tr>


                        <tr class="align-middle">
                          <td>2.</td>
                          <td> Luis Litt</td>
                          <td>
                            <span class="badge text-bg-success">Activo</span>
                          </td>
                          <td>
                           <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class = "bi bi-list"></i>
                      </button>
                      <ul class="dropdown-menu show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 40px, 0px);" data-popper-placement="bottom-start">
                        <li><a class="dropdown-item" href="#">Ver</a></li>
                        <li>
                          <a class="dropdown-item" href="#">Editar</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Apagar</a>
                       
                          <a class="dropdown-item" href="#">Encender</a>
                        </li>
                      </ul>
                    </div> 
                       </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
                  <!--end::Body-->
                </div>
                <!--end::Accordion-->
                <!--begin::Alert-->
              </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                 
                  <!--end::Body-->
                <!--end::Alert-->
                <!--begin::Badge-->
                
                <!--end::Badge-->
                <!--begin::Button-->
               
                <!--end::Button-->
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6">
                <!--begin::Button Group-->
                
                <!--end::Button Group-->
                <!--begin::Collapse-->
             
                <!--end::Collapse-->
                <!--begin::Dropdowns-->
                  <!--begin::Header-->
                  
                  <!--end::Header-->
                  <!--begin::Body-->
                  
                  <!--end::Body-->
                               <!--end::Dropdowns-->
                <!--begin::List Group-->
                
                <!--end::List Group-->
                <!--begin::Navbar-->
                
                <!--end::Pagination-->
                <!--begin::Placeholder-->
     
                <!--end::Toast-->
                <!--begin::Tooltip-->
                
                <!--end::Spinner-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
     <?php include_once ($ruta['components'].'/components/footer-v1.php'); ?>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?php echo $ruta['assets']; ?>assets/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure--><!--begin::Color Mode Toggle (#6010)-->
    <script>
      (() => {
        'use strict';

        const STORAGE_KEY = 'lte-theme';

        const getStoredTheme = () => localStorage.getItem(STORAGE_KEY);
        const setStoredTheme = (theme) => localStorage.setItem(STORAGE_KEY, theme);

        const prefersDark = () => globalThis.matchMedia('(prefers-color-scheme: dark)').matches;

        const getPreferredTheme = () => {
          const stored = getStoredTheme();
          if (stored) return stored;
          return prefersDark() ? 'dark' : 'light';
        };

        const setTheme = (theme) => {
          const resolved = theme === 'auto' ? (prefersDark() ? 'dark' : 'light') : theme;
          document.documentElement.setAttribute('data-bs-theme', resolved);
        };

        setTheme(getPreferredTheme());

        const showActiveTheme = (theme) => {
          // Highlight the active dropdown option
          document.querySelectorAll('[data-bs-theme-value]').forEach((el) => {
            el.classList.remove('active');
            el.setAttribute('aria-pressed', 'false');
            const check = el.querySelector('.bi-check-lg');
            if (check) check.classList.add('d-none');
          });
          const active = document.querySelector(`[data-bs-theme-value="${theme}"]`);
          if (active) {
            active.classList.add('active');
            active.setAttribute('aria-pressed', 'true');
            const check = active.querySelector('.bi-check-lg');
            if (check) check.classList.remove('d-none');
          }
          // Sync the topbar trigger icon
          document.querySelectorAll('[data-lte-theme-icon]').forEach((icon) => {
            icon.classList.toggle('d-none', icon.dataset.lteThemeIcon !== theme);
          });
        };

        globalThis.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
          const stored = getStoredTheme();
          if (!stored || stored === 'auto') setTheme(getPreferredTheme());
        });

        document.addEventListener('DOMContentLoaded', () => {
          showActiveTheme(getPreferredTheme());
          document.querySelectorAll('[data-bs-theme-value]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
              const theme = toggle.getAttribute('data-bs-theme-value');
              setStoredTheme(theme);
              setTheme(theme);
              showActiveTheme(theme);
            });
          });
        });
      })();
    </script>
    <!--end::Color Mode Toggle-->
    <!--begin::Bootstrap Tooltips-->
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      tooltipTriggerList.forEach((tooltipTriggerEl) => {
        new bootstrap.Tooltip(tooltipTriggerEl);
      });
    </script>
    <!--end::Bootstrap Tooltips-->
    <!--begin::Bootstrap Toasts-->
    <script>
      const toastTriggerList = document.querySelectorAll('[data-bs-toggle="toast"]');
      toastTriggerList.forEach((btn) => {
        btn.addEventListener('click', (event) => {
          event.preventDefault();
          const toastEle = document.getElementById(btn.getAttribute('data-bs-target'));
          const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastEle);
          toastBootstrap.show();
        });
      });
    </script>
    <!--end::Bootstrap Toasts-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>

