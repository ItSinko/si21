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
</style>

<body onchange="rp()">
	<div class="container-fluid">
		<table class="table">
			<form id="form-contact" method="post">
				<fieldset>
					<legend>Tambah Data</legend>

					<p id="error_message" class="font-weight-bold text-danger"></p>
					<p id="success_message" class="font-weight-bold text-success"></p>

				</fieldset>

				<tr>
					<td colspan="1" class="cd">
						<fieldset class="field_form">
							<legend class="legend_form">Info Produk</legend>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">ID Order *</label>
								<div class="col-sm-5">
									<div class="input-group-prepend ">
										<div class="input-group-text" style="height:`28px;">
											OFF-
										</div>
										<input class="form-control " type="text" placeholder="99" id="idorderoff" name="idorderoff">
										<span id="availability"></span>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Distributor*</label>
								<div class="col-sm-1 ">
									<select id="distributor" name="distributor" style="width: 200px;" title="Distributor" class="distributor" onchange="changeDbs(this.value);rp();count();" required>
										<option value="disabled">Pilih Produk</option>

										<?php
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
								<label class="col-sm-3 col-form-label">Kategori*</label>
								<div class="col-sm-1 ">
									<select id="kategori" class="kategori" title="Kategori" required style="width: 200px;">
										<option value="disabled">Pilih Kategori</option>

										<?php

										$results = mysqli_query($con, "SELECT  kategori from produk_master GROUP BY kategori ASC");
										while ($row = mysqli_fetch_array($results)) {
											echo '<option value="' . $row['kategori'] . '">' . $row['kategori'] . '</option>';
										}
										?>

									</select>
								</div>
							</div>



							<div class="form-group row">
								<label class="col-sm-3 col-form-label ">Type Produk *</label>
								<div class="col-sm-2 ">
									<select id="type" class="form-control type_prd" style="width: 200px;" onchange="changeValue(this.value);rp();count();" name="type" required>
										<option value="disabled">Pilih Produk</option>
										<?php

										$result = mysqli_query($con, "SELECT * FROM produk_master");

										$jsArray = "var dtMhs = new Array();\n";
										while ($row = mysqli_fetch_array($result)) {
											echo '<option  class="' . $row['kategori'] . '"  value="' . $row['sing_prod'] . '">' . $row['sing_prod'] . '</option>';
											$jsArray .= "dtMhs['" . $row['sing_prod'] . "'] = { 
															
															nam_prod:'" . addslashes($row['nam_prod']) . "',
														    harga:'" . addslashes($row['harga']) . "',
															idprod_on:'" . addslashes($row['id_prod']) . "',
															satuan_prod:'" . addslashes($row['satuan_prod']) . "',
															
															
														};\n";
										}
										?>
									</select>
								</div>
							</div>




							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Produk</label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd" readonly></textarea>
								</div>
							</div>
					</td>

					<input id="diskonspa" placeholder="dispa">
					<input id="diskonujispa" placeholder="disuji">
					<input id="expdates" placeholder="expdates">
					<input id="idprod_on" placeholder="idprod_on">
					<input id="pabrik_on" placeholder="pabrik_on">


					<td colspan="1" class="cd">
						<fieldset class="field_form">
							<legend class="legend_form">Harga Produk</legend>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Harga/Unit *</label>
								<div class="col-sm-7">
									<input type="text" class="form-control harga" id="harga" placeholder="Rp 1.500" onkeyup="rp();count();">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Jumlah *</label>
								<div class="col-sm-2">
									<div class="input-group-prepend">
										<input class="form-control jumlah" type="text" style="height:28px; width:70px;" onkeyup="count();" id="jumlah" placeholder="99">
										<input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">

									</div>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Ongkos Kirim *</label>
								<div class="col-sm-7">
									<input type="text" class="form-control ongkir" id="ongkir" placeholder="Rp 1.500" onkeyup="rp();count();">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Total Harga </label>
								<div class="col-sm-7">
									<input type="text" class="form-control total" id="total" placeholder="Rp 1.500" onkeyup="rp();count();" readonly>
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
									<textarea class="form-control" rows="1" placeholder="Nama Pemesan" id="pemesan"></textarea>

								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Status Paket *</label>
								<div class="col-sm-6">
									<select class="form-control" id="status" style=" height:32px; width:310px;">
										<option value="">Pilih Status</option>
										<option value="Sepakat">Sepakat</option>
										<option value="Masih Negosiasi">Masih Negosiasi</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tgl Buat *</label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="tglbuat">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tgl Edit</label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="tgledit">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea class="form-control" rows="1" placeholder="Keterangan" id="ket"></textarea>
								</div>
							</div>

					</td>
				</tr>
		</table>





		<button type="submit" class="btn btn-success" style="position: absolute; right:55%;" onclick="return confirm('Yakin Tambah Data ?');" id="register" name="tambah">Tambah Data</button>
		<a href="./index.php?hlm=spaoff" formnovalidate onclick="return confirm('Yakin Batal ?');" style="position: absolute; right:45%;" class="btn btn-danger">Batal</a>

		</form>
	</div>

	<script type="text/javascript">
		<?php echo $jsArray;
		?>

		function changeValue(sing_prod) {
			document.getElementById('nmprd').value = dtMhs[sing_prod].nam_prod;
			document.getElementById('harga').value = dtMhs[sing_prod].harga;
			document.getElementById('satuan_prod').value = dtMhs[sing_prod].satuan_prod;
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
		$("#type").chained("#kategori");
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

			var diskonspa = $("#diskonspa").val();
			var diskonujispa = $("#diskonujispa").val();
			var expdates = $("#expdates").val();
			var idprod_on = $("#idprod_on ").val();
			var pabrik_on = $("#pabrik_on").val();
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

			if (idorderoff == "" || jumlah == "" || pemesan == "" || ongkir == "" || distributor == "" || status == "" || type == "" || tglbuat == "") {
				$("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");
			} else {
				$("#error_message").html("").hide();
				$.ajax({
					type: "POST",
					url: "check_form/tambah/spaoff.php",
					data: "distributor=" + distributor + "&idorderoff=" + idorderoff + "&status=" + status + "&tglbuat=" + tglbuat + "&tgledit=" + tgledit + "&ket=" + ket + "&harga=" + harga + "&jumlah=" + jumlah + "&ongkir=" + ongkir + "&total=" + total + "&nmprd=" + nmprd + "&type=" + type + "&diskonspa=" + diskonspa + "&diskonujispa=" + diskonujispa + "&expdates=" + expdates + "&idprod_on=" + idprod_on + "&pabrik_on=" + pabrik_on + "&pemesan=" + pemesan,

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

	<script>
		$(document).ready(function() {
			$('#idorderoff').blur(function() {

				var idorderoff = $(this).val();
				console.log(idorderoff);
				$.ajax({
					url: 'check_double/tambah/spaoff.php',
					method: "POST",
					data: {
						idorderoff: idorderoff
					},
					success: function(data) {
						if (data != '0') {
							$('#availability').html('<span class="text-danger">ID Order Sudah Terpakai</span>');
							$('#register').attr("disabled", true);
						} else {
							$('#availability').html('<span class="text-success">ID Order Tersedia</span>');
							$('#register').attr("disabled", false);
						}
					}
				})

			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.distributor').select2();
		});
		$(document).ready(function() {
			$('.kategori').select2();
		});
		$(document).ready(function() {
			$('.type_prd').select2();
		});
	</script>


	<link href="select2/select2.min.css" rel="stylesheet" />
	<script src="select2/select2.min.js"></script>


</body>



</html>