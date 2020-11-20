	<section class="content-header">
		<span class="content-title"><i class="fa fa-home"></i> Prices Offers</span>
		<ul class="header-btns">
			<?php if(isset($_SESSION['user']) && $_SESSION['user']->aed_sales): ?>
			<li>
				<a href="<?= App::$path ?>quotation_clt/add" class="btn btn-success">
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
				<a href="<?= App::$path ?>quotation_clt/printlist" target="_blank" class="btn btn-default">
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
				<th>Number</th>
				<th>Date</th>
				<th>Subject</th>
				<th>Consumer</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($prs_clt as $quotation_clt): ?>
				<tr>
					<td class="table-actions">
						<a href="<?= App::$path ?>quotation_clt/printdetails/<?= $quotation_clt->id ?>" target="_blank" class="btn btn-default btn-xs">Print</a>
				<?php if(isset($_SESSION['user']) && $_SESSION['user']->aed_articles): ?>
					<a href="<?= App::$path ?>quotation_clt/edit/<?= $quotation_clt->id ?>" class="btn btn-warning btn-xs">Edit</a>
						<a href="#" class="btn btn-danger btn-xs" quotation_id="<?= $quotation_clt->id ?>" onclick="deleteElement(this, event);">Delete</a>
					<a href="<?= App::$path ?>quotation_clt/articles/<?= $quotation_clt->id ?>" class="btn btn-primary btn-xs">Products</a>

				<?php endif; ?>
					</td>
					<td><a href="<?= App::$path ?>quotation_clt/articles/<?= $quotation_clt->id ?>"><?= $quotation_clt->num ?></a></td>
					<td><?= $quotation_clt->dt ?></td>
					<td><?= $quotation_clt->subject ?></td>
					<td><a href="<?= App::$path ?>client/show/<?= $quotation_clt->client_id ?>"><?= $quotation_clt->client_name ?></a></td>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>

	</section>
