<table class="table table-striped">

	<thead>
		<tr>
			<th><?php echo lang('status'); ?></th>
			<th><?php echo lang('quote'); ?></th>
			<th><?php echo lang('date'); ?></th>
			<th><?php echo lang('due_date'); ?></th>
			<th><?php echo lang('client'); ?></th>
			<th style="text-align: right; padding-right: 25px;"><?php echo lang('amount'); ?></th>
			<th><?php echo lang('options'); ?></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($quotes as $quote) { ?>
		<tr>
			<td>
                <span class="label <?php echo $quote_statuses[$quote->quote_status_id]['class']; ?>"><?php echo $quote_statuses[$quote->quote_status_id]['label']; ?></span>
			</td>
			<td><a href="<?php echo site_url('quotes/view/' . $quote->quote_id); ?>" title="<?php echo lang('edit'); ?>"><?php echo $quote->quote_number; ?></a></td>
			<td><?php echo date_from_mysql($quote->quote_date_created); ?></td>
			<td><?php echo date_from_mysql($quote->quote_date_expires); ?></td>
			<td><a href="<?php echo site_url('clients/view/' . $quote->client_id); ?>" title="<?php echo lang('view_client'); ?>"><?php echo $quote->client_name; ?></a></td>
			<td style="text-align: right; padding-right: 25px;"><?php echo format_currency($quote->quote_total); ?></td>
			<td>
				<div class="options btn-group">
					<a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo site_url('quotes/view/' . $quote->quote_id); ?>">
								<i class="icon-pencil"></i> <?php echo lang('edit'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('quotes/generate_pdf/' . $quote->quote_id); ?>">
								<i class="icon-print"></i> <?php echo lang('download_pdf'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('mailer/quote/' . $quote->quote_id); ?>">
								<i class="icon-envelope"></i> <?php echo lang('send_email'); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('quotes/delete/' . $quote->quote_id); ?>" onclick="return confirm('<?php echo lang('delete_quote_warning'); ?>');">
								<i class="icon-trash"></i> <?php echo lang('delete'); ?>
							</a>
						</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>