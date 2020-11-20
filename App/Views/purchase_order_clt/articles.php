	<section class="content-header">
		<span class="content-title"><i class="fa fa-home"></i>Processing products Requests</span>
	</section>
	<div class="row doc-infos">
		<div class="col-sm-6 col-xs-12">
			<div class="box-infos-search">
				<section class="content-header box-infos-header">
					<span class="content-title">Product Requests</span>
				</section>
				<div class="box-infos">
					<input type="hidden" id="purchase_order_clt_id" value="<?= $purchase_order_clt->id ?>">
					<h3>Number: <?= $purchase_order_clt->num ?></h3>
					<p>Date: <?= $purchase_order_clt->dt ?></p>
					<p>Subject: <?= $purchase_order_clt->subject ?></p>
					<p>Notes: <?= $purchase_order_clt->discr ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="box-infos-search">
				<section class="content-header box-infos-header">
					<span class="content-title"><i class="fa fa-home"></i> Consumer</span>
				</section>
				<div class="box-infos">
					<input type="hidden" id="client_id" value="<?= $purchase_order_clt->client_id ?>">
					<h3 class="box-infos-name"><?= $purchase_order_clt->client_name ?></h3>
					<p class="box-infos-city"><?= $purchase_order_clt->city ?></p>
					<p class="box-infos-address"><?= $purchase_order_clt->address ?></p>
				</div>
			</div>
		</div>
	</div>
	<section class="content-header">
		<span class="content-title"><i class="fa fa-home"></i>Products</span>
		<ul class="header-btns">
			<?php if(isset($_SESSION['user']) && $_SESSION['user']->aed_sales): ?>
			<li>
				<a href="#" class="btn btn-warning" onclick="loadQuotationsClt(event);" title="Import Prices Offers">
					<i class="fa fa-list"></i>
					<span class="hidden-xs hidden-sm"> Import Prices Offers</span>
				</a>
			</li>
			<li>
				<a href="<?= App::$path ?>purchase_order_clt/addart/<?= $purchase_order_clt->id ?>" class="btn btn-success">
					<i class="fa fa-plus-circle"></i>
					<span class="hidden-xs hidden-sm"> Add</span>
				</a>
			</li>
			<?php endif; ?>
			<li>
				<a href="#" class="btn btn-primary" onclick="searchToogle('form-search-wrap', event);">
					<i class="fa fa-search"></i>
					<span class="hidden-xs hidden-sm"> Search</span>
				</a>
			</li>
			<li>
				<a href="<?= App::$path ?>purchase_order_clt/printdetails/<?= $purchase_order_clt->id ?>" target="_blank" class="btn btn-default">
					<i class="fa fa-print"></i>
					<span class="hidden-xs hidden-sm"> Print</span>
				</a>
			</li>
		</ul>
	</section>
	<section class="content">
		<div class="table-responsive">
			<table class="table main-table rtl_table data-table table-striped table-hover">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th>Product Number</th>
				<th>Code</th>
				<th>Name</th>
				<th>Amount</th>
				<th>Price</th>
				<th>Totak</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($purchase_order_clt_arts as $purchase_order_clt_art): ?>
				<tr>
					<td class="table-actions">
				<?php if(isset($_SESSION['user']) && $_SESSION['user']->aed_articles): ?>
					<a href="<?= App::$path ?>purchase_order_clt/editart/<?= $purchase_order_clt_art->purchase_order_clt_id ?>/<?= $purchase_order_clt_art->id ?>" class="btn btn-warning btn-xs">Edit</a>
						<a href="#" class="btn btn-danger btn-xs" purchase_order_art_id="<?= $purchase_order_clt_art->id ?>" onclick="deleteElementArt(this, event);">Delete</a>

				<?php endif; ?>
					</td>
					<td><?= $purchase_order_clt_art->art_id ?></td>
					<td><?= $purchase_order_clt_art->ref ?></td>
					<td><?= $purchase_order_clt_art->desig ?></td>
					<td><?= $purchase_order_clt_art->qte ?></td>
					<td class="currency"><?= App::nFormat($purchase_order_clt_art->price) ?></td>
					<td class="currency"><?= App::nFormat($purchase_order_clt_art->total) ?></td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		<div>
			<div class="col-sm-6 col-md-4">
				<label>Total Prices</label>
				<input type="text" value="<?= App::nFormat($totals->total_ht) ?>" class="form-control currency" readonly>
			</div>
			<div class="col-sm-6 col-md-4">
				<label  style="direction: ltr">TVA (<span><?= number_format($totals->total_tva_rate,0,'','') ?></span> %)</label>
				<input type="text" value="<?= App::nFormat($totals->total_tva) ?>" class="form-control currency" readonly>
			</div>
			<div class="col-sm-6 col-md-4">
				<label> Total TTC</label>
				<input type="text" value="<?= App::nFormat($totals->total_ttc) ?>" class="form-control currency" readonly>
			</div>

		</div>
	</section>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Offers Prices</h4>
				</div>
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table rtl_table data-table table-striped table-hover">
							<thead>
							<tr>
								<th>&nbsp;</th>
								<th>Number</th>
								<th>Date</th>
								<th>Consumer</th>
							</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
				</div>
			</div>
		</div>
	</div>
