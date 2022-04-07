<?php
$conn = mysqli_connect("localhost", "root", "", "design_web");

function drop($id, $page)
{
    global $conn;

    // delete this data
    $query = "DELETE FROM $page WHERE id=$id";
    mysqli_query($conn, $query);
}

if(isset($_GET["id_riw"])) $id = $_GET["id_riw"];
$dest = ($_GET["page"] == "riwayat") ? "index.php" : "detail.php?id=$id";

if(isset($_GET["id"]))
{
    drop($_GET["id"], $_GET["page"]);
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = '$dest';
        </script>";
}
else
{
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = '$dest';
        </script>";
}
?>