<?php if( $histories ) { ?>
<table class="table">

    <thead>
    <tr>
        <th>ID</th>
        <th>Summa</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ( $histories as $history ) { ?>
    <tr>
        <td><?= $history['id'] ?></td>
        <td><?= $history['summa'] ?></td>
    </tr>
    <?php } ?>
    </tbody>

</table>

<?php }else{ ?>
Empty
<?php } ?>
