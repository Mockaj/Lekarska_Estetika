<?php
require_once '../inc/Database.php';
$myPost = filter_input_array(INPUT_POST);

$dateFrom = date("Y-m-d", strtotime(str_replace("/", "-", $myPost['dateFrom'])));
$dateTo = date("Y-m-d", strtotime(str_replace("/", "-", $myPost['dateTo'])));

$kola = [];
foreach ($database->kola->where("archiv",0) as $loop) {

    if ($database->vypujceni->where("kola_id", $loop['id'])
                    ->and("datumOd <= ? AND datumDo >= ?", $dateTo, $dateFrom)->count() == 0) {
        $loop['status'] = "1";
        $kola[] = $loop;
        continue;
    }
    if ($database->vypujceni->where("kola_id", $loop['id'])
                    ->and("datumOd < ? AND datumDo > ?", $dateTo, $dateFrom)->count() == 0) {
        $loop['status'] = "2";
        $kola[] = $loop;
    }
}

foreach ($kola as $kolo) {

    $status = ($kolo['status'] == 1 ? '<td style="color:green;text-align:center">K dispozici</td>' : '<td class="center" style="color:red;">Vrací se v den vypůjčení</td>');
    ?>

    <tr>
        <td><?= $kolo['cisloKola'] ?></td>
        <td><?= $kolo['nazev'] ?></td>
        <td style="text-align:center"><?= $kolo['ram'] ?></td> 
        
        <?= $status ?>
        
    </tr>

    <?php
}

