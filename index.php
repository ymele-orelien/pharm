<?php
$standalone_page=["login","404"];
$request_url=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes=require './routes/web.php';
$request_url=rtrim($request_url, '/')?:"/";
if (array_key_exists($request_url, $routes)) {
      $page=$routes[$request_url];
} else {
      http_response_code(404);
      $page="404";
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
         include './views/components/head.php';
      ?>
   </head>
   <body>
      <?php if (in_array($page, $standalone_page)):?>
      <?php include "./views/pages/{$page}.php";?>
      <?php else: ?>

   <header id="header" class="header fixed-top d-flex align-items-center">
         <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="/public/assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Admin</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text" name="query" placeholder="Search" title="Enter search keyword"> <button type="submit" title="Search"><i class="bi bi-search"></i></button></form>
         </div>
         <nav class="header-nav ms-auto">
            <?php
               include './views/components/nav.php';
            ?>
         </nav>
      </header>
      <aside id="sidebar" class="sidebar">
         <?php include "./views/components/aside.php"?>
      </aside>
      
      <main id="main" class="main">
        
<?php
                if ($page === '404') {
                    echo '<h2>404 - Page non trouvée</h2>';
                } else {
                    include "views/pages/{$page}.php";
                }
                ?>
      </main>
      <footer id="footer" class="footer">
         <?php
            include './views/components/footer.php';
         ?>
      </footer>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
        <?php
         include './views/components/script.php';
        ?>  
        <?php endif; ?>  
   </body>
</html>