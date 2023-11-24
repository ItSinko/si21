<?Php
$nolkpp_on = $_GET['nolkpp_on'];
$datas = mysqli_query($con, "SELECT * , harga_on * jumlah_on + ongkos_on as total
												FROM spa_on INNER JOIN  distributor ON distributor.iddsb =spa_on.pabrik_on
												INNER JOIN  produk_master ON spa_on.idprod_on = produk_master.id_prod  WHERE nolkpp_on ='$nolkpp_on' ");

while ($spa = mysqli_fetch_array($datas)) {

    $noaks = $spa["noaks_on"];
    $potongaks = substr($noaks, 5);

?>
    <html>

    <head>
        <title>Ubah</title>
    </head>
    <style>
        td:hover {
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



        [class^="cus-"],
        [class*=" cus-"] {
            display: inline-block;
            width: 17px;
            height: 16px;
            *margin-right: .3em;
            line-height: 14px;
            vertical-align: text-top;
            background-image: url("spritesheet.png");
            background-position: 14px 14px;
            background-repeat: no-repeat;
        }

        [class^="cus-"]:last-child,
        [class*=" cus-"]:last-child {
            *margin-left: 0;
        }


        .cus-accept {
            width: 16px;
            height: 16px;
            background-position: -5px -5px;
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

        input[id=pabrik_on] {
            display: none;
        }

        input[id=no] {
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

                        <td colspan="1">
                            <fieldset class="field_form">
                                <legend class="legend_form">Info Produk</legend>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No LKPP *</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" rows="2" placeholder="No LKPP" id="nolkpp" name="nolkpp" value="<?= $spa["nolkpp_on"]; ?>" readonly>
                                        <span id="availability"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Distributor *</label>
                                    <div class="col-sm-2 ">
                                        <select id="distributor" name="distributor" class="distributor" onchange="changeDbs(this.value);rp();count();" required style="width: 200px;">
                                            <option value="<?= $spa["pabrik"]; ?>"><?php echo $spa["pabrik"]; ?></option>

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
														
														
														};\n";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No AK1 *</label>
                                    <div class="col-sm-6">
                                        <div class="input-group-prepend ">
                                            <div class="input-group-text  " style="height:`28px;">
                                                AK1-P
                                            </div>
                                            <input class="form-control " type="text" id="noaks" placeholder="99" name="noaks" value="<?php echo $potongaks ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-7 ">
                                        <input class="form-control form-control-inline" style=" height:28px;" readonly value="<?= $spa["sing_prod"]; ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Produk</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="1" placeholder="Nama Produk" id="nmprd" readonly><?php echo $spa["nam_prod"]; ?></textarea>
                                    </div>
                                </div>
                        </td>



                        <input id="diskonspa" placeholder="dispa" value="<?= $spa["diskon_nota_on"]; ?>">
                        <input id="diskonujispa" placeholder="disuji" value="<?= $spa["diskon_uji_on"]; ?>">
                        <input id="expdates" placeholder="expdates" value="<?= $spa["temphari_on"]; ?>">
                        <input id="idprod_on" placeholder="idprod_on" value="<?= $spa["idprod_on"]; ?>">
                        <input id="pabrik_on" placeholder="pabrik_on" value="<?= $spa["pabrik_on"]; ?>">
                        <input id="no" placeholder="pabrik_on" value="<?= $spa["no_on"]; ?>">

                        <td colspan="1">
                            <fieldset class="field_form">
                                <legend class="legend_form">Harga Produk</legend>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Harga/Unit *</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control harga" id="harga" placeholder="Rp 1.500" name="harga" onkeyup="rp();count();" value="<?= $spa["harga_on"]; ?>">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah *</label>
                                    <div class="col-sm-2">
                                        <div class="input-group-prepend">
                                            <input class="form-control jumlah" type="text" style="height:28px; width:70px;" name="jumlah" onkeyup="rp();count();" id="jumlah" placeholder="99" value="<?= $spa["jumlah_on"]; ?>">
                                            <input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;" value="<?= $spa["satuan_prod"]; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ongkos Kirim *</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control ongkir" id="ongkir" placeholder="Rp 1.500" name="ongkos" onkeyup="rp();count();" value="<?= $spa["ongkos_on"]; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Total Harga *</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control total" id="total" placeholder="Rp 1.500" name="total" onkeyup="rp();count();" value="<?= $spa["total"]; ?>" readonly>
                                    </div>
                                </div>
                        </td>
                        </fieldset>

                        <td colspan="1">
                            <fieldset class="field_form">
                                <legend class="legend_form">Info Pemesan</legend>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Deskripsi Paket *</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" placeholder="Deskripsi" name="deskripsi" id="deskripsi"><?php echo $spa["despaket_on"]; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Instansi *</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" placeholder="Nama Instansi" name="instansi" id="instansi"><?php echo $spa["instansi_on"]; ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Satuan Kerja *</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" placeholder="Nama Satuan Kerja" name="satuan" id="satuan"><?php echo $spa["satuan_on"]; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Paket *</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" style=" height:32px; width:310px;" name="status" id="status">
                                            <option value="<?= $spa["status_on"]; ?>"><?php echo $spa["status_on"]; ?></option>
                                            <option value="Sepakat">Sepakat</option>
                                            <option value="Masih Negosiasi">Masih Negosiasi</option>
                                            <option value="Batal">Batal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tgl Buat*</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="tglbuat" id="tglbuat" value="<?= $spa["tgl_buat_on"]; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tgl Edit</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" placeholder="Rp 1.500" nameE="tgledit" id="tgledit" value="<?= $spa["tgl_edit_on"]; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tgl kontrak</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" placeholder="Rp 1.500" nameE="tglkontrak" id="tglkontrak" value="<?= $spa["tgl_kontrak"]; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" placeholder="Keterangan" name="ket" id="ket"><?php echo $spa["ket_on"]; ?></textarea>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><span style=" color: Red;"><i class="fa fa-exclamation-circle"></i></span> Alasan data diubah </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="1" minlength="5" placeholder="Minimal isi 5 karakter..." id="ket_log"></textarea>
                                    </div>
                                </div>


                        </td>
                    </tr>
            </table>

            <input type="hidden" value="<?php echo $_SESSION['username'] ?>" id="username">
            <button type="submit" class="btn btn-success" style="position: absolute; right:55%;" onclick="return confirm('Yakin Update Data ?');" id="register" name="tambah">Update Data</button>
            <a href="./index.php?hlm=spa" formnovalidate onclick="return confirm('Yakin Batal ?');" style="position: absolute; right:45%;" class="btn btn-danger">Batal</a>
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
                var no = $("#no").val();
                var nolkpp = $("#nolkpp").val();
                var noaks = $("#noaks").val();
                var harga = $("#harga").val();
                var jumlah = $("#jumlah").val();
                var ongkir = $("#ongkir").val();
                var deskripsi = $("#deskripsi").val();
                var instansi = $("#instansi").val();
                var satuan = $("#satuan").val();
                var status = $("#status").val();
                var tglbuat = $("#tglbuat").val();
                var tgledit = $("#tgledit").val();
                var tglkontrak = $("#tglkontrak").val();
                var ket = $("#ket").val();
                var ket_log = $("#ket_log").val();
                var diskonspa = $("#diskonspa").val();
                var diskonujispa = $("#diskonujispa").val();
                var expdates = $("#expdates").val();
                var idprod_on = $("#idprod_on").val();
                var pabrik_on = $("#pabrik_on").val();
                var username = $("#username").val();


                if (nolkpp == "" || jumlah == "" || noaks == "" || satuan == "" || ongkir == "" || deskripsi == "" || instansi == "" || status == "" || tglbuat == ""  || ket_log == "") {
                    $("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");

                } else

                {
                    $("#error_message").html("").hide();
                    $.ajax({
                        type: "POST",
                        url: "check_form/edit/spaon.php",
                        data: "nolkpp=" + nolkpp + "&jumlah=" + jumlah + "&harga=" + harga + "&satuan=" + satuan + "&tgledit=" + tgledit + "&noaks=" + noaks + "&ongkir=" + ongkir + "&deskripsi=" + deskripsi + "&instansi=" + instansi + "&status=" + status + "&tglbuat=" + tglbuat + "&tglkontrak=" + tglkontrak + "&ket=" + ket + "&diskonspa=" + diskonspa + "&diskonujispa=" + diskonujispa + "&pabrik_on=" + pabrik_on + "&idprod_on=" + idprod_on + "&expdates=" + expdates + "&no=" + no + "&ket_log=" + ket_log + "&username=" + username,


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