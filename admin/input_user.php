			<?php
			error_reporting(0);
			session_start();
			$username = $_SESSION['username'];
			$login			= $_SESSION['login'];

			if ($login != 12) {
				session_destroy();
				header('Location: login.php');
			}

			if ($_GET['form'] == 'edit') {
				include 'edit_user.php';
			} else {
				include 'tambah_user.php';
			}
			?>
			<div class="panel panel-default margin-10">
				<div class="panel-heading" style="background-color: #731514;">
					<h2 class="text-uppercase">DAFTAR USER</h2>
				</div>
				<div class="panel-body">
					<table id="data_user" width="100%" class="display table table-striped table-bordered templatemo-user-table">
						<thead>
							<tr style="background-color:#731514">
								<td align="center" width="10%"><a class="white-text templatemo-sort-by"># <span class="caret"></span></a></td>
								<td align="center" width="15%"><a class="white-text templatemo-sort-by">NIP <span class="caret"></span></a></td>
								<td align="center" width="30%"><a class="white-text templatemo-sort-by">NAMA <span class="caret"></span></a></td>
								<td align="center" width="15%"><a class="white-text templatemo-sort-by">JABATAN <span class="caret"></span></a></td>
								<td align="center" width="15%"><a class="white-text templatemo-sort-by">NO HP <span class="caret"></span></a></td>
								<td align="center" width="15%">ACTION</td>
							</tr>
						</thead>
						<tbody>

							<?php

							$lihat = mysqli_query($database, "select * from guru order by nip asc");
							$no = 1;

							while ($data = mysqli_fetch_array($lihat)) {
								echo '
					<tr>
						<td align="center">' . $no++ . '</td>
						<td align="center">' . $data["nip"] . '</td>
						<td align="center">' . $data["nama"] . '</td>
						<td align="center">' . ucwords($data["jabatan"]) . '</td>
						<td align="center">' . $data["no_hp"] . '</td>
						<td align="center">
						<a href="administrator.php?type=detail_user&no=' . $data["no"] . '" class="templatemo-lihat-btn">Lihat</a>
						<a href="administrator.php?type=input_user&form=edit&no=' . $data["no"] . '" class="templatemo-edit-btn">Edit</a>
						<a onclick="return konfirmasi()" href="administrator.php?type=hapus_user&no=' . $data["no"] . '" class="templatemo-hapus-btn">Hapus</a></td>
						
						</tr>
					 ';
								$no_asis = $data['no'];
							}

							?>
						</tbody>
					</table>
				</div>
			</div>
			<style>
				.dataTables_paginate>ul.pagination>li.paginate_button>a {
					color: #fff;
					background-color: #731514;
				}
			</style>
			<script type="text/javascript">
				function konfirmasi() {
					hapus = confirm("Yakin Akan Menghapus Data ?");
					if (hapus = true) {
						return true;
					} else {
						return false;
					}
				}
			</script>