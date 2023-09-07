    <!-- pour se connecter, on fera un truc discret dès que ça marche -->

    <!-- si on est connecté -->

    <?php if(empty($_SESSION) && $title !== "Connection" ) : ?>
        <button class="btn"><a href="?p=connect"><i class="fa-solid fa-screwdriver-wrench"></i></a></button>
    <?php endif;  ?>
    <button onclick="backToTop()" id="btt" title="Back to top">Top</button> 
    
    <!-- JS -->
    <script src="../public/js/js.js"></script>
    <script src="js/btt.js"></script>

</body>
</html>
