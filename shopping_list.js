var NameItem = document.getElementById("name_item");
var quantity = document.getElementById("quantity_item");
var print = document.querySelector(".status");
var list = document.querySelector(".shopping-list");
var ListItems = document.querySelector(".shopping-list-items");
var form = document.querySelector(".form-control");
const itemsList = [
  { name: "Milk" },
  { name: "Water" },
  { name: "Chocolate" },
  { name: "Bread" },
  { name: "Cucumber" },
];

form.addEventListener("submit", addItems);

// Add items
function addItems(e) {
  e.preventDefault();
  var name = NameItem.value;
  var qu = quantity.value;
  if (name === "") {
    PrintMassege("Please enter a value", "red");
  } else if (confirm("Do you want to Add this Item ?")) {
    if (name !== "") {
      list.style.visibility = "visible";
      ListItems.innerHTML += `
            <li>
                <h5 id="parag">Item name: ${name} &nbsp &nbsp &nbsp &nbsp Quantity: ${qu}</h5> <br>
  

                <div class="btn-container">
                    <button class="btn" id ="purchase" >purchase</button> &nbsp &nbsp    
                    <button class="btn" id ="del" >delete</button>
                </div>
            </li>`;

      PrintMassege(" item is succesfully added", "green");
      Restart();
    }
  }
}

// Print
function PrintMassege(text, action) {
  print.style.visibility = "visible";
  print.textContent = text;
  print.classList.add(`status-${action}`);

  setTimeout(function () {
    print.textContent = "";
    print.classList.remove(`status-${action}`);
  }, 1200);
}

//delete item
function deleteItem2(e) {
  if (e.target.id === "del") {
    let valname = prompt("Enter item name that you want to delete");
    if (confirm(`Are you sure you want to Remove ${valname} ?`)) {
      e.target.parentElement.parentElement.remove();
      PrintMassege(" item is succesfully removed", "red");
    }
  }
}

function deleteItem(e) {
  var name = e.target.parentElement.parentElement.NameItem;
  if (e.target.id === "del") {
    if (confirm("Are you sure you want to Remove" + "" + name)) {
      e.target.parentElement.parentElement.remove();
      PrintMassege(" item is succesfully removed", "red");
    }
  }
}

// cancel item
var a;
function CancelItem(e) {
  if (e.target.id === "purchase" && a != 1) {
    e.target.parentElement.parentElement.style.textDecoration = "none";
    e.target.parentElement.parentElement.style.color = "green";

    PrintMassege("You purchase this item!", "green");
    return (a = 1);
  } else if (e.target.id === "purchase" && a == 1) {
    e.target.parentElement.parentElement.style.color = "red";
    e.target.parentElement.parentElement.style.textDecoration = "line-through";
    e.target.parentElement.parentElement.style.textDecorationColor = "red";
    PrintMassege("The item has been canceled !", "red");
    return (a = 0);
  }
}

//ADD NEW LIST
function Add_newlist() {
  PrintMassege("TYPE TO ADD ITEMS", "red");

  list.style.visibility = "visible";
  ListItems.innerHTML =
    "---------------------------- NEW LIST ----------------------------";
}
function Restart() {
  NameItem.value = "";
  quantity.value = "1";
}

ListItems.addEventListener("click", deleteItem);
ListItems.addEventListener("click", CancelItem);

// Suggestions

const searchInput = document.querySelector(".search-input");
const suggestionsPanel = document.querySelector(".suggestions");

searchInput.addEventListener("keyup", function (e) {
  suggestionsPanel.classList.add("show");
  const input = searchInput.value;
  suggestionsPanel.innerHTML = "";
  const suggestions = itemsList.filter(function (item) {
    return item.name.toLowerCase().startsWith(input.toLowerCase());
  });
  suggestions.forEach(function (suggested) {
    const div = document.createElement("div");
    div.innerHTML = suggested.name;
    div.setAttribute("class", "suggestion");
    suggestionsPanel.appendChild(div);
  });
});

document.addEventListener("click", function (e) {
  if (e.target.className == "suggestion") {
    searchInput.value = e.target.innerHTML;
    suggestionsPanel.classList.remove("show");
  }
});

var Quantity = [];

var Name = [];
var email = document.getElementById("userEmail");

$.each($(".parag"), function (key, value) {
  Name[key] = $(".parag").eq(key).attr("Item name");
  Quantity[key] = $(".parag").eq(key).attr("Quantity");
});
if (email != "" && Names.length > 0) {
  $.ajax({
    url: "saveProducts.php",
    type: "POST",
    data: {
      name: Name,
      quantity: Quantity,
      email: email,
    },
    cache: false,
    success: function (dataResult) {
      var dataResult = JSON.parse(dataResult);
      if (dataResult.statusCode == 200) {
        alert(" done");
      } else if (dataResult.statusCode == 201) {
        alert("Error occured !");
      }
    },
  });
} else {
  alert("Please fill all the field !");
}

$(document).ready(function () {
  var email = document.getElementById("user_mail");
  $.ajax({
    url: "productsHistory.php",
    type: "POST",
    cache: false,
    success: function (data) {
      $("#shopping-list").append(data);
    },
  });

  $.ajax({
    url: "emails.php",
    type: "POST",
    cache: false,
    data: {
      email: email,
    },
    success: function (data) {
      $("#emailList").append(data);
    },
  });
});
