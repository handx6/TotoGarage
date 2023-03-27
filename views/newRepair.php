<?php

include_once "helpers/functions.php";
require_once "models/model.php";
// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;
if (!empty($_POST['submitted'])) {
    require_once 'helpers/validate-input/validateInput.php';

    create($fName, $lName, $email, $car_name, $city, $address, $post_code, $status, $prestation, $dateRepair);
}

?>
<form action="" method="post" class="">
    <div class="flex justify-center">
        <div class="p-10">
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="fName">Prénom</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="fName"
                    id="fName" value="<?php showInputValue("fName")?>" />
                <?php errorMsg('fName')?>
            </div>

            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="lName">Nom</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="lName"
                    id="lName" value="<?php showInputValue("lName")?>" />
                <?php errorMsg('lName')?>

            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="email">Email</span>
                </label>
                <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="email"
                    id="email" value="<?php showInputValue("email")?>" />
                <?php errorMsg('email')?>

            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="car_name">Nom de la voiture</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="car_name"
                    id="car_name" value="<?php showInputValue("car_name")?>" />
                <?php errorMsg('car_name')?>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="city">Ville</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="city"
                    id="city" value="<?php showInputValue("city")?>" />
                <?php errorMsg('city')?>
            </div>
        </div>
        <div class="p-10">
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="address">Adresse</span>
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="address"
                    id="address" value="<?php showInputValue("address")?>" />
                <?php errorMsg('address')?>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="post_code">Code postal</span>
                </label>
                <input type="number" class="input input-bordered w-full max-w-xs" name="post_code" id="post_code"
                    value="<?php showInputValue("post_code")?>" />
                <?php errorMsg('post_code')?>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="date_repair">Date de la réparation</span>
                </label>
                <input type="date" class="input input-bordered w-full max-w-xs" name="date_repair" id="date_repair"
                    value="<?php showInputValue("date_repair")?>" />
                <?php errorMsg('date_repair')?>
            </div>
            <div class="flex w-full max-w-xs">
                <div class="form-control ">
                    <label class="label cursor-pointer" for="status">
                        <span class="label-text">A payé</span>
                    </label>
                    <input type="radio" name="status" value="1" class="radio checked:bg-red-500"
                        <?php showRadioValue("status", 1);?> />
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer" for="status">
                        <span class="label-text">N'a pas payé</span>
                    </label>
                    <input type="radio" name="status" value="0" class="radio checked:bg-red-500"
                        <?php showRadioValue("status", 0);?> />

                </div>
            </div>
            <?php errorMsg('status')?>
            <?php
$prestationOptions = [
    ["name" => "vidange"],
    ["name" => "révision"],
    ["name" => "changement de courroie"],
    ["name" => "carrosserie"],
]
?>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text" for="prestation">Prestation</span>
                </label>
                <select class="select select-bordered" name="prestation" id="prestation">
                    <option disabled selected>Choisissez une prestation</option>
                    <?php foreach ($prestationOptions as $item): ?>
                    <option value="<?=$item['name']?>" <?php showSelectValue('prestation', $item['name'])?>>
                        <?=$item['name']?>
                    </option>
                    <?php endforeach?>
                </select>
                <?php errorMsg('prestation')?>

            </div>
        </div>
    </div>
    <div class="flex flex-col items-center">
        <div class="form-control w-full max-w-xs pt-6">
            <input type="submit" value="Envoyer" class="btn btn-outline" name="submitted" />
        </div>
    </div>
</form>