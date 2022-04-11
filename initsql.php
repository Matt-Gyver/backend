<?php
$servername = "localhost";
$username = "kcni9234_vannestemathieu";
$password = "C[!YyenK?v[8";
$dbname = "kcni9234_vannestemathieu";
$urlXml = "http://fe.digitalinit.net/data/immo.xml";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "<p> connection failed </p>" ;
}else {
  echo "<p> connection succeeded </p>" ;
};

$xml=simplexml_load_file($urlXml) or die("Error");

foreach ($xml->bien as $bien){
  $id_bien=$bien->id_bien;
  $id_user=$bien->id_user;
  $type_annonce=$bien->type_annonce;
  $type_bien=$bien->type_bien;
  $sold=$bien->sold;
  $lib=$bien->lib;
  $description=$bien->description;
  $prix=$bien->prix;
  $photo=$bien->photo;
  $classe_energie=$bien->classe_energie;
  $chambre=$bien->chambre;
  $sdb=$bien->sdb;
  $wc=$bien->wc;
  $st=$bien->st;
  $sh=$bien->sh;

  //$insert_sql = "INSERT INTO TBL_BIEN(ID_BIEN,SOLD,LIB,DESCRIPTION,PRIX,PHOTO,CLASSE_ENERGIE,CHAMBRE,SDB,WC,ST,SH,ID_USER,ID_TYPE_BIEN,ID_TYPE_ANNONCE) VALUES ('$id_bien','$sold','$lib','$description','$prix','$photo','$classe_energie','$chambre','$sdb','$wc','$st','$sh,'$id_user','$type_bien','$type_annonce')";
  $insert_sql= "INSERT INTO TBL_BIEN(ID_BIEN,SOLD,LIB,DESCRIPTION,PRIX,PHOTO,CLASSE_ENERGIE,CHAMBRE,SDB,WC,ST,SH,ID_USER,ID_TYPE_BIEN,ID_TYPE_ANNONCE) VALUE('$id_bien','$sold','$lib','$description','$prix','$photo','$classe_energie','$chambre','$sdb','$wc','$st','$sh','$id_user','$type_bien','$type_annonce')";
  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
  

}
$conn->close();

?>