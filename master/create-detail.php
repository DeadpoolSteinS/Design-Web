<?php
$conn = mysqli_connect("localhost", "root", "", "design_web");

function insert($id)
{
    global $conn;
    $year        = htmlspecialchars($_POST["year"]);
    $company     = htmlspecialchars($_POST["company"]);
    $field       = htmlspecialchars($_POST["field"]);
    $description = htmlspecialchars($_POST["description"]);

    $query = "INSERT INTO detail VALUES (NULL, $id, '$year', '$company', '$field', '$description')";
    mysqli_query($conn, $query);
}

$id = $_GET["id"];
if(isset($_POST['submit']))
{
    insert($id);
    echo "<script>
            alert('Data berhasil ditambahkan!');
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Detail</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body{
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .container{
            width: 500px;
            margin: auto;
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
            background-color: #ddd;
        }
        h1{
            text-align: center;
            margin: 20px 0;
        }
        li{
            list-style: none;
            margin: 10px 0;
        }
        li > input{
            width: 100%;
            padding: 5px 10px;
            border-radius: 3px;
            outline: none;
            border: 1px solid black;
        }
        li:nth-child(5){
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        #back, #submit{
            padding: 2px 5px;
            color: white;
            border-radius: 2px;
        }
        #back{
            background-color: rgb(190, 22, 8);
            text-decoration: none;
        }
        #back:hover{
            background-color: rgb(219, 22, 8);
        }
        #submit{
            cursor: pointer;
            display: block;
            background-color: rgb(31, 180, 31);
            border: none;
            font-size: 1rem;
        }
        #submit:hover{
            background-color: rgb(31, 200, 31);
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Form Detail Riwayat Hidup</h1>
        <form action="" method="post">
            <li>
                <label for="year">Tahun :</label>
                <input type="number" name="year" id="year">
            </li>
            <li>
                <label for="company">Perusahaan :</label>
                <input type="text" name="company" id="company">
            </li>
            <li>
                <label for="field">Bidang :</label>
                <input type="text" name="field" id="field">
            </li>
            <li>
                <label for="description">Keterangan :</label>
                <input type="text" name="description" id="description">
            </li>
            <li>
                <a href="detail.php?id=<?= $id; ?>" id="back">Back</a>
                <button type="submit" name="submit" id="submit">Submit</button>
            </li>
        </form>
    </div>
</body>
</html>