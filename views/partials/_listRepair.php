<div class="text-center pt-10">
    <h2 class="font-bold text-3xl"><?=$title?></h2>
</div>
<div class="overflow-x-auto pt-12 ">
    <table class="table table-zebra w-full ">
        <!-- head -->
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Ville</th>
                <th>Date de la réparation</th>
                <th>Statut paiement</th>
                <th>Voir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repairs as $item): ?>
            <!-- row -->
            <tr>
                <th><?=$item['id']?></th>
                <td><?=$item['client_fName'] . ' ' . $item['client_lName']?></td>
                <td><?=$item['client_city']?></td>
                <td><?=$date = date("d/m/Y", strtotime($item['date_reparation']));?></td>
                <td><?=$item['status_paiement'] == 1 ? "a payé" : "n'a pas payé"?></td>
                <td>
                    <a href="showRepair.php?id=<?=$item['id']?>">
                        <i class="fa-solid fa-eye text-green-500"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>