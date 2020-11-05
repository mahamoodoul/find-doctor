<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find a Doctor</title>
    <!-- Latest compiled and minified CSS -->
    <style>
        .header {
            margin: 0px 5px 50px 5px;
            text-align: center;
            border: 1px solid green;
            background-color: rgb(56, 164, 160);
            background: -moz-linear-gradient(left, rgb(56, 164, 160) 0%, rgb(203, 133, 35) 40%, rgb(117, 31, 100) 100%);
            background: -webkit-linear-gradient(left, rgb(56, 164, 160) 0%, rgb(203, 133, 35) 40%, rgb(117, 31, 100) 100%);
            background: linear-gradient(to right, rgb(56, 164, 160) 0%, rgb(203, 133, 35) 40%, rgb(117, 31, 100) 100%);
            ;
            display: flex;

        }

        .address {

            font-weight: 700;
        }

        .medicine {
            /* margin-left: 80px; */
            border: 1px solid black;
            align-items: center;
        }

        .paitent {

            margin-top: 20px;
            margin-bottom: 20px;
            /* text-align: center; */
            /* display: flex; */

        }



        .table {
            margin-left: 40px;

        }




        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 90%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .footer {
            position: static;
            left: 0;
            bottom: 0;
            height: 70px;
            margin-top: 40px;
            width: 100%;
            background-color: green;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">


        <div style="margin-left: 300px;" class="docttorInfo">

            <h3>Name : <?php echo $doc_info[0]->name; ?></h3>
            <h3>Degree: <?php echo $doc_info[0]->degree; ?> in <?php echo $doc_info[0]->subject; ?> </h3>
            <h3>Psition : <?php echo $doc_info[0]->job_position; ?> In <?php echo $doc_info[0]->company_name; ?></h3>
            <h3><?php echo $doc_info[0]->institution; ?></h3>
        </div>

        <div class="title">
            <h1>Find A Doctor LTD</h1>
            <h3 class="address">Address: Shukrabad,Dhanmondi</h3>
        </div>

    </div>

    <div class="paitent ">

        <h5>Paitent Name: <?php echo $paitent_info['0']->name; ?></h5>
        <h5>Age: <?php echo $paitent_info['0']->age; ?></h5>
        <h5>Phone: <?php echo $paitent_info['0']->phone; ?></h5>
        <h5>Blood Groupd: <?php echo $paitent_info['0']->blood_group; ?></h5>

        <h5>Date: <?php echo $date; ?></h5>
        <h5>Appointment ID : <?php echo  $app_id; ?></h5>
    </div>

    <table id="customers" class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Medicine Time</th>
                <th scope="col">Procedure</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $name = $med_name;
            $time = $med_time;
            $proc = $procedure;


            if ($name)
                for ($i = 0; $i < count($name); $i++) {
            ?>

                <tr>
                    <th scope="row"><?php echo $i + 1; ?></th>
                    <td><?php echo $name[$i]; ?></td>
                    <td><?php echo $time[$i]; ?></td>
                    <td><?php echo $proc[$i]; ?></td>
                </tr>

            <?php
                }
            ?>


        </tbody>
    </table>

    <div class="footer">
        <p style="padding-top: 20px;">Find A Doctor</p>
    </div>



</body>

</html>