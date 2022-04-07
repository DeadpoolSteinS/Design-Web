<?php
$conn = mysqli_connect("localhost", "root", "", "design_web");

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    // save every data/row on $rows array
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) $rows[] = $row;

    // return 2d array where [row][column]
    return $rows;
}

if(isset($_POST["key"]))
{
    $key = $_POST["key"];
    $data = select("SELECT * FROM riwayat WHERE name LIKE '%$key%' OR address LIKE '%$key' OR telp LIKE '%$key%' OR email LIKE '%$key%' OR study LIKE '%$key%'");
}
else $data = select("SELECT * FROM riwayat");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2003941 - Novaldi Sandi Ago</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        .container{
            max-width: 1366px;
            margin: auto;
            padding: 10px;
        }
        h1{
            text-align: center;
            margin: 20px 0;
        }
        #crud{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        #create{
            padding: 2px 5px;
            background-color: rgb(36, 138, 36);
            color: white;
            text-decoration: none;
        }
        #create:hover{
            background-color: rgb(31, 221, 31);
        }
        #search{
            padding: 2px 5px;
            outline: none;
            border-radius: 2x;
        }
        #search-button{
            cursor: pointer;
            padding: 2px 5px;
        }
        #head{
            font-weight: bold;
            border-top: 1px solid black;
        }
        #head, .data{
            display: grid;
            grid-template-columns: 1fr 6fr 4fr 4fr 7fr 4fr 5fr;
            padding: 5px;
            border-bottom: 1px solid black;
        }
        #head > p:nth-child(1), .data > p:nth-child(1){
            text-align: center;
        }
        .action > a{
            padding: 2px 5px;
            color: white;
            text-decoration: none;
        }
        .action > a:nth-child(1){
            background-color: rgb(39, 156, 160);
        }
        .action > a:nth-child(2){
            background-color: rgb(219, 22, 8);
        }
        .action > a:nth-child(3){
            background-color: rgb(174, 14, 142);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Riwayat Hidup</h1>
        <div id="crud">
            <a href="create-riwayat.php" id="create">Record Baru</a>
            <form action="" method="post">
                <input type="text" placeholder="Search..." id="search" name="key">
                <button type="submit" id="search-button">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>
        </div>
        <div class="table">
            <div id="head">
                <p>No</p>
                <p>Name</p>
                <p>Alamat</p>
                <p>Telp</p>
                <p>Email</p>
                <p>Pendidikan</p>
                <p>Aksi</p>
            </div>
            <?php $no = 1; foreach($data as $item):?>
            <div class="data">
                <p><?= $no; ?></p>
                <p><?= $item["name"]; ?></p>
                <p><?= $item["address"]; ?></p>
                <p><?= $item["telp"]; ?></p>
                <p><?= $item["email"]; ?></p>
                <p><?= $item["study"]; ?></p>
                <div class="action">
                    <a href="update-riwayat.php?id=<?= $item["id"]; ?>">Update</a>
                    <a href="delete.php?id=<?= $item["id"]; ?>&page=riwayat">Delete</a>
                    <a href="detail.php?id=<?= $item["id"]; ?>">Detail</a>
                </div>
            </div>
            <?php $no++; endforeach; ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>