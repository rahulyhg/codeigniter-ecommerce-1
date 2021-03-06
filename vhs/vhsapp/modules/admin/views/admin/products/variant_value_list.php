<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			All Variant Values
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#variant_value">
							Add Variant Value</button>
					</div>
					<?php if($this->session->flashdata('category_added')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-success">
							<?php echo $this->session->flashdata('category_added'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('errors')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
					</div>
					<?php endif; ?>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_length" id="example1_length">
										<label>Show
											<?php echo form_open('admin/products/view_variant');?>
											<select name="limit" onchange="form.submit()" aria-controls="example1" class="form-control input-sm">
												<option value="10" <?php if ($this->input->post('limit') == 10){ echo "selected='selected'";} ?>>10</option>
												<option value="25" <?php if ($this->input->post('limit') == 25){ echo "selected='selected'";} ?>>25</option>
												<option value="50" <?php if ($this->input->post('limit') == 50){ echo "selected='selected'";} ?>>50</option>
												<option value="100" <?php if ($this->input->post('limit') == 100){ echo "selected='selected'";} ?>>100</option>
											</select>
											<?php echo form_close();?>

											entries</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div id="example1_filter" class="dataTables_filter">
										<label>Search:
											<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">Variant Value Id</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">Parent Category Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">Group Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">Variant Value</th>

											</tr>
										</thead>
										<tbody>
											<?php if($variant_values):?>
											<?php foreach($variant_values as $variant): ?>
											<tr role="row" class="odd">
												<td>
													<?php echo $variant->id; ?>
												</td>
												<td>
													<?php echo $this->Product_model->get_category_detail_by_id($variant->category_id)->name; ?>
												</td>
												<td>
													<?php echo $this->Product_model->get_variant_group($variant->group_id)[0]->name; ?>
												</td>
												<td>
													<?php echo $variant->value; ?>
													<div>
														<a href="<?php echo base_url(); ?>admin/products/edit_variant_value/<?php echo $variant->id ?>">Edit</a> |
														<a href="<?php echo base_url(); ?>admin/products/delete_variant_value/<?php echo $variant->id ?>">Delete</a>
														<!--														<a href="">View</a>-->
													</div>
												</td>


											</tr>
											<?php endforeach;?>
											<?php endif;?>
										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">Group Id</th>
												<th rowspan="1" colspan="1">Group Name</th>

											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="dataTables_info" id="example1_info" role="status" aria-live="polite"> 										
										<?php 
										//										$start =  $this->pagination->cur_page * $this->pagination->per_page;
										//										$end = $start * $this->pagination->cur_page;
										$total = $this->Product_model->category_count();
										echo "Total $total Categories";
										?>

									</div>
								</div>
								<div class="col-sm-7">
									<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
										<ul class="pagination">
											<!--
<li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>

<li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $links;?></a></li>

<li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>-->

											<?php echo $links;?>


										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>





			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>