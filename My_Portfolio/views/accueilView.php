<?php $title = "Welcome to my website"; ?>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Pham Tien Quyen</h1>
        <p class="lead">06 50 25 59 71</p>
        <p class="lead">ptquyen2957@gmail.com</p>
        <p class="lead">
          <a href="projet" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
         <?php if(!isset($_SESSION['connecte'])) { ?>
          <a href="login">Se connecter à l'espace admin</a>
          <?php } ?>
        </div>
      </footer>