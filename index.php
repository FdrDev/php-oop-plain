<?php

  class Pagamento {
    public $id;
    public $status;
    public $price;
    public $prenotazione_id;
    public $pagante_id;

    function __construct($id , $status ,
                        $price ,$prenotazione_id,
                        $pagante_id){

      $this->id= $id;
      $this->status = $status;
      $this->price = $price;
      $this->prenotazione_id = $prenotazione_id;
      $this->pagante_id = $pagante_id;

    }

    function printMe(){

      echo $this->id .": " .
           // $this->status . " " .
           $this->price . " " .
           // $this->prenotazione_id . " " .
           // $this->pagante_id .
           "<br>";
    }

  }

  $servername = "localhost";
  $username = "root";
  $password = "FedePhp992";
  $dbname = "Prova1";

  $conn = new mysqli($servername,$username,$password,$dbname);

  if($conn->connect_errno){
    echo $conn->connect_error;
    return;
  }
  /*################  PENDING  ################################### */
  echo "PENDING" . "<br>";

  $sql1 = "
          SELECT *
          FROM pagamenti
          WHERE status LIKE 'pending'

  ";

  //array per immagazzinare i dati
  $infoPagamentiPending = [];

  $result = $conn->query($sql1);
  // var_dump($result); die();

  if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
      $infoPagamentiPending[] = new Pagamento($row["id"],
                                              $row["status"],
                                              $row["price"],
                                              $row["prenotazione_id"],
                                              $row["pagante_id"]);
    }
  } else{

    echo "0 result";

  }


  foreach ($infoPagamentiPending as $datiPagamento) {
    $datiPagamento->printMe();
  }

  /*###################  ACCEPTED  #####################################*/
  echo "ACCEPTED" . "<br>";



  $sql2 = "
          SELECT *
          FROM pagamenti
          WHERE status LIKE 'accepted'

  ";


  $infoPagamentiAccepted = [];

  $result = $conn->query($sql2);
  // var_dump($result); die();

  if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
      $infoPagamentiAccepted[] = new Pagamento($row["id"],
                                              $row["status"],
                                              $row["price"],
                                              $row["prenotazione_id"],
                                              $row["pagante_id"]);
    }
  } else{

    echo "0 result";

  }


  foreach ($infoPagamentiAccepted as $datiPagamento) {
    $datiPagamento->printMe();
  }


  /*#################  REJECTED  ######################################*/
  echo "REJECTED" . "<br>";

  $sql3 = "
          SELECT *
          FROM pagamenti
          WHERE status LIKE 'rejected'

  ";


  $infoPagamentiRejected = [];

  $result = $conn->query($sql3);
  // var_dump($result); die();

  if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
      $infoPagamentiRejected[] = new Pagamento($row["id"],
                                              $row["status"],
                                              $row["price"],
                                              $row["prenotazione_id"],
                                              $row["pagante_id"]);
    }
  } else{

    echo "0 result";

  }
  $conn->close();


  foreach ($infoPagamentiRejected as $datiPagamento) {
    $datiPagamento->printMe();
  }



 ?>
