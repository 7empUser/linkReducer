<?php
  $title = "Link Reducer | Мониторинг";
  $styles = ["../styles/monitoring.css"];
  $scripts = ["../scripts/js/monitoring.js"];
  require_once("../components/ru/header.php");
?>

<main>
  <div class="form">
    <input type="text" class="link-form-input" placeholder="Введите сокращенную ссылку">
    <div class="form-submit-button blocked">Посмотреть статистику</div>
  </div>
  <div class="monitoring-div hidden">
    <div class="monitoring-category">
      <p>Всего</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>Всего</p>
          <p id="all-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>По ссылке</p>
          <p id="all-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>По QR-коду</p>
          <p id="all-qr">0</p>
        </div>
      </div>
    </div>
    <div class="monitoring-category">
      <p>За последний день/неделю/месяц</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>Всего</p>
          <p id="category-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>По ссылке</p>
          <p id="category-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>По QR-коду</p>
          <p id="category-qr">0</p>
        </div>
      </div>
    </div>
  </div>
</main>