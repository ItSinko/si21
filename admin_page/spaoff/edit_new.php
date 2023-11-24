<?php

$idorder_off = $_GET['idorder_off'];
$result = mysqli_query($con, "SELECT * ,(harga_off * jumlah_off) + ongkos_off as total  FROM spa_off INNER JOIN  distributor ON distributor.iddsb =spa_off.pabrik_off
								        INNER JOIN  produk_master ON spa_off.idprod_off = produk_master.id_prod WHERE idorder_off='$idorder_off' ");

while ($spa_off = mysqli_fetch_array($result)) {



?>
	<html>

	<head>
		<title>Tambah</title>
	</head>

	<style>
		.cd:hover {
			background: #0000;
			color: #000;
		}

		/* Hover cell effect! */
		.field_form {
			border: 1px solid #ddd !important;
			margin: 0;
			xmin-width: 0;
			padding: 10px;
			position: relative;
			border-radius: 4px;
			background-color: #f5f5f5;
			padding-left: 10px !important;
		}

		.legend_form {
			font-size: 12px;
			font-weight: bold;
			margin-bottom: 0px;
			width: 35%;
			border: 1px solid #ddd;
			border-radius: 4px;
			padding: 5px 5px 5px 10px;
			background-color: #ffffff;
		}

		form-control-inline {
			height: 10%;
		}




		input[id=diskonspa] {
			display: none;
		}


		input[id=diskonujispa] {
			display: none;
		}

		input[id=expdates] {
			display: none;
		}

		input[id=idprod_on] {
			display: none;
		}

		input[id=idrate2_on] {
			display: none;
		}

		input[id=pabrik_on] {
			display: none;

		}

		input[id=no_off] {
			display: none;
		}
	</style>

	<body onload="rp()" onchange="rp()">
		<div class="container-fluid">
			<table class="table">
				<form id="form-contact" method="post">
					<fieldset>
						<legend>Ubah Data</legend>

						<p id="error_message" class="font-weight-bold text-danger"></p>
						<p id="success_message" class="font-weight-bold text-success"></p>

					</fieldset>

					<tr>
						<td colspan="1" class="cd">
							<fieldset class="field_form">
								<legend class="legend_form">Info Produk</legend>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">ID Order *</label>
									<div class="col-sm-3">
										<div class="input-group-prepend ">
											<div class="input-group-text" style="height:`28px;">
												OFF-
											</div>
											<input class="form-control " type="text" placeholder="99" id="idorderoff" name="idorderoff" value="<?php echo $idorder_off; ?>" readonly>

										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Distributor *</label>
									<div class="col-sm-2 ">
										<select id="distributor" name="distributor" class="distributor" style="width: 200px;" onchange="changeDbs(this.value);rp();count();" required>
											<option value="<?= $spa_off["pabrik"]; ?>"><?php echo $spa_off["pabrik"]; ?></option>

											<?php
											//$con=mysqli_connect("localhost","root","","kontrol_db");
											$result = mysqli_query($con, "SELECT * FROM distributor");
											$jsArraydb = "var dtDbs = new Array();\n";
											while ($row = mysqli_fetch_array($result)) {
												echo '<option   value="' . $row['pabrik'] . '">' . $row['pabrik'] . '</option>';
												$jsArraydb .= "dtDbs['" . $row['pabrik'] . "'] = {iddsb:'" . addslashes($row['iddsb']) . "',
														   diskonnota:'" . addslashes($row['diskonnota']) . "',
														   diskonuji:'" . addslashes($row['diskonuji']) . "',
														   temphari:'" . addslashes($row['temphari']) . "',
														   pemesan:'" . addslashes($row['pabrik']) . "',
														
														
														};\n";
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Type</label>
									<div class="col-sm-7 ">
										<input class="form-control form-control-inline" style=" height:28px;" readonly value="<?= $spa_off["sing_prod"]; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nama Produk</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd" readonly><?php echo $spa_off["nam_prod"]; ?></textarea>
									</div>
								</div>
						</td>

						<input id="no_off" placeholder="dispa" value="<?= $spa_off["no_off"]; ?>">
						<input id="diskonspa" placeholder="dispa" value="<?= $spa_off["diskon_nota_off"]; ?>">
						<input id="diskonujispa" placeholder="disuji" value="<?= $spa_off["diskon_uji_off"]; ?>">
						<input id="expdates" placeholder="expdates" value="<?= $spa_off["temphari_off"]; ?>">
						<input id="idprod_on" placeholder="idprod_on" value="<?= $spa_off["idprod_off"]; ?>">
						<input id="pabrik_on" placeholder="pabrik_on" value="<?= $spa_off["pabrik_off"]; ?>">


						<td colspan="1" class="cd">
							<fieldset class="field_form">
								<legend class="legend_form">Harga Produk</legend>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Harga/Unit *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control harga" id="harga" placeholder="Rp 1.500" onkeyup="rp();count();" value="<?= $spa_off["harga_off"]; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Jumlah *</label>
									<div class="col-sm-2">
										<div class="input-group-prepend">
											<input class="form-control jumlah" type="text" style="height:28px; width:70px;" onkeyup="count();" id="jumlah" placeholder="99" value="<?= $spa_off["jumlah_off"]; ?>">
											<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" value="<?= $spa_off["satuan_prod"]; ?>">

										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Ongkos Kirim *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control ongkir" id="ongkir" placeholder="Rp 1.500" onkeyup="rp();count();" value="<?= $spa_off["ongkos_off"]; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Total Harga </label>
									<div class="col-sm-7">
										<input type="text" class="form-control total" id="total" placeholder="Rp 1.500" onkeyup="rp();count();" readonly value="<?= $spa_off["total"]; ?>">
									</div>
								</div>

						</td>
						</fieldset>

						<td colspan="1" class="cd">
							<fieldset class="field_form">
								<legend class="legend_form">Info Pemesan</legend>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Pemesan</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="1" placeholder="Nama Pemesan" id="pemesan"><?php echo $spa_off["pemesan_off"]; ?></textarea>

									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Status Paket *</label>
									<div class="col-sm-6">
										<select class="form-control" id="status" style=" height:32px; width:310px;">
											<option value="<?= $spa_off["status_off"]; ?>"><?php echo $spa_off["status_off"]; ?></option>
											<option value="Sepakat">Sepakat</option>
											<option value="Batal">Batal</option>
											<option value="Masih Negosiasi">Masih Negosiasi</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Tgl Buat</label>
									<div class="col-sm-6">
										<input type="date" class="form-control" id="tglbuat" value="<?= $spa_off["tgl_buat_off"]; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Tgl Edit</label>
									<div class="col-sm-6">
										<input type="date" class="form-control" id="tgledit" value="<?= $spa_off["tgl_edit_off"]; ?>">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Keterangan</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="1" placeholder="Keterangan" id="ket"><?php echo $spa_off["ket_off"]; ?></textarea>
									</div>
								</div>


								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle"></i></span> Alasan data diubah </label>
									<div class="col-sm-6">
										<textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log"></textarea>
									</div>
								</div>

						</td>
					</tr>
			</table>


			<input type="hidden" value="<?php echo $_SESSION['username'] ?>" id="username">

			<button type="submit" class="btn btn-success" style="position: absolute; right:55%;" onclick="return confirm('Yakin Update Data ?');" id="register" name="tambah">Update Data</button>
			<a href="./index.php?hlm=spaoff" formnovalidate onclick="return confirm('Yakin Batal ?');" style="position: absolute; right:45%;" class="btn btn-danger">Batal</a>

			</form>
		</div>

		<script type="text/javascript">
			<?php echo $jsArray;
			?>

			function changeValue(sing_prod) {
				document.getElementById('nmprd').value = dtMhs[sing_prod].nam_prod;
				document.getElementById('harga').value = dtMhs[sing_prod].harga;
				document.getElementById('idprod_on').value = dtMhs[sing_prod].idprod_on;


			};
		</script>

		<script type="text/javascript">
			<?php echo $jsArraydb;
			?>

			function changeDbs(pabrik) {

				document.getElementById('pabrik_on').value = dtDbs[pabrik].iddsb;
				document.getElementById('pemesan').value = dtDbs[pabrik].pemesan;
				document.getElementById('diskonspa').value = dtDbs[pabrik].diskonnota;
				document.getElementById('diskonujispa').value = dtDbs[pabrik].diskonuji;
				document.getElementById('expdates').value = dtDbs[pabrik].temphari;
			};
		</script>

		<script src="jquery-1.10.2.min.js"></script>
		<!--  JS nya Jquery Price Format  -->

		<script type="text/javascript" src="jquery.price_format.2.0.js"></script>

		<!--  JS nya Jquery Chained Format  -->
		<script src="jquery.chained.min.js"></script>

		<script>
			$("#type").chained("#distributor");
		</script>

		<script>
			function rp() {

				$('#harga').priceFormat({
					prefix: 'Rp  ',
					thousandsSeparator: '.',
					centsLimit: 0
				});

				$('#ongkir').priceFormat({
					prefix: 'Rp  ',
					thousandsSeparator: '.',
					centsLimit: 0
				});


				$('#total').priceFormat({
					prefix: 'Rp  ',
					thousandsSeparator: '.',
					centsLimit: 0
				});


			}
		</script>

		<script>
			function count() {
				var harga = $(".harga").val();
				var jumlah = $(".jumlah").val();
				var total = $(".total").val();
				var ongkir = $(".ongkir").val();

				harga = harga.split('Rp ').join('');
				harga = harga.split('.').join('');

				ongkir = ongkir.split('Rp ').join('');
				ongkir = ongkir.split('.').join('');


				total = total.split('Rp ').join('');
				total = total.split('.').join('');

				total = Math.round(jumlah * harga) + (ongkir * 1);
				$(".total").val(total);
			}
		</script>


		<script>
			$("#form-contact").submit(function(e) {
				e.preventDefault();


				var no_off = $("#no_off").val();
				var diskonspa = $("#diskonspa").val();
				var diskonujispa = $("#diskonujispa").val();
				var expdates = $("#expdates").val();
				var idprod_on = $("#idprod_on ").val();
				var pabrik_on = $("#pabrik_on").val();
				var idrate2_on = $("#idrate2_on").val();
				var distributor = $("#distributor").val();
				var idorderoff = $("#idorderoff").val();
				var pemesan = $("#pemesan").val();

				var status = $("#status").val();
				var tglbuat = $("#tglbuat").val();
				var tgledit = $("#tgledit").val();
				var ket = $("#ket").val();
				var harga = $("#harga").val();
				var jumlah = $("#jumlah").val();
				var ongkir = $("#ongkir").val();
				var nmprd = $("#nmprd").val();
				var type = $("#type").val();
				var total = $("#total").val();
				var ket_log = $("#ket_log").val();
				var username = $("#username").val();

				if (idorderoff == "" || jumlah == "" || pemesan == "" || ongkir == "" || distributor == "" || status == "" || type == "" || ket_log == "") {
					$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
				} else {
					$("#error_message").html("").hide();
					$.ajax({
						type: "POST",
						url: "check_form/edit/spaoff.php",
						data: "distributor=" + distributor + "&idorderoff=" + idorderoff + "&status=" + status + "&tglbuat=" + tglbuat + "&tgledit=" + tgledit + "&ket=" + ket + "&harga=" + harga + "&jumlah=" + jumlah + "&ongkir=" + ongkir + "&total=" + total + "&nmprd=" + nmprd + "&type=" + type + "&diskonspa=" + diskonspa + "&diskonujispa=" + diskonujispa + "&expdates=" + expdates + "&idprod_on=" + idprod_on + "&pabrik_on=" + pabrik_on + "&idrate2_on=" + idrate2_on + "&pemesan=" + pemesan + "&no_off=" + no_off + "&ket_log=" + ket_log + "&username=" + username,

						success: function(data) {
							$('#success_message').fadeIn().html(data);
							setTimeout(function() {
								$('#success_message').fadeOut("slow");
							}, 2000);

						}
					});
				}
			})
		</script>


	<?php

}
	?>

	<script>
		$(document).ready(function() {
			$('.distributor').select2();
		});
	</script>


	<link href="select2/select2.min.css" rel="stylesheet" />
	<script src="select2/select2.min.js"></script>



	</body>

	</html>