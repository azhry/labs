<?php 
define("HOSTNAME", "br-cdbr-azure-south-a.cloudapp.net");
define("USERNAME", "b89ed51f5d9bbe");
define("PASSWORD", "3f2785a2");
define("DBNAME", "db_azurems");

@mysql_connect(HOSTNAME, USERNAME, PASSWORD) or die(mysql_error());
@mysql_select_db(DBNAME);

$nama = $_POST["nama"];
$email = $_POST["email"];
if (isset($nama, $email)) {
	@mysql_query("INSERT INTO tamu VALUES('".$nama."', '".$email."')");
}

$sql = @mysql_query("SELECT * FROM tamu");
if (mysql_num_rows($sql) > 0) {
	$html = '<table><thead><th>Nama</th><th>Email</th></thead>';
	while ($row = mysql_fetch_array($sql)) {
		$html .= "<tr>";
		$html .= "<td>".$row->nama."</td>";
		$html .= "<td>".$row->email."</td>";
		$html .= "</tr>";
	}

	$html .= "</tbody></table>";
	echo $html;
}
?>