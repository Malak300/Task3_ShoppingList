<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style.css" />

    <title>Shopping List</title>

    <style>
      .submit-btn {
  padding: 10px;
  border-radius: 0.3rem;
  background-color: maroon;
  color: white;
  font-size: 20px;
  margin-top: 3%;
  margin-left: 160px;
}
.op{
  margin-left: 160px;
}
.container {
  background-color: dimgray;
  text-align: left;
  width: 600px;
  height: auto;
  margin-left: 150px;
  border-radius: 15px;
  box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.7);
}

    </style>
  </head>
  <body>
    <header>
      <h1>⭐Welcome to our website⭐</h1>
    </header>
    
    <br />
    <div class="ourItems">
      <h1>Our Items</h1>

      <ul>
        <li>Milk</li>
        <li>Water</li>
        <li>Chocolate</li>
        <li>Bread</li>
        <li>Cucumber</li>
      </ul>
    </div>

    <div id="btn">
      <h2>You can add a new List OR bring up previous list</h2>
      <button id="add_list" class="submit-btn" onclick="Add_newlist()">
        Add a new List
      </button>

      
    </div>
    <br /><br />
          
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
    <div class="container">
      <section class="heading">
        <p class="status"></p>
        <h2 class="h2">MY List</h2>
        <form class="form-control">
          <div class="container2">

            <label for="mail" class="name">User Email:</label>

                <input  class="search-input" id="user_mail" name="user_mail" 
                placeholder="Enter email"  type="text">
<br>
          <select class="op"id="emailList">
                 <option value="0">choose User:</option>
          </select>
<br>

            <label for="name" class="name">Item name:</label>
            <input
              type="text"
              id="name_item"
              name="name_item"
              class="search-input"
              placeholder="Enter a name"
              autocomplete="off"
            />

            <br><br>
          <label class="quantity" for="quantity">Quantity:</label>
          <input
            type="number"
            id="quantity_item"
            name="quantity_item"
            class="search-input"
            value="1"
            min="0"
          />
          <br />
          <div id="btn">
            <button id="buttsave" type="button" class="submit-btn">save to database</button>
          </div>

          <div id="btn">
            <button type="submit" class="submit-btn">Add Item to list</button>
          </div>
        </form>
        <br />
      </section>

      <section class="shopping-list">
        <ul class="shopping-list-items"></ul>
      </section>
    </div>
    <br />

<script>
$(function() {
    $("#name_item").autocomplete({
        source: "search.php",
    });
});
</script>

<script>
$(document).ready(function() {
	$('#buttsave').on('click', function() {
		$("#buttsave").attr("disabled", "disabled");
		var name_item = $('#name_item').val();
		var quantity_item = $('#quantity_item').val();
  //  var user_mail = $('#user_mail').val();


		if(name_item!="" && quantity_item!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					name_item: name_item,
					quantity_item: quantity_item
     //     user_mail: user_mail
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#buttsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 	

            $(function(){
             setTimeout(function() {
             $("#success").hide('slow');
             }, 800);
              });
					}
                    
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
			$("#buttsave").removeAttr("disabled");

		}
	});
});
</script>

    <script src="shopping_list.js"></script>

    <footer>
      <h5>©️ Wissal.A kmerat && Mlak Biadse</h5>
    </footer>
  </body>
</html>
