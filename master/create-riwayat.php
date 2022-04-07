<?php
$conn = mysqli_connect("localhost", "root", "", "design_web");

function insert()
{
    global $conn;
    $name        = htmlspecialchars($_POST["name"]);
    $address     = htmlspecialchars($_POST["address"]);
    $telp        = htmlspecialchars($_POST["telp"]);
    $email       = htmlspecialchars($_POST["email"]);
    $study       = htmlspecialchars($_POST["study"]);

    $query = "INSERT INTO riwayat VALUES (NULL, '$name', '$address', '$telp', '$email', '$study')";
    mysqli_query($conn, $query);
}

if(isset($_POST['submit']))
{
    insert();
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
    <title>Add Riwayat</title>
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
        li:nth-child(6){
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
        <h1>Form Riwayat Hidup</h1>
        <form action="" method="post">
            <li>
                <label for="name">Nama :</label>
                <input type="text" name="name" id="name">
            </li>
            <li>
                <label for="address">Alamat :</label>
                <input type="text" name="address" id="address">
            </li>
            <li>
                <label for="telp">Telp :</label>
                <input type="text" name="telp" id="telp">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email">
            </li>
            <li>
                <label for="study">Pendidikan :</label>
                <input type="text" name="study" id="study">
            </li>
            <li>
                <a href="index.php" id="back">Back</a>
                <button type="submit" name="submit" id="submit">Submit</button>
            </li>
        </form>
    </div>
</body>
</html>