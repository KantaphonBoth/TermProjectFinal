<html>
    <head>
        <title>sales summary
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12.js/dataTables.bootstrap.min.js"></script>
        <link rel="atylesheet" href="https://cdn.datatables.net/1.19.12/css/dataTabless.bootstrep.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container box">
            <h3 align="center">sales summary</h3>
            <br />
            <div class="table-reponsive">
                <table id="SaleDateTime " class="table table-bordered 
                table-striped" >
                    <thead>
                        <tr>
                            <th>CustomerID</th>
                            <th>ProductID</th>
                            <th>SaleDateTime</th>
                            <th>GrandTotal</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th id="total_sales"></th>
                        </tr>
                    </tfoot>
                </table> 
                <br />
                <br />     
                <br />
            </div>
        </div>
    </div>
</html>

<script type="text/javacript" language="javascript" >
 $(document).ready(function(){

    var dataTable = $('#SaleDateTime').Datatable({
        "processing" :true,
        "serverSide" :true,
        "order" :[],
        "ajax" : {
            url:"fetch.pht",
            type:"POST"
        }
    });


}):
