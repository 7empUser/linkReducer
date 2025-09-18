<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Link Reducer' ?></title>
  <link rel="stylesheet" href="../styles/base.css">
  <?php
    foreach ($styles as $style) {
      echo ("<link rel='stylesheet' href='$style'>");
    }
    foreach ($scripts as $script) {
      echo ("<script src='$script'></script>");
    }
  ?>
</head>
<body>

  <header>
    <h1>Link Reducer</h1>
    <nav class="desktop">
      <div><a href="/de/index.php" class="nav-link">Startseite</a></div>
      <div><a href="/de/monitoring.php" class="nav-link">Überwachung</a></div>
    </nav>
    <div class="lang-div">
      <div class="lang-div__current-lang"><p>DE</p></div>
      <div class="lang-div__list hidden">
        <div>
          <a href="/en/index.php">EN</a>
        </div>
        <div>
          <a href="/de/index.php">RU</a>
        </div>
      </div>
    </div>
    <nav class="mobile">
      <button class="mobile-nav-button">
        <span class="mobile-nav-button-icon"><img src="../img/menu.png" alt="menu"></span>
      </button>
      <div>
        <div><a href="/de/index.php" class="nav-link">Startseite</a></div>
        <div><a href="/de/monitoring.php" class="nav-link">Überwachung</a></div>
      </div>
    </nav>
  </header>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const langDiv = document.querySelector(".lang-div");
      if (!langDiv) return;
      const current = langDiv.querySelector(".lang-div__current-lang");
      const list = langDiv.querySelector(".lang-div__list");
      if (!current || !list) return;

      current.addEventListener("click", (e) => {
        e.stopPropagation();
        list.classList.toggle("hidden");
      });

      document.addEventListener("click", () => {
        if (!list.classList.contains("hidden")) {
          list.classList.add("hidden");
        }
      });
    });
  </script>