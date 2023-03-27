<!-- Information sur une réparation -->
<h2 class="text-center text-3xl py-20"><?=$title?></h2>
<div class="flex justify-center">
    <div class="w-1/3">
        <p><span class="font-bold">Nom:</span> <?=$repair['client_fName'] . ' ' . $repair['client_lName']?></p>
        <p><span class="font-bold">Email:</span> <?=$repair['client_email']?></p>
        <p><span class="font-bold">Nom de la voiture:</span> <?=$repair['client_car_name']?></p>
        <p><span class="font-bold">Date de la réparation:</span>
            <?=$date = date("d/m/Y", strtotime($repair['date_reparation']))?></p>
        <p><span class="font-bold">Type de réparation:</span> <?=$repair['type_prestation']?></p>
        <p><span class="font-bold">Statut:</span> <?=$repair['status_paiement'] == 1 ? "a payé" : "n'a pas payé"?></p>
        <a href="delete.php?id=<?=$repair['id']?>" class="btn btn-error mt-10">Supprimer</a>
        <a href="update.php?id=<?=$repair['id']?>" class="btn btn-primary mt_10">Modifier</a>
    </div>
</div>