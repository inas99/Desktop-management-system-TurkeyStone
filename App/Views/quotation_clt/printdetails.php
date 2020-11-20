<link href="<?= ROOT ?>/public/css/pdf-style.css" type="text/css" rel="stylesheet" />
<page backtop="20mm" backbottom="10mm" backleft="10mm" backright="10mm">
    <?php
    require_once ROOT.'/App/Views/pdf/pdf-header-footer.php';
    ?>

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td style="width: 50%">
                <table cellspacing="0" cellpadding="0">
                    <tr><td style="width: 100%"><h3>Consumer</h3></td></tr>
                    <tr><td style="width: 100%"><?= $quotation_clt->client_name ?></td></tr>
                    <tr><td style="width: 100%"><?= $quotation_clt->city ?></td></tr>
                    <tr><td style="width: 100%"><?= $quotation_clt->address ?></td></tr>
                </table>
            </td>
            <td  style="width: 50%">
                <table cellspacing="0" cellpadding="0">
                    <tr><td style="width: 100%"><h3>Prices Requests</h3></td></tr>
                    <tr><td style="width: 100%">Number: <?= $quotation_clt->num ?></td></tr>
                    <tr><td style="width: 100%">Date: <?= $quotation_clt->dt ?></td></tr>
                    <tr><td style="width: 100%">Subject:<?= $quotation_clt->subject ?></td></tr>
                </table>
            </td>

        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <table class="pdf-table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th style="width: 15%">Total</th>
            <th style="width: 15%">Prices</th>
            <th style="width: 15%">Amount</th>
            <th style="width: 35%">Name</th>
            <th style="width: 20%">Code</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($quotation_clt_arts as $quotation_clt_art): ?>
            <tr>
                <td><?= App::nFormat($quotation_clt_art->total) ?></td>
                <td><?= App::nFormat($quotation_clt_art->price) ?></td>
                <td><?= $quotation_clt_art->qte ?></td>
                <td><?= $quotation_clt_art->desig ?></td>
                <td><?= $quotation_clt_art->ref ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="pdf-table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th style="width: 33%">Total TTC</th>
            <th style="width: 34%">Fees TVA <span><?= number_format($totals->total_tva_rate,0,'','') ?> %</span></th>
            <th style="width: 33%">Total</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= App::nFormat($totals->total_ttc) ?></td>
                <td><?= App::nFormat($totals->total_tva) ?></td>
                <td><?= App::nFormat($totals->total_ht) ?></td>
            </tr>
        </tbody>
    </table>





</page>