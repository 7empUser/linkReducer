<?php
  $title = "Link Reducer | Monitoring";
  $styles = ["../styles/monitoring.css"];
  $scripts = ["../scripts/js/monitoring.js"];
  require_once("../components/en/header.php");
?>

<main>
  <div class="form">
    <input type="text" class="link-form-input" placeholder="Enter the shortened link">
    <div class="form-submit-button blocked">View statistics</div>
  </div>
  <div class="monitoring-div hidden">
    <div class="monitoring-category">
      <p>All</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>All</p>
          <p id="all-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>By the link</p>
          <p id="all-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>By QR code</p>
          <p id="all-qr">0</p>
        </div>
      </div>
    </div>
    <div class="monitoring-category">
      <p>For the last day/week/month</p>
      <div class="monitoring-subcategories-div">
        <div class="monitoring-subcategory">
          <p>All</p>
          <p id="category-all">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>By the link</p>
          <p id="category-link">0</p>
        </div>
        <div class="monitoring-subcategory">
          <p>By QR code</p>
          <p id="category-qr">0</p>
        </div>
      </div>
    </div>
  </div>
</main>