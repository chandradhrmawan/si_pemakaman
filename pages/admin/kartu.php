<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>KARTU DATA MAKAM/PUSARA</title>
</head>

<body onload="print()">
  <?php 
  include "../../config.php";
  $id_jenazah = $_GET['id_jenazah'];
  $cek = mysql_query("SELECT
    jenazah.nama_jenazah,
    jenazah.tgl_meninggal,
    jenazah.jk_jenazah,
    jenazah.tempat_lahir,
    jenazah.tgl_lahir,
    jenazah.tgl_pemakaman,
    isi_lahan.id_detail_makam,
    isi_lahan.status_isi_lahan,
    detail_makam.no_makam,
    blok.nama_blok,
    kelas.nama_kelas,
    jenis_makam.nama_jenis_makam,
    tpu.wilayah_tpu,
    ahli_waris.nama_pewaris,
    ahli_waris.perkerjaan_pewaris,
    ahli_waris.alamat_pewaris
    FROM
    isi_lahan
    INNER JOIN detail_makam ON detail_makam.id_detail_makam = isi_lahan.id_detail_makam
    INNER JOIN blok ON blok.id_blok = detail_makam.id_blok
    INNER JOIN kelas ON kelas.id_kelas = detail_makam.id_kelas
    INNER JOIN jenis_makam ON jenis_makam.id_jenis_makam = detail_makam.id_jenis_makam
    INNER JOIN tpu ON tpu.id_tpu = detail_makam.id_tpu
    INNER JOIN jenazah ON jenazah.id_jenazah = isi_lahan.id_jenazah
    INNER JOIN ahli_waris ON jenazah.id_ahli_waris = ahli_waris.id_ahli_waris
    WHERE
    isi_lahan.id_jenazah = '$id_jenazah'");
  while($row = mysql_fetch_array($cek))
  {
    ?>
    <table width="600" border="0" align="center">
      <tr>
        <td>

         <table width="100%" border="0">
          <tr>
            <td colspan="2" align="center"><img src="kop_surat.JPG" align="top" /></td>
         </tr>
       </table>
       <hr/>
       <div align="center">
         <strong><h3><u>KARTU DATA MAKAM/PUSARA</u></h3></strong>
       </div>
       <table width="100%" border="0" align="center">
        <tr>
          <td colspan="4"><strong>DATA YANG MENINGGAL : </strong></td>
        </tr>
        <tr>
          <td width="3%">1.</td>
          <td width="36%">Nama</td>
          <td width="2%">:</td>
          <td width="59%"><?php echo $row['nama_jenazah']; ?></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Tanggal Meninggal</td>
          <td>:</td>
          <td><?php echo $row['tgl_meninggal']; ?></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Jenis Kelamin </td>
          <td>:</td>
          <td><?php echo $row['jk_jenazah']; ?></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Tempat, tanggal lahir </td>
          <td>:</td>
          <td><?php echo $row['tempat_lahir']; ?>, <?php echo date("d/m/Y",strtotime($row['tgl_lahir'])); ?></td>
        </tr>
        <tr>
          <td>6.</td>
          <td>Tanggal Pemakaman </td>
          <td>:</td>
          <td><?php echo date("d/m/Y",strtotime($row['tgl_pemakaman'])); ?></td>
        </tr>
        <tr>
          <td>8.</td>
          <td>Lokasi Pemakaman di TPU </td>
          <td>:</td>
          <td><?php echo $row['wilayah_tpu']; ?> 
            Kelas : <?php echo $row['nama_kelas']; ?> 
            Blok :  <?php echo $row['nama_blok']; ?> 
            No Makam :  <?php echo $row['no_makam']; ?></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4"><div align="center"><strong>AHLI WARIS/KELUARGA/PENANGGUNG JAWAB </strong></div></td>
          </tr>
          <tr>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $row['nama_pewaris']; ?></td>
          </tr>
          <tr>
            <td>3.</td>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?php echo $row['perkerjaan_pewaris']; ?></td>
          </tr>
          <tr>
            <td>4.</td>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $row['alamat_pewaris']; ?></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="center">Bandung, <?php echo date("d / M / Y"); ?><br />
              An. KEPALA DINAS PEMAKAMAN DAN PERTAMANAN KOTA BANDUNG<br />
            Kepala Bidang Pemakaman</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><p align="center">&nbsp;</p>
              <p align="center">ADANG SULTANA. SH<br />Pembina<br />NIP: 195804181985031005</p></td>
            </tr>
          </table>	</td>
        </tr>
      </table>
      <?php } ?>
    </body>
    </html>
