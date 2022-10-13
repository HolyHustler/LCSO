<nav id="mysql">
    <?php
        $localhost = 1;
        try {
            if ($localhost == 0) {
                $bdd = new PDO('mysql:host=X.X.X.X;dbname=XXXX', 'XXXXX', 'XXXX');
            } else {
                $bdd = new PDO('mysql:host=127.0.0.1;dbname=lcsd', 'root', '');
            }
            $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    ?>
</nav>
