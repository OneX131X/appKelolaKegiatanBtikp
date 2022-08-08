<?php
include "conn.php";
$query=mysqli_query($conn, "SELECT * FROM activities");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8SUPER</title>
    <style>
        .menu-bar{
            position: relative;
            /* top: 0; */
            /* left: 0; */
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 10px;
            /* padding-bottom: 20px; */
            /* width: 100%; */
            /* border: 1px solid black; */
            align-items: center;
            justify-content: center;
        }
        .item{
            /* border: 1px solid black; */
            padding-block: 2px;
            padding-inline: 10px;
            font-style: oblique;
            /* text-align: center; */
            /* width: 70%; */
        }
        .item-txt{
            text-decoration: none;
            color: peru;
        }
        /* .item-txt:hover{
            color: turquoise;
        } */
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            /* border: 1px solid black; */
            box-shadow: 0 0 .5em darkgrey;
            /* border-radius: 100vw; */
            width: 500px;
        }
        .title{
            font-size: 50px;
            text-align: center;
        }
        .head{
            text-decoration: none;
            color: black;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        tr, td, th{
            padding: 10px;
            border: 1px solid black;
        }
        td{
            text-align: center;
        }
        .bt{
            border: 1px solid black;
            padding: 2px 10px 2px 10px;
            text-decoration: none;
            color: #2e2e2e;
        }
        .bt:hover{
            border: none;
            box-shadow: 0 0 .5em turquoise;
            color: turquoise;
        }
        .table-{
            padding-top: 20px;
        }
        .action{
            display: grid;
            /* grid-template-columns: auto auto; */
            /* gap: 10px; */
            width: 10%;
            /* text-align: center; */
        }
        .ball{
            /* font-size: 40px; */
            text-align: center;
            border: 1px solid black;
            border-radius: 100vw;
            width: 18px;
            padding: 4px;
            /* z-index: 2; */
            background-color: white;
        }
        .outer-ball{
            border: 1px solid black;
            border-radius: 100vw;
            padding: 16px;
            background-color: black;
        }
        .outer-ball:hover{
            background-color: #2e2e2e;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="menu-bar">
            <div class="item">
                <a class="item-txt" href="index.php">
                    <div class="outer-ball">
                        <div class="ball">8</div>
                    </div>
                </a>
            </div>
            <div class="item"><a class="item-txt bt" href="act.php">Activities</a></div>
            <div class="item"><a class="item-txt bt" href="todos.php">Todos</a></div>
        </div>
        <div class="title"><a class="head" href="index.php">Activities</a></div>
        <div>
            <a class="bt" href="act-add.php">Add</a>
        </div>
        <div class="table-">
            <table>
                <thead>
                    <tr>
                        <th>[]</th>
                        <th>Activity Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    while ($row=mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row["act_name"]; ?></td>
                        <td><?= $row["category"]; ?></td>
                        <td>
                            <div class="action">
                                <a class="bt" href="act-edit.php?id=<?= $row["id"]; ?>">Edit</a>
                                <a class="bt" href="act-delete.php?id=<?= $row["id"]; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>