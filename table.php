<?php

include "database.php";
$res = fetch_noten(getConnection());

$it = fetch_gattung(getConnection())[0]['Type'];
$rst1 = explode(",", $it);
$rst1 = str_replace('enum', '', $rst1);
$rst1 = str_replace("'", '', $rst1);
$rst1 = str_replace('(', '', $rst1);
$rst1 = str_replace(')', '', $rst1);

session_start();


?>

<!DOCTYPE HTML>

<html>
    <head>

    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <script src="./javascripts/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />

    <!-- Featherlight Lightbox -->
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" />



    <style>


        .content {
            padding: 10px;
            margin: 0;
        }

        #login {
            float: right;
            margin-bottom: 50px;
        }

        .container {
            margin: 0 auto;
            width: 90%;
        //background-color: black;
            border: 1px solid black;
        //float:left;
            clear: both;
        }

        #notenTable_wrapper {
            margin-top: 10px;
        }

        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }


    </style>

    <script>

        $(document).ready(function() {
            $('#notenTable').DataTable( {
                "lengthMenu": [[-1, 10, 20, 50], ["Alle", 10, 20, 50]]
            } );
        } );


        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#notenTable tfoot th').each( function () {
                var title = $(this).text();
                if(title != "edit") {
                    $(this).html('<input type="text" placeholder="' + title + '" />');
                } else {
                    $(this).html('');
                }
            } );
            // DataTable
            var table = $('#notenTable').DataTable();
            // Apply the search
            table.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );
        // Button click events
        $(document).ready(function(){
            $('.button').click(function(){
                var clickBtnValue = $(this).val();
                var ajaxurl = 'layout.php',
                    data =  {'action': clickBtnValue};
                $.post(ajaxurl, data, function (response) {
                    // Response div goes here.
                    alert("action performed successfully");
                });
            });
        });

    </script>

</head>

<body>

    <div class="table-responsive">
        <button type='button' id="clickme" class='btn btn-success' href='datainsert.php' data-featherlight='iframe' data-featherlight-iframe-height="900px" data-featherlight-iframe-width="400px" data-featherlight-iframe-marginwidth="20px" style='float:right; margin: 5px 0px 5px 0px;'>Datensatz einfügen</button>
        <table id="notenTable" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Gattung</th>
                <th>Titel</th>
                <th>Komponist</th>
                <th>Arrangeur</th>
                <th>Besetzung</th>
                <th>Erscheinungsjahr</th>
                <th>Ablage</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($res AS $row): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["gattung"]; ?></td>
                        <td><?php echo $row["titel"]; ?></td>
                        <td><?php echo $row["komponist"]; ?></td>
                        <td><?php echo $row["arrangeur"]; ?></td>
                        <td><?php echo $row["besetzung"]; ?></td>
                        <td><?php echo $row["erscheinungsjahr"]; ?></td>
                        <td><?php echo $row["ablage"]; ?></td>
                        <td>
                            <a href="#" data-featherlight="dataview.php?id=<?php echo $row["id"]; ?> .lightbox-ajax">anzeigen</a>
                            <?php if(isset($_SESSION['userid'])){ ?>
                                <!-- <a href="#" data-featherlight="dataedit.php?id=<?php echo $row["id"]; ?> .lightbox-ajax">bearbeiten</a> -->
                                /  <a href="dataedit.php?id=<?php echo $row["id"]; ?>" data-featherlight="iframe" data-featherlight-iframe-height="900px" data-featherlight-iframe-width="400px" data-featherlight-iframe-marginwidth="20px">bearbeiten</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Gattung</th>
                <th>Titel</th>
                <th>Komponist</th>
                <th>Arrangeur</th>
                <th>Besetzung</th>
                <th>Erscheinungsjahr</th>
                <th>Ablage</th>
                <th>edit</th>
            </tr>
            </tfoot>
        </table>

    </div>
</body>
</html>