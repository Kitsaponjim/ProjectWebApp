<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;

?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<p style="font-size: 20px; background-color: #ffffff; padding: 10px;"><i class="fa fa-pencil"></i>
			รายการแจ้งซ่อม</p>

	</section>

	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<style>
					/* CSS สำหรับเปลี่ยนสีพื้นหลังให้เป็นสีเหลือง */
					.small-box {
						color: white;
					}

					.small-box.bg-new {
						background-color: #4669e8;

					}

					.small-box.bg-doing {
						background-color: orange;

					}

					.small-box.bg-finish {
						background-color: green;

					}

					.small-box.bg-cancel {
						background-color: red;

					}
				</style>

				<div class="col-lg-3 col-6">

					<div class="small-box bg-new rounded-0">

						<div class="inner">

							<h3><strong>
									<?= $count_case_new; ?>
								</strong> <sup style="font-size: 20px">รายการ</sup></h3>

							<p>งานใหม่</p>

						</div>

						<div class="icon">

							<i class="fa fa-wrench"></i>

						</div>

						<a href="<?= base_url(); ?>repair_system/employee/employee_list?status=1&id=<?= $id; ?>"
							class="small-box-footer rounded-0">

							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>

						</a>

					</div>

				</div>

				<div class="col-lg-3 col-6">

					<div class="small-box bg-doing rounded-0">

						<div class="inner">

							<h3><strong>
									<?= $count_case_wait; ?>
								</strong> <sup style="font-size: 20px">รายการ</sup></h3>

							<p>กำลังดำเนินการ</p>

						</div>

						<div class="icon">

							<i class="fa fa-spinner"></i>

						</div>

						<a href="<?= base_url(); ?>repair_system/employee/employee_list?status=2&id=<?= $id; ?>"
							class="small-box-footer rounded-0">

							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>

						</a>

					</div>

				</div>


				<div class="col-lg-3 col-6">
					<div class="small-box bg-finish rounded-0">

						<div class="inner">

							<h3><strong>
									<?= $count_case_finish; ?>
								</strong> <sup style="font-size: 20px">รายการ</sup></h3>

							<p>เสร็จเรียบร้อย</p>

						</div>

						<div class="icon">

							<i class="fa fa-check-circle"></i>

						</div>

						<a href="<?= base_url(); ?>repair_system/employee/employee_list?status=3&id=<?= $id; ?>"
							class="small-box-footer rounded-0">

							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>

						</a>

					</div>

				</div>

				<div class="col-lg-3 col-6">

					<div class="small-box bg-cancel rounded-0">

						<div class="inner">

							<h3><strong>
									<?= $count_case_cancel; ?>
								</strong> <sup style="font-size: 20px">รายการ</sup></h3>

							<p>รายการยกเลิก</p>

						</div>

						<div class="icon">

							<i class="fa fa-ban"></i>

						</div>

						<a href="<?= base_url(); ?>repair_system/employee/employee_list?status=4&id=<?= $id; ?>"
							class="small-box-footer rounded-0">

							ดูเพิ่มเติม <i class="fa fa-arrow-right"></i>

						</a>

					</div>

				</div>

			</div>
		</div>

		<div class="box">
			<div class="box-body">
				<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">
						<div class="col-sm-6">

							<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
									class="fa fa-pencil"></i> ประเภทงายซ่อม</p>

							<table class="table table-bordered table-striped" role="grid"
								aria-describedby="example1_info">
								<thead>
									<tr role="row" class="info">
										<th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">No</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 75%;">ประเภทงานซ่อม</th>
										<th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวน</th>
										<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">view</th> -->
									</tr>
								</thead>
								<tbody>

									<?php
									
									$sql = "SELECT rp_type.rp_name_type, COUNT(rp_case.rp_case_type) AS count_type
									FROM rp_type
									JOIN rp_case ON rp_type.rp_name_type = rp_case.rp_case_type
									WHERE rp_case.id_repair = $id
									GROUP BY rp_type.rp_name_type";

									$query = $this->db->query($sql)->result();
									foreach ($query as $index => $row) {
										echo '<tr role="row">';
										echo '<td>' . ($index + 1) . '</td>';
										echo '<td>' . $row->rp_name_type . '</td>';
										echo '<td>' . $row->count_type . '</td>';
										// echo '<td><input class="btn btn-success rounded-0" type="submit" name="btnSave" id="btnSave" value="เพิ่มเติม"></td>';
										echo '</tr>';
									}

									?>

								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div><!-- /.box-body -->
		</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
