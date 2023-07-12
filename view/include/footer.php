    <!-- pour se connecter, on fera un truc discret dès que ça marche -->

    <!-- si on est connecté -->

    <?php if(empty($_SESSION)) : ?>
        <button class="btn"><a href="?p=connect">CONNECT</a></button>
    <?php endif; ?>
    <button onclick="backToTop()" id="btt" title="Back to top">Top</button> 
    
    <!-- JS -->
    <script src="../public/js/js.js"></script>
    <script src="js/btt.js"></script>

</body>
</html>
