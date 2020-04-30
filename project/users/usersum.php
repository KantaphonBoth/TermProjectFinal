<html>
 <title>Sales summary</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
 <link href="../css/sales.css" rel="stylesheet" media="screen">
 <!-- <link href="css/custom.css" rel="stylesheet" media="screen"> -->
 <link href="../css/swiper.min.css" rel="stylesheet" >
</head>
 <body>
 <meta http-equiv="Content-Type" content="Text/html; charset=tis-620">
 <title></title>
  
  <div class="main-navigation" id="main-navbar">
		<div class="menu-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-md navbar-light" id="navigation">
							<ul class="navbar-nav" id="main-menu">
								<li class="nav-item"><a class="nav-link" href="usercoffee.php">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="usercoffee.php">Menu</a></li>
								<li class="nav-item"><a class="nav-link" href="userservice.php">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="usermyorder.php">My Oder</a></li>
                <li class="nav-item"><a class="nav-link active" href="#sum">Sales summary</a></li>
							
							</ul>	
						</nav>
					</div>
				</div>
			</div>
            </div>
            
</div>
<br>
<br>
<br>
  <div class="container box">
   <h3 id="sum" >SALES SUMMARY</h3>
   <br />
    

   <div class="table-responsive">
    <table id="order_data" class="table table-bordered ">
     <thead>
      <tr bgcolor="#363636" >
       <th>SaleID</th>
       <th>SaleDateTime</th>
       <th>CustomerName</th>
       <th>Total</th>
       <th>View</th>
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
<script src="../js/swiper.min.js"></script>
<script src="../js/function.js"></script>
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
   .title('View Product')
   .showModal();
 });

 });
 
</script>