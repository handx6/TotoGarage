<!DOCTYPE html>
<html lang="fr" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <!-- Daisy ui -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?=$title?></title>
</head>

<body>
    <!-- header -->
    <header class="bg-indigo-600 p-20 text-white text-center">
        <h1 class="text-4xl">TotoGarage</h1>
    </header>
    <!-- main -->
    <main class="px-24 py-20 min-h-screen">
        <div class="flex justify-between">
            <a class="btn" href="newRepair.php">Ajouter une nouvelle réparation</a>
            <a class="btn" href="listRepair.php">Voir la liste des réparations</a>
            <a class="btn" href="listPayment.php">Liste des réparation en attente de paiement</a>
        </div>
        <div>
            <?=$content?>
        </div>
    </main>
    <footer class="bg-indigo-600 p-20 text-white text-center">
        <h2 class="text-4xl">TotoGarage</h1>
    </footer>
</body>

</html>