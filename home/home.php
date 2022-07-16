<!-- <link rel="stylesheet" href="style.css"> -->
<?php
    include("home.html");

    global $database;

    if(isset($_POST["surch"]) && $_POST["surch"] != ""){
    $data = $database->select("termine",[
        "name",
        "zeit",
        "id",
    ],["user_id" => $_SESSION["user_id"], "name" => $_POST["surch"]]);
}else{
    $data = $database->select("termine",[
        "name",
        "zeit",
        "id",
    ],["user_id" => $_SESSION["user_id"]]);
}

$data = json_decode(json_encode($data));

    foreach($data as $hallo){
        echo "
        <div class='container'>
            <div class='boxen'>
                <div class='box2'>
                    <a href='?page=remove&id=".$hallo->id."'><i class='fa-regular fa-trash-can'></i></a>
                    <div class='content'>
                        <p>".$hallo->zeit."</p>
                        <p>".$hallo->name."</p>
                        <a href='?page=edit&id=".$hallo->id."'><i class='fa-solid fa-pen'></i></a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

?>