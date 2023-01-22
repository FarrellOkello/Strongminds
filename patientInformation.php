
<?php
include 'conn.php';
$title = "Strong minds";
include "header.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Informations</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="assets/styles.css" rel="stylesheet">
</head>
<body>
        <div id="wrapper">
            <?php include 'nav.php'; ?>        
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Patient Information</h2>
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">                       
                        <?php
                                    $patients =  mysqli_query($con, "SELECT * FROM patient_information");?>
                        <div class="col-lg-12">
                            <a href="pinformationexcel.php" class="btn btn-primary mb-2" target="_blank">EXPORT TO EXCEL</a>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>All Patients</h5>
                                </div>
                                <div class="ibox-content">
                                    <?php
                                    if (mysqli_num_rows($patients) > 0) {
                                        ?>
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Prefered Contact</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Conditions</th>
                                                    <th>Allergies</th>
                                                    <th>Pregnant</th>
                                                    <th>On Meds For</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while ($row = mysqli_fetch_array($patients)) {
                                                        $Firstname = $row['first_name'];
                                                        $Lastname = $row['last_name'];
                                                        $date = $row['date'];
                                                        $email = $row['email'];
                                                        $phone = $row['phone'];
                                                        $preferedContact = $row['prefered_contact'];
                                                        $dob = $row['dob'];
                                                        $age = $row['age'];
                                                        $gender = $row['gender'];
                                                        $conditions = $row['conditions'];
                                                        $allergies = $row['allergies'];
                                                        $pregnant = $row['pregnant'];
                                                        $on_medications = $row['on_medications'];
                                                        ?>
                                                    <tr class="gradeA">
                                                    <td><?php echo $Firstname; ?></td>
                                                    <td><?php echo $Lastname; ?></td>
                                                    <td><?php echo $date; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td><?php echo $preferedContact; ?></td>
                                                    <td><?php echo $dob; ?></td>
                                                    <td><?php echo $age; ?></td>
                                                    <td><?php echo $gender; ?></td>
                                                    <td><?php echo $conditions; ?></td>
                                                    <td><?php echo $allergies; ?></td>
                                                    <td><?php echo $pregnant; ?></td>
                                                    <td><?php echo $on_medications; ?></td>                                                      
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    <?php /* } */ ?>
    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>
    <!-- Data Tables -->
    <script src="assets/js/datatable/jquery.dataTables.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable();
            /* Init DataTables */
            var oTable = $('#editable').dataTable();
            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('http://webapplayers.com/example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%"
            });
        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);
        }
    </script>
</body>
</html>





