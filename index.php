<html>
 <title>Sales summary</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script> 
</head>
 <body>
 <meta http-equiv="Content-Type" content="Text/html; charset=tis-620">
 <title></title>
 <style type="text/css">
 @font-face {
        font-family :Bangnampueng;
        src :url('Bangnampueng.ttf')format("truetype");
 }
 body {
   
        font-family :'Bangnampueng', sans-serif ;
        background-image :url('images/oo.jpg');
        color : white ;
        background-color : white ;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -o-background-size: 100% 100%, auto;
        -moz-background-size: 100% 100%, auto;
        -webkit-background-size: 100% 100%, auto;
        background-size: 100% 100%, auto;        
  }
  table {
  border-collapse: collapse;
  width: 100%;
}

  h3 {
        
        color: white ;
        font-size:45px;
  }
  tr {
        text-align: center;
        color: #000000 ;
        font-size:20px;
        background-color: #AAA8A4

  }
  
  th {
      text-align: center;
      background-color: #363636;
      color: white;
  }

  tfoot#t01 th {
      text-align: center;
      background-color: #998357;
      color: black;
  }

  </style>
  <div class="container box">
   <h3>SALES SUMMARY</h3>
   <br />
   <div class="table-responsive">
    <table id="order_data" class="table table-bordered ">
     <thead>
      <tr bgcolor="#363636" >
       <th>SaleID</th>
       <th>SaleDateTime</th>
       <th>CustomerName</th>
       <th>Total</th>
       <td>View</td>
      </tr>
     </thead>
     <tbody></tbody>
     <tfoot id="t01">
      <tr>
       <th colspan="3">Total</th>
       <th colspan="2" id="total_order"></th>
      </tr>
     </tfoot>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
   var dataTable = $('#order_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    },
    drawCallback:function(settings)
    {
     $('#total_order').html(settings.json.total);
    }
   });
    
   $(document).on('click', '.view', function(){
  var id = $(this).attr('id');
  var options = {
   ajaxPrefix: '',
   ajaxData: {id:id},
   ajaxComplete:function(){
    this.buttons([{
     type: Dialogify.BUTTON_PRIMARY
    }]);
   }
  };
  new Dialogify('fetch_single.php', options)
   .title('View Employee Details')
   .showModal();
 });

 });
 
</script>