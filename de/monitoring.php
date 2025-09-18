<?php
  $title = "Link Reducer | Überwachung";
  $styles = ["../styles/monitoring.css"];
  $scripts = ["../scripts/js/monitoring.js"];
  require_once("../components/de/header.php");
?>

<main>
  <div class="form">
    <input type="text" class="link-form-input" placeholder="Geben Sie den abgekürzten Link ein">
    <div class="form-submit-button blocked">Statistiken anzeigen</div>
  </div>
  <div class="monitoring-div hidden">
    <div class="monitoring-category">
      <p>Insgesamt</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>Insgesamt</p>
          <p id="all-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>Über den Link</p>
          <p id="all-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>Durch QR-Code</p>
          <p id="all-qr">0</p>
        </div>
      </div>
    </div>
    <div class="monitoring-category">
      <p>Für den letzten Tag/Woche/Monat</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>Insgesamt</p>
          <p id="category-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>Über den Link</p>
          <p id="category-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>Durch QR-Code</p>
          <p id="category-qr">0</p>
        </div>
      </div>
    </div>
  </div>
</main>