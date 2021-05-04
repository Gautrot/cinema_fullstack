<!-- Footer -->
<footer class="footer sticky-footer bg-dark rounded-top section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <!-- Météo API -->
      <div class="mt-2 col-lg-3 col-md-3 offset-md-1 offset-lg-0">
        <h4>Météo</h4>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-3b7bb7de-0262-4d60-b855-2f769899b80b"></div>
      </div>
      <!-- Liens rapides -->
      <div class="mt-2 col-lg-3 col-md-3 offset-md-1 offset-lg-1">
        <h4>Liens rapides</h4>
        <form action="../vue/contact.php" method="post">
          <a href="../vue/contact.php">Contact</a>
        </form>
      </div>
      <!-- Google Maps API -->
      <div class="mt-2 col-lg-3 col-md-3 offset-md-1 offset-lg-0">
        <h4>Accès</h4>
        <iframe
          width="600"
          height="450"
          style="border:0"
          loading="lazy"
          allowfullscreen
          src="https://www.google.com/maps/embed/v1/place
            ?key=AIzaSyBGOHQOO2ESfYswiUrkNtZt5YahdB70WzY
            &q=Eiffel+Tower,Paris+France
        ">
        </iframe>
      </div>
    </div>
  </div>
  <div class="bg-info">
    <p class="text-center m-2">Projet © 2021</p>
  </div>
  <!-- Container End -->
</footer>
