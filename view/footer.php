<?php
?>
        </div>
        <!-- /.content-wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="addons/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="addons/jquery/jquery-ui.min.js"></script>
        <!-- Bootstrap -->
        <script src="addons/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- FontAwesome -->
        <script src="addons/fontawesome-free-6.4.0/js/all.min.js"></script>
        <!-- Datatables & Plugins -->
        <script src="addons/datatables/datatables.min.js"></script>
        
        <script src="public/js/function.js"></script>

<?php

if (isset($datatable) && $datatable){
    ?>
    <script>
        $(document).ready(function() {
            var myTable = $('#myDatatable').DataTable({
                "deferRender": true,
                "bProcessing": true,
                "sAjaxSource": "controller/<?= $dir ?>data.php",
                "bPaginate":true,
                "sPaginationType":"simple_numbers",
                "iDisplayLength": 10,
                "language": {
                    "url": "addons/datatables/FR-TranslationDataTables.json"
                },
                <?php
                    if(file_exists("controller/".$dir."dataTableOptions.php")){
                        include_once "controller/".$dir."dataTableOptions.php";
                    }
                ?>
            });

            //Custom Filter For Datatable
            <?php
                if(file_exists("controller/".$dir."dataTableFilter.php")){
                    include_once "controller/".$dir."dataTableFilter.php";
                }
            ?>
        });

        function refreshTable(){
            $(document).ready(function () {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("connexionActive").innerHTML = this.responseText;

                        var etat = this.responseText.replace(/\n|\r/g,'');

                        if (etat === "Connected"){
                            $('#myDatatable').DataTable().ajax.reload();
                        } else if (etat === "Disconnected"){
                            window.location.reload();
                        }
                    }
                };
                xmlhttp.open("GET", "controller/connexionActive.php", true);
                xmlhttp.send();
            });
        }
    </script>
<?php
}
?>


    </body>
</html>

