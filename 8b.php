<?php
$conn=new
mysqli("localhost","root","","students_db");
if($conn->connect_error)die("DB failed");
$r=$conn->query("select * from students");
$students=[];
while($row=$r->fetch_assoc())$students[]=$row;
function  selsort(&$a,$k){
    $n=count($a);
    for($i=0;$i<$n-1;$i++){
        $m=$i;
        for($j=$i+1;$j<$n;$j++)
            if($a[$j][$k]<$a[$m][$k])$m=$j;
        if($m!=$i){$t=$a[$i];$a[$i]=$a[$m];
        $a[$m]=$t;}}}

        selsort($students,'marks');
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            
            <title>Sorted Records</title>
            <style>
                body{
                    font-family:arial;
                    background:#f5f5f5
                }
                table{
                    width:60%;
                    margin:auto;
                    border-collapse:collapse;
                    background:#fff;
                    box-shadow:0 4px 6px rgba(0,0,0,.1)
                }

                th,td{
                    padding:10px;
                    border-bottom:1px solid #ddd
                }
                th{
                    background:#f4b400;
                    color:#fff
                }
                tr:hover{
                    background:#f1f1f1
                }
            </style>
        </head>
        <body>
            <h1 style="text-align:center">students sorted by marks</h1>
            <table>
                <tr><th>id</th><th>name</th><th>marks</th></tr>
                <?php foreach($students as $s):
                ?>
                <tr>
                    <td><?=$s['id']?></td>
                    <td><?=$s['name']?></td>
                    <td><?=$s['marks']?></td>
                </tr>
                <?php endforeach;?>
            </table>
        </body>
        </html>