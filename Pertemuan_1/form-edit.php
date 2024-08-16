<?php
include 'koneksi.php';

$id = $_GET['id_mhs']; // Pastikan id_mhs sesuai dengan parameter di URL
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs='$id'");
$row = mysqli_fetch_array($mahasiswa);

// Membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK ELEKTRO', 'REKAMEDIS');

// Membuat function untuk set aktif radio button
function active_radio_button($value, $input) {
    // Apabila value dari radio sama dengan yang di input
    return $value == $input ? 'checked' : '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Digital Talent</title>
</head>
<body>
    <form method="post" action="edit.php">
        <input type="hidden" name="id_mhs" value="<?php echo htmlspecialchars($row['id_mhs']); ?>">

        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']); ?>>Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']); ?>>Perempuan
                </td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan">
                        <?php
                        foreach ($jurusan as $j) {
                            echo "<option value='$j' ";
                            echo $row['jurusan'] == $j ? 'selected="selected"' : '';
                            echo ">$j</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">SIMPAN PERUBAHAN</button>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
