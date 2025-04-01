<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark shadow">
  <div class="container">
    <a class="navbar-brand" href="index.php">Pappu Mobile Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto">
        <?php 
          $currentPage = basename($_SERVER['PHP_SELF']); // Get current page name
        ?>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'categories.php') ? 'active' : '' ?>" href="categories.php">Collections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'cart.php') ? 'active' : '' ?>" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'searching.php') ? 'active' : '' ?>" href="searching.php">Search</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'feedback.php') ? 'active' : '' ?>"  href="repairpage.php">repair</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($currentPage == 'feedback.php') ? 'active' : '' ?>" href="feedback.php">Feedback</a>
        </li>

        <?php if (isset($_SESSION['auth'])): ?>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'profile.php') ? 'active' : '' ?>" href="profile.php">Profile</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'register.php') ? 'active' : '' ?>" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($currentPage == 'login.php') ? 'active' : '' ?>" href="login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
