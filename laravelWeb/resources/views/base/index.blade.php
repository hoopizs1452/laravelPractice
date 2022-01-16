<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous"
        />
        <!-- BOX ICONS CSS-->
        <link
        href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
        rel="stylesheet"
        />
        <title>
            Test Web
        </title>
    </head>
    <body>

        <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
            <ul class="nav flex-column text-white w-100">
                <p class="nav-link h3 text-white my-2">個人網站</p>
                <li class="nav-link">
                    <a href="{{ url('/') }}" style="text-decoration:none;">
                        <i class="bx bxs-dashboard"></i>
                        <span class="mx-2">Home</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('upload') }}" style="text-decoration:none;">
                        <i class="bx bx-user-check"></i>
                        <span class="mx-2">Upload Image</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ url('getFile') }}" style="text-decoration:none;">
                        <i class="bx bx-user-check"></i>
                        <span class="mx-2">Get File</span>
                    </a>
                </li>
            </ul>

            <span href="#" class="nav-link h4 w-100 mb-5">
                <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
                <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
                <a href=""><i class="bx bxl-facebook text-white"></i></a>
            </span>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar navbar-light bg-light px-5">
            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        </nav>
        <!--End Top Nav -->
        <div class="topcorner">
            <div class="topboder">
                <button class="btn btn-primary" type="button" onclick="location.href='https://github.com/hoopizs1452'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    <span>GitHub</span>
                </button>
            </div>
        </div>

        <div class="bodyboder">
            @yield('content')
        </div>

    </div>

    <!-- bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <!-- custom js -->
    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
        
        
    </body>
</html>