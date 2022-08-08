<?php
include "conn.php";
if (isset($_POST["submit"])) {
    $act_name=$_POST["act_name"];
    $category=$_POST["category"];
    $save=mysqli_query($conn, "INSERT INTO activities VALUES ('', '$act_name', '$category')");
    if ($save) {
        echo "<script type='text/javascript'>
            alert ('Adding Activity Success');
            document.location.href='act.php';
            </script>;";
    }else{
        echo "<script type='text/javascript'>
            alert ('Adding Activity Failed');
            document.location.href='act-add.php';
            </script>;";
    }
}
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
            color: darkperu;
        } */
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid black;
            /* border-radius: 100vw; */
            width: 500px;
        }
        .title{
            font-size: 50px;
            text-align: center;
        }
        .input{
            display: grid;
            grid-template-columns: auto auto;
            border: 1px solid black;
        }
        .input-item{
            /* border: 1px solid black; */
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }
        .bt-box{
            /* border: 1px solid black; */
            display: grid;
            grid-template-columns: auto auto;
            gap: 20px;
            text-align: center;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .head{
            text-decoration: none;
            color: black;
        }
        .bt{
            border: 1px solid black;
            text-decoration: none;
            /* padding-inline: 10px; */
            padding: 2px 10px 2px 10px;
        }
        .bt:hover{
            border: none;
            box-shadow: 0 0 .5em turquoise;
            color: turquoise;
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
        <form action="" method="post">
            <div class="input">
                <div class="input-item">
                    <label for="act_name">Acivity Name</label>
                </div>
                <div class="input-item">
                    <input type="text" name="act_name" id="act_name">
                </div>
                <div class="input-item">
                    <label for="category">Category</label>
                </div>
                <div class="input-item">
                    <input type="text" name="category" id="category">
                    <!-- <select name="category" id="category">
                        <option value="">--Pick--</option>
                        <option value="Gaming">Gaming</option>
                        <option value="Music">Music</option>
                    </select> -->
                </div>
            </div>
            <div class="bt-box">
                <button type="submit" name="submit">Save</button>
                <a href="act.php" class="bt">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>