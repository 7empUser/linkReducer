<?php 
  $title = 'Link Reducer | Main';
  $styles = ["../styles/index.css"];
  $scripts = ["../scripts/js/index.js", "../scripts/js/qrcode.min.js"];
  require_once '../components/en/header.php';
?>

<main>
  <div class="form">
    <input type="text" class="link-form-input" placeholder="Enter the link you want to shorten" >
    <div class="form-submit-button blocked">Shorten</div>
  </div>
  <div class="new-link-div hidden">
    <div>
      <a href="" target="_blank" class="new-link"></a>
      <div>

      </div>
    </div>
    <div class="qr-code-div">
    </div>
  </div>
</main>

</body>
</html>