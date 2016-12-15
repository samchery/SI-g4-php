<tr id="<?= $row['ID'] ?>">
    <td><?= $row['ID'] ?></td>
    <td><?= $row['titre'] ?></td>
    <td class="resum"><?= $row['resum'] ?></td>
    <td><?= $row['photo1'] ?><br><img src="img-content/<?= $row['photo1'] ?>"></td>
    <td><?= $row['section'] ?></td>

    <!-- case pour visibilité : afficher/cacher-->
    <td>
        <?php $test = $row['visible'];
        if ($test == true) {
            ?>
            <p> visible </p>
            <a class="button" href="requete/rendre-invisible.php?ID=<?= $row['ID'] ?>">Cacher</a>
            <?php
        } else {
            ?>
            <p> invisible </p>
            <a class="button" href="requete/rendre-visible.php?ID=<?= $row['ID'] ?>">Afficher</a>
            <?php
        }
        ?>
    </td>

    <!-- case pour moderation -->
    <td class="moderation">

        <!-- btn pour modification d'une valeur -->
        <a class="edit" href="modifier.php?ID=<?= $row['ID'] ?>">Editer</a>

        <!-- btn pour suppression d'une valeur -->
        <a class="supp" href="requete/supprimer.php?ID=<?= $row['ID'] ?>">Supprimer</a>



        <div class="information">
            <span class="relief">Attention !</span> La suppression d'une donnée est irréversible.
        </div>

    </td>
</tr>