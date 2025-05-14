<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary" href="home.php" style="font-family: 'Segoe UI', sans-serif;">
      🗒️ TaskBoard
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a class="nav-link active" href="home.php">🏠 Home</a>
        <a class="nav-link" href="list_user.php">👥 Users</a>
        <a class="nav-link" href="list_task.php">📋 Tasks</a>
      </div>

      <div class="d-flex align-items-center">
        <span class="navbar-text text-secondary me-3 fw-semibold">
          👤 <?php echo $user_login['username']; ?>
        </span>
        <span class="navbar-text text-secondary me-3 fw-semibold">
           <a class="pin-logout" href="logout.php"></a>
        </span>
        

        
      </div>
    </div>
  </div>
</nav>

<style>

</style>