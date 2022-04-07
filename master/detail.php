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

$id = $_GET["id"];
if(isset($_POST["key"]))
{
    $key = $_POST["key"];
    $data = select("SELECT * FROM detail WHERE year LIKE '%$key%' OR company LIKE '%$key%' OR field LIKE '%$key%' OR description LIKE '%$key%' AND id_riwayat=$id ORDER BY year ASC");
}
else $data = select("SELECT * FROM detail WHERE id_riwayat=$id ORDER BY year ASC");
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
            max-width: 1000px;
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
            margin-bottom: 10px;
        }
        #create, #back{
            padding: 2px 5px;
            color: white;
            text-decoration: none;
        }
        #create{
            background-color: rgb(36, 138, 36);
        }
        #create:hover{
            background-color: rgb(31, 221, 31);
        }
        #back{
            background-color: rgb(174, 14, 142);
        }
        #back:hover{
            background-color: rgb(204, 14, 162)
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
            grid-template-columns: 1fr 3fr 4fr 4fr 10fr 4fr;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Riwayat Hidup</h1>
        <div id="crud">
            <div>
                <a href="create-detail.php?id=<?= $id; ?>" id="create">Record Baru</a>
                <a href="index.php" id="back">Back</a>
            </div>
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
                <p>Tahun</p>
                <p>Perusahaan</p>
                <p>Bidang</p>
                <p>Keterangan</p>
                <p>Aksi</p>
            </div>
            <?php $no = 1; foreach($data as $item):?>
            <div class="data">
                <p><?= $no; ?></p>
                <p><?= $item["year"]; ?></p>
                <p><?= $item["company"]; ?></p>
                <p><?= $item["field"]; ?></p>
                <p><?= $item["description"]; ?></p>
                <div class="action">
                    <a href="update-detail.php?id=<?php echo $item["id"] . "&id_riw=" . $id; ?>">Update</a>
                    <a href="delete.php?id=<?php echo $item["id"] . "&id_riw=" . $id; ?>&page=detail">Delete</a>
                </div>
            </div>
            <?php $no++; endforeach; ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>