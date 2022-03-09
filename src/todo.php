<?php
include 'post.php';
session_start();
// session_destroy();

?>
<html>

<head>
    <title>TODO List</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var arr = [];
        var data;
        $(document).ready(function() {
            $("#add").click(function()

                {



                    var value = $("#newtask").val();
                    console.log(value);


                    $.ajax({
                        url: "post.php",
                        type: "POST",
                        data: {
                            addtodo: value,
                            action: 'addData'
                        },
                        dataType: 'json',
                        success: function(data1) {
                            arr = data1;
                            display1(arr);


                        }
                    });
                });

        });


        function display1(arr2) {
            data = arr2.length;
            var html = '<table>';
            for (var i = 0; i < arr2.length; i++) {


                html += "<tr><td><input type='checkbox' id='" + i + "' onclick='compleated(" + i + ")'></td><td>" + arr2[i] + "</td><td><input type='text'></td><td><button onclick='edit(" + i + ")' >Edit</button></td><td><button onclick='deleteThis(" + i + ")' >Delete</button></td></tr>";
            }
            html += "</table>";
            document.getElementById("result1").innerHTML = html;
            console.log("data is" + arr[0]);
        }





        function compleated(x) {


            $.ajax({
                url: "post.php",
                type: "POST",
                data: {
                    key1: x,
                    action: 'complete'
                },
                dataType: 'json',
                success: function(data2) {

                    var arr9 = data2;
                    display2(arr9);
                    display3(arr9, x);
                    console.log(arr2);

                }




            });




        }

        function edit(x) {
            for (var i = 0; i < data; i++) {
                if (i == x) {
                    $("#newtask").val(arr[i]);
                    var y = i;
                }
            }


            $("#update").on("click", function() {
                var editTask = $("#newtask").val();
                console.log(editTask);
                console.log(x);



                $.ajax({
                    url: "post.php",
                    type: "POST",
                    data: {
                        key2: y,
                        key3: editTask,

                        action: 'update'
                    },
                    dataType: 'json',
                    success: function(data3) {

                        var arrNew = data3;
                        display1(arrNew);
                        console.log(arrNew);


                    }




                });




            })









        }




        function deleteThis(x) {

            $.ajax({
                url: "post.php",
                type: "POST",
                data: {
                    key4: x,


                    action: 'delete'
                },
                dataType: 'json',
                success: function(data4) {

                    var arrDelet = data4;
                    display1(arrDelet);
                    console.log(arrDelet);


                }




            });






        }


        function display2(arr3) {
            var html1 = '<table>';
            for (var i = 0; i < arr3.length; i++) {


                html1 += "<tr><td><input type='checkbox' id='" + i + "' onclick='compleated(" + i + ")'></td><td>" + arr2[i] + "</td><td><input type='text'></td><td><button onclick='edit(" + i + ")' >Edit</button></td><td><button onclick='deleteThis(" + i + ")' >Delete</button></td></tr>";
            }
            html1 = "</table>";
            document.getElementById("result2").innerHTML = html1;
        }



        function display3(arr, x) {
            var html2 = '<table>';
            for (var i = 0; i < arr.length; i++) {
                if (x == i) {
                    arr.splice(i, 1);
                    continue;
                }

                html2 += "<tr><td><input type='checkbox' id='" + i + "' onclick='compleated(" + i + ")'></td><td>" + arr2[i] + "</td><td><input type='text'></td><td><button onclick='edit(" + i + ")' >Edit</button></td><td><button onclick='deleteThis(" + i + ")' >Delete</button></td></tr>";
            }
            html2 = "</table>";
            document.getElementById("result").innerHTML = html2;
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>TODO LIST</h2>
        <h3>Add Item</h3>
        <p>
            <input id="newtask" type="text">
            <button id="add">Add</button>
            <button id="update">update</button>
        </p>

        <h3>Todo</h3>
        <ul id="incomplete-tasks">
            <li><input type="checkbox"><label>Pay Bills</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
            <div class="div2" id="result1"></div>
            <li><input type="checkbox"><label>Go Shopping</label><input type="text" value="Go Shopping"><button class="edit">Edit</button><button class="delete">Delete</button></li>
        </ul>

        <h3>Completed</h3>
        <ul id="completed-tasks">
            <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
            <div class="div2" id="result2"></div>

        </ul>
    </div>

</body>

</html>