<?php

$sql = "SELECT * FROM user_info WHERE id ='$id_user'";

$row = $this->db->query($sql)->row();

$id_user = $row->id;
$user_login = @$row->user_login;
$user_password = @$row->user_password;
$user_name = @$row->user_name;
$user_email = @$row->user_email;
$user_tel = @$row->user_tel;
$user_status_repair = @$row->user_status_repair;

?>

<div class="content-wrapper">
	<section class="content">

		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<style>
							.custom-placeholder::placeholder {
								color: #0f007d;
								font-weight: bold;
							}

							.text-primary {
								color: #4a89ff;

								font-size: 18px;
							}

							.text-primary .fa {
								color: #07c700;

							}

							.button-container {
								display: flex;
								justify-content: flex-end;

							}

							.btn-primary {
								background-color: green;

								color: white;

								margin-right: 5px;

							}

							.btn-danger {
								background-color: red;

								color: white;

							}
						</style>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-6">

									<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
											class="fa fa-pencil"></i> ข้อมูลของ<?= $user_name ?>
									</p>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>user login</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $user_login ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_name" name="edit_cus_name"
												class="form-control rounded-0" placeholder="กรอกชื่อจริง" value="">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>อีเมล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_email" name="edit_cus_email"
												class="form-control rounded-0" placeholder="กรอกอีเมล" value="">

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์ : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_cus_tel" name="edit_cus_tel"
												class="form-control rounded-0" placeholder="กรอกเบอร์โทรศัพท์" value="">

										</div>
									</div>
								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_user; ?>)">

							&nbsp;&nbsp;

							<input type="button" value="กลับ" class="btn btn-danger rounded-0"
								onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list_user'">
							<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
						</div>
					</div>

				</div>
			</div>
			<br>

		</div>

</div>
</section>
</div>

<script>
	function onSave(id_user) {
		var edit_cus_name = $('#edit_cus_name').val();
		var edit_cus_email = $('#edit_cus_email').val();
		var edit_cus_tel = $('#edit_cus_tel').val();

		if (confirm('คุณต้องการบันทึกข้อมูลใช่กรือไม')) {
			var pmeters = 'id_user=' + <?= $id_user ?> + '&edit_cus_name=' + edit_cus_name + '&edit_cus_email=' + edit_cus_email + '&edit_cus_tel=' + edit_cus_tel;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/admin_update_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>repair_system/admin/admin_list_user";
				}
			});
			return false;
		}
	}
</script>
