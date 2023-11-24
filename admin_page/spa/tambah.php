<html>

<head>
    <title>Tambah</title>
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



                    <td colspan="1">
                        <fieldset class="field_form">
                            <legend class="legend_form">Info Produk</legend>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No LKPP *</label>
                                <div class="col-sm-4">
                                    <input class="form-control" rows="2" placeholder="No LKPP" id="nolkpp" name="nolkpp">
                                    <span id="availability"></span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Distributor*</label>
                                <div class="col-sm-1 ">
                                    <select id="distributor" type="text" name="distributor" style="width: 200px;" title="Distributor" onchange="changeDbs(this.value);rp();count();" class="distributor" required>
                                        <option value="disabled">Pilih Distributor</option>

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
                                        <div class="input-group-text  " style="height:28px;">
                                            AK1-P
                                        </div>
                                        <input class="form-control " type="text" id="noaks" placeholder="99" name="noaks">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kategori*</label>
                                <div class="col-sm-1 ">
                                    <select id="kategori" class="kategori" title="Kategori" required>
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
                                <label class="col-sm-3 col-form-label">Nama Produk *</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="2" placeholder="Nama Produk" id="nmprd" name="nmprd" readonly></textarea>
                                </div>
                            </div>
                    </td>

                    <input id="diskonspa" placeholder="dispa">
                    <input id="diskonujispa" placeholder="disuji">
                    <input id="expdates" placeholder="expdates">
                    <input id="idprod_on" placeholder="idprod_on">
                    <input id="pabrik_on" placeholder="pabrik_on">

                    <td colspan="1">
                        <fieldset class="field_form">
                            <legend class="legend_form">Harga Produk</legend>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga/Unit *</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control harga" id="harga" placeholder="Rp 1.500" name="harga" onkeyup="rp();count();">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah *</label>
                                <div class="col-sm-2">
                                    <div class="input-group-prepend">
                                        <input class="form-control jumlah" type="text" style="height:28px; width:70px;" name="jumlah" onkeyup="rp();count();" id="jumlah" placeholder="99">
                                        <input id="satuan_prod" class="input-group-text " readonly style="height:28px; width:90px; text-align:left;">

                                    </div>
                                </div>
                            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Ongkos Kirim *</label>
        <div class="col-sm-7">
            <input type="text" class="form-control ongkir" id="ongkir" placeholder="Rp 1.500" name="ongkos" onkeyup="rp();count();">
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Total Harga *</label>
        <div class="col-sm-7">
            <input type="text" class="form-control total" id="total" placeholder="Rp 1.500" name="total" onkeyup="rp();count();" readonly>
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
                    <textarea class="form-control" rows="1" placeholder="Deskripsi" name="deskripsi" id="deskripsi"></textarea>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Instansi *</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="1" placeholder="Nama Instansi" name="instansi" id="instansi"></textarea>
                </div>
            </div>



            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Satuan Kerja *</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="1" placeholder="Nama Satuan Kerja" name="satuan" id="satuan"></textarea>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status Paket *</label>
                <div class="col-sm-6">
                    <select class="form-control" style=" height:32px; width:310px;" name="status" id="status">
                        <option value="">Pilih Status</option>
                        <option value="Sepakat">Sepakat</option>
                        <option value="Masih Negosiasi">Masih Negosiasi</option>
                        <option value="Batal">Batal</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tgl Buat *</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tglbuat" id="tglbuat">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tgl Edit </label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" placeholder="Rp 1.500" name="tgledit" id="tgledit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tgl Kontrak *</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" placeholder="Rp 1.500" name="tglkontrak" id="tglkontrak">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="1" placeholder="Keterangan" name="ket" id="ket"></textarea>

                </div>
            </div>
    </td>
    </tr>
    </table>


    <button type="submit" class="btn btn-success" style="position: absolute; right:55%;" onclick="return confirm('Yakin Tambah Data ?');" id="register" name="tambah">Tambah Data</button>

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
            document.getElementById('satuan_prod').value = dtMhs[sing_prod].satuan_prod;

        };
    </script>

    <script type="text/javascript">
        console.log("tes");
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
        $(document).ready(function() {
            $('#nolkpp').blur(function() {

                var nolkpp = $(this).val();

                $.ajax({

                    url: 'check_double/tambah/spaon.php',
                    method: "POST",
                    data: {
                        nolkpp: nolkpp
                    },
                    success: function(data) {
                        if (data != '0') {
                            $('#availability').html('<span class="text-danger">No LKPP Sudah Terpakai</span>');
                            $('#register').attr("disabled", true);
                        } else {
                            $('#availability').html('<span class="text-success">No LKPP Tersedia</span>');
                            $('#register').attr("disabled", false);
                        }
                    }
                })

            });
        });
    </script>

    <script>
        $("#form-contact").submit(function(e) {
            e.preventDefault();


            var distributor = $("#distributor").val();
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
            var tglkontrak = $("#tglkontrak").val();
            var tgledit = $("#tgledit").val();
            var ket = $("#ket").val();
            var diskonspa = $("#diskonspa").val();
            var diskonujispa = $("#diskonujispa").val();
            var expdates = $("#expdates").val();
            var idprod_on = $("#idprod_on").val();
            var pabrik_on = $("#pabrik_on").val();

            if (nolkpp == "" || distributor == "" || type == "" || jumlah == "" || noaks == "" || satuan == "" || ongkir == "" || deskripsi == "" || instansi == "" || status == "" || tglbuat == "" ) {
                $("#error_message").show().html("Harap Mengisi, Field yang wajib di isi! (*)");

            } else

            {
                $("#error_message").html("").hide();
                $.ajax({
                    type: "POST",
                    url: "check_form/tambah/spaon.php",
                    data: "nolkpp=" + nolkpp + "&jumlah=" + jumlah + "&harga=" + harga + "&satuan=" + satuan + "&tgledit=" + tgledit + "&noaks=" + noaks + "&ongkir=" + ongkir + "&deskripsi=" + deskripsi + "&instansi=" + instansi + "&status=" + status + "&tglbuat=" + tglbuat + "&ket=" + ket + "&diskonspa=" + diskonspa + "&diskonujispa=" + diskonujispa + "&pabrik_on=" + pabrik_on + "&idprod_on=" + idprod_on + "&expdates=" + expdates + "&distributor=" + distributor + "&tglkontrak=" + tglkontrak,


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