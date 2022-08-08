<?php

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
            grid-template-columns: auto auto;
            gap: 20px;
            padding-bottom: 20px;
            /* width: 100%; */
            /* border: 1px solid black; */
            align-items: center;
            justify-content: center;
        }
        .item{
            border: 1px solid black;
            /* border-radius: 2em; */
            padding-block: 2px;
            padding-inline: 10px;
            font-style: oblique;
            text-align: center;
            width: 70%;
        }
        .item:hover{
            border: none;
            box-shadow: 0 0 0.2em turquoise;
        }
        .item-txt{
            text-decoration: none;
            color: peru;
        }
        .item-txt:hover{
            color: turquoise;
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            /* border: 1px solid black; */
            border-radius: 100vw;
            box-shadow: 0 0 0.5em darkgray;
            width: 500px;
        }
        .title{
            font-size: 50px;
            text-align: center;
        }
        .ball{
            font-size: 40px;
            text-align: center;
            border: 1px solid black;
            border-radius: 100vw;
            width: 50px;
            padding: 4px;
            z-index: 2;
            background-color: white;
        }
        .ball-txt{
            text-decoration: none;
            color: black;
        }
        .ball-txt:hover{
            color: #2e2e2e;
        }
        .outer-ball{
            border: 1px solid black;
            border-radius: 100vw;
            padding: 40px;
            background-color: black;
        }
        .outer-ball:hover{
            background-color: #2e2e2e;
            box-shadow: 0 0 0.5em black;
            transition: linear 120ms;
        }
        .ball-box{
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="menu-bar">
            <div class="item"><a class="item-txt" href="act.php">Activities</a></div>
            <div class="item"><a class="item-txt" href="todos.php">Todos</a></div>
        </div>
        <div class="ball-box">
            <a class="ball-txt" href="index.php">
                <div class="outer-ball">
                    <div class="ball">8</div>
                </div>
            </a>
        </div>
        <div class="title">SUPER</div>
    </div>
</body>
</html>