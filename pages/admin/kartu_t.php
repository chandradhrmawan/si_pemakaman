<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>KARTU DATA MAKAM/PUSARA</title>
</head>

<body onload="print()">
  <?php 
  include "../../config.php";
  $id_jenazah_t = $_GET['id_jenazah_t'];
  $cek = mysql_query("SELECT jenazah_tidak_dikenal.*,jenis_makam.nama_jenis_makam 
    FROM jenazah_tidak_dikenal
    INNER JOIN jenis_makam ON jenis_makam.id_jenis_makam = jenazah_tidak_dikenal.id_jenis_makam
    WHERE
    jenazah_tidak_dikenal.id_jenazah_t = '$id_jenazah_t'");
  $row = mysql_fetch_array($cek);
  
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
       <strong><h3><u>KARTU PERMOHONANA JENAZAH TIDAK TERIDENTIFIKASI</u></h3></strong>
     </div>
     <table width="100%" border="0" align="center">
      <tr>
        <td colspan="4"><strong>DATA YANG MENINGGAL : </strong></td>
      </tr>
      <tr>
        <td width="3%">1.</td>
        <td width="36%">Tanggal Registrasi</td>
        <td width="2%">:</td>
        <td width="59%"><?php echo $row['tgl_registrasi_t']; ?></td>
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
        <td>6.</td>
        <td>Tanggal Pemakaman </td>
        <td>:</td>
        <td><?php echo date("d/m/Y",strtotime($row['tgl_pemakaman'])); ?></td>
      </tr>
      <tr>
        <td>8.</td>
        <td>Lokasi Pemakaman di TPU </td>
        <td>:</td>
        <td>Sinaraga 
          Kelas : Kelas 3 
          Blok :  Blok A 
          No Makam :  15</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><strong>ASAL JENAZAH TIDAK TERIDENTIFIKASI </strong></div></td>
        </tr>
        <tr>
          <td>1.</td>
          <td>Asal</td>
          <td>:</td>
          <td><?php echo $row['asal']; ?></td>
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
  </body>
  </html>
