<header>

  <div class="logo">
    The Power Of Memory
  </div>
  <nav>
    <ul>
      <a href="index.php">
        <li>ACCUEIL</li>
      </a>
      <a href="game.php">
        <li>JEU</li>
      </a>
      <a href="scores.php">
        <li>SCORES</li>
      </a>
      <?php if ($_SESSION["connected"]) { ?>
        <a href="account.php">
          <li>MON ESPACE</li>
        </a>
      <?php } else { ?>
        <a href="login.php">
          <li>LOGIN</li>
        </a>
      <?php } ?>
      <a href="contact.php">
        <li>NOUS CONTACTER</li>
      </a>
    </ul>
  </nav>
</header>