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
        <td style="text-align:center">
        <div class="hover_img">
     <a><i class="fas fa-camera"></i><span><img src="files/bikes/full/<?=$kolo['pic']?>" alt="image" height="250" /></span></a>
</div>
</td>
        <style>
        .hover_img a { position:relative;cursor:pointer;}
        .hover_img a span { position:absolute; display:none; z-index:99;}
        .hover_img a:hover span { display:block;right:30px;bottom:-90px;background:white;padding:10px;border:2px solid black;-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;}
        </style>
        <td style="text-align:center">        
        <div class="btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary" style="padding: .3rem .6rem;">
            <input type="checkbox" name="vehicle[]" value="<?= $kolo['id'] ?>" autocomplete="off" style="width:40px;"> Vybrat
          </label>
        </div>
        </td>
        
        <?= $status ?>
        
    </tr>

    <?php
}

