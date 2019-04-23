
function validate() {
  var $email = $('#input1');
    var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
    var $head = $('#input2');
    var $text = $('#input3');
    if ($email.val() !== '' && re.test($email.val()) && $head.val() !== '' && $text.val() !== ''){
      return true;
    }else{
      return false;
    }
}

function validateInputs() {
  while (true) {
          var elements = document.getElementsByClassName('error-msg');
          var len = elements.length;
          if (len == 0) {break;}
          elements[0].parentNode.removeChild(elements[0]);
        }

        var valid = true;
        if($('[name="fName"]').val()==''){

          var div = document.createElement('div');
          div.className = "alert alert-danger error-msg";
          div.innerHTML = "Field is empty. Please, enter film name.";

          document.getElementById("typeName").appendChild(div);
          valid = false;
        }

        if($('[name="txtDescribe"]').val()==''){

          var div = document.createElement('div');
          div.className = "alert alert-danger error-msg";
          div.innerHTML = "Field is empty. Please, enter film description.";

          document.getElementById("typeDescription").appendChild(div);
          valid = false;
        }

          if($('[name="fileToUpload"]').val()==''){

            var div = document.createElement('div');
            div.className = "alert alert-danger error-msg";
            div.innerHTML = "Field is empty. Please, upload file.";

            document.getElementById("uploadPhoto").appendChild(div);
            valid = false;
          }

        return valid;
}

function magic() {
  if(validate()) {
    $("#verify").addClass("hidden");
    $("#adding").addClass("reveal");
    $("#idk").addClass("reveal");
    $("footer").addClass("posrelative");
    $("#input1").prop("disabled", true);
    $("#input2").prop("disabled", true);
    $("#input3").prop("disabled", true);
    $("#basic-addon1").css('background-color',"#76FF03");
    $("#basic-addon2").css('background-color',"#76FF03");
    $("#basic-addon3").css('background-color',"#76FF03");
  }else{
    alert("Invalid forms data");
  }
}

function addMagic() {
  if (validateInputs()) {
    $("#bodymain").addClass("hidden");
    $("footer").addClass("posabsolute");
    $("#supersecret").addClass("reveal");
    document.getElementsByTagName("footer")[0].style.position = 'absolute';
}
}

function suggestMagic() {
  $("#idk").addClass("hidden");
}


function deleteFilm(id) {
  $.ajax({
    url: "delete.php",
    type: "POST",
    data: "id="+id,
          cache: false,
    success: function(data)
    {
      $("footer").addClass("posrelative");
      //$("[element-id='"+id+"']").remove();
      var table = document.getElementsByTagName("table")[0];
      var trs = document.getElementsByTagName("tr");
      for (var i = 0; i < trs.length; i++  ) {
        if (trs[i].getAttribute("element-id")==id) {
          trs[i].remove();
          //table.removeChild(trs[i]);
          break;
        }
      }
    },
    error: function(data) {
      console.log(data);
      alert("Something went wrong:(")
    }
  });
}


$(document).ready(function (e) {
 $("#addToDb").click(function(e) {
  e.preventDefault();
  $.ajax({
   url: "receive.php",
   type: "POST",
   enctype: "multipart/form-data",
   data:  new FormData($("#adding")[0]),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
   {
     document.getElementById("allThingsInTheWorld").style.display = 'none';
     var div = document.createElement('div');
     div.className = "mycontainer msgg";
     div.innerHTML = "Film successfully added! <br> <a href='index.php'>Homepage</a> <br> <a href='moderate.php'>Moderate</a>";
     var body = document.body;
     var footer = document.getElementsByTagName("footer")[0];
     body.insertBefore(div, footer);
   },
   error: function(data) {
     alert("Invalid password")
   }
  });
 });
});

function searchByName() {
  var name = $("#searchName").val();
  var div = document.createElement('div');
  $.ajax({
    url: "search-engine.php",
    type: "POST",
    data: "name="+name,
    cache: false,
    success: function(data)
   {
     div.innerHTML=data;
     $("#tableDB").removeClass("reveal");
     $(".foundTable").remove();
     document.getElementById("tableDB").parentNode.insertBefore(div, document.getElementById("tableDB"));
   },
   error: function(data) {
     alert("Nothing found")
   }
});
}

function searchByCategory() {
  var category = $("#searchCategory").val();
  var div = document.createElement('div');
  $.ajax({
    url: "search-engine.php",
    type: "POST",
    data: "category="+category,
    cache: false,
    success: function(data)
   {
     div.innerHTML=data;
     $("#tableDB").removeClass("reveal");
     $(".foundTable").remove();
     document.getElementById("tableDB").parentNode.insertBefore(div, document.getElementById("tableDB"));
   },
   error: function(data) {
     alert("Nothing found")
   }
});
}

function searchByYear () {
  var year = $("#searchYear").val();
  var div = document.createElement('div');
  $.ajax({
    url: "search-engine.php",
    type: "POST",
    data: "year="+year,
    cache: false,
    success: function(data)
   {
     div.innerHTML=data;
     $("#tableDB").removeClass("reveal");
     $(".foundTable").remove();
     document.getElementById("tableDB").parentNode.insertBefore(div, document.getElementsByTagName("tableDB"));
   },
   error: function(data) {
     alert("Nothing found")
   }
});
}

function updateInfo (id) {
  var name = $("#fName").val();
  console.log(name);
  var year = $("#inputGroupSelect02").val();
  var category = $("#radio-g").val();
  var description = $("#descrArea").val();
  var data = "id="+id+"&name="+name+"&year="+year+"&category="+category+"&description="+description;
  $.ajax({
    url: "update.php",
    type: "POST",
    data: data,
    cache: false,
    success: function(data)
   {
     window.location.reload();
   },
   error: function(data) {
     alert("Oops:(")
   }
});
}

function chgStyle () {
  document.getElementById('styleFile').href='style-add-film2.css';
  $("#chgStyle").hide( "drop", { direction: "up" }, "slow" );
}

function chgStyle2 () {
  document.getElementById('styleFile').href='style-add-film.css';
}
