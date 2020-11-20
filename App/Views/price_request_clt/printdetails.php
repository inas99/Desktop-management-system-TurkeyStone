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
                    <tr><td style="width: 100%"><?= $pr_clt->client_name ?></td></tr>
                    <tr><td style="width: 100%"><?= $pr_clt->city ?></td></tr>
                    <tr><td style="width: 100%"><?= $pr_clt->address ?></td></tr>
                </table>
            </td>
            <td  style="width: 50%">
                <table cellspacing="0" cellpadding="0">
                    <tr><td style="width: 100%"><h3>Price Request</h3></td></tr>
                    <tr><td style="width: 100%">Number: <?= $pr_clt->num ?></td></tr>
                    <tr><td style="width: 100%">Date: <?= $pr_clt->dt ?></td></tr>
                    <tr><td style="width: 100%">Subject:<?= $pr_clt->subject ?></td></tr>
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
            <th style="width: 20%">Quantity</th>
            <th style="width: 50%">Name</th>
            <th style="width: 30%">Code</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($pr_clt_arts as $pr_clt_art): ?>
            <tr>
                <td><?= $pr_clt_art->qte ?></td>
                <td><?= $pr_clt_art->desig ?></td>
                <td><?= $pr_clt_art->ref ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>





</page>