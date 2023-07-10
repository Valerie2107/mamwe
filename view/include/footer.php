    <!-- pour se connecter, on fera un truc discret dès que ça marche -->

    <!-- si on est connecté -->
    <?php if(empty($_SESSION)) : ?>
        <button><a href="?p=connect">CONNECT</a></button>
    <?php endif; ?>

    
    <!-- JS -->
    <script src="../public/js/js.js"></script>
</body>
</html>
