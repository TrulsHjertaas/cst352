 
 $(document).ready(function(){
     //Ajax call for modal
        $('.carLink').click(function(){
          //alert( $(this).attr("id") );
          
            $.ajax({
            
            type: "GET",
            url: "api/getCarInfo.php",
            dataType: "json",
            data: { "id":$(this).attr("id") },
            success: function(data,status) {
               // alert(data.description);
               $("#exampleModalLabel").html(data.maker + " " + data.model);
               $("#price").html("Price: $" + data.price);
               $("#caruselImg1").attr("src", data.imgURL);
               $("#caruselImg2").attr("src", data.imgURL2);
               $("#caruselImg3").attr("src", data.imgURL3);
               $("#milage").html("Milage: " + data.milage + " km");
               $("#weight").html("Weight: " + data.weight + " kg");
               $("#year").html("Model year: " + data.year);
               $("#Cylinder").html("Cylinder volume: " + data.cylinderVolume + " L");
               $("#color").html("Color: " + data.color);
               $("#fuel").html("Fuel type: " + data.fuelType);
               $("#doors").html("Doors: " + data.doors);
               $("#prevOwners").html("Previous owners: " + data.prevOwners);
               $("#effect").html("Horsepower: " + data.effect + " hp");      //Endret sånn at det står horsepower /Z
               $("#intColor").html("Interior color: " + data.interColor);
               $("#description").html(data.description);
               $("#addToFavBtn").attr("id", data.carId);
               
            },
            complete: function(data,status) { //optional, used for debugging purposes
              // alert(status);
            }
            
            });//ajax
        }); 
        
        
        
        //Dropdown for Car Makers
        
            $.ajax({
                
            type: "GET",
            url: "api/getAllCarMakers.php",
            dataType: "json",
            data: "maker",
            success: function(data,status) {
                $("#carMakersDrop").html("");
                for(var i=0; i<data.length; i++){
                    //console.log(data[i].maker);
                    //$("#carMakersDrop").append("<option class='dropdown-item' id='dropdownItems' background-color='black' >"  + data[i].maker + "</option>");  
                    $("#carMakersDrop").append("<option class='dropdown-item' id='dropdownItems' background-color='black' value='" + data[i].maker + "'>"  + data[i].maker + "</option>");    
                }
            },
            complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
            }
                
        }); //AJAX
        
        $.ajax({
            type: "GET",
            url: "api/getCount.php",
            dataType: "json", 
            data: "countCars",
            success: function(data,status) {
                //alert(data.countCars);
                console.log(data[0].countCars);
                $("#countTxt").append(data[0].countCars);
            }, 
            complete: function(data,status) {
                //alert(status);
            }
        });
        
        $.ajax({
            type: "GET",
            url: "api/getAverage.php",
            dataType: "json", 
            data: "averagePrice",
            success: function(data,status) {
                //alert(data.countCars);
                console.log(data[0].averagePrice);
                $("#averageTxt").append("$" + data[0].averagePrice);
            }, 
            complete: function(data,status) {
                //alert(status);
            }
        });

        
        //Dropdown for Car Models
        $("#carMakersDrop").change(function() { 
            
            $.ajax({
                
            type: "GET",
            url: "api/getAllCarModels.php",
            dataType: "json",
            //data: { "state":$("#state").val() }
            data: { "maker":$("#carMakersDrop").val() },
            success: function(data,status) {
                $("#carModelsDrop").html("");
                for(var i = 0; i < data.length; i++){
                    //console.log(data[i].model);
                    $("#carModelsDrop").append("<option class='dropdown-item' id='dropdownItems' background-color='black' value='" + data[i].model + "'>"  + data[i].model + "</option>");    
                }
            },
            complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
            }
                
            }); //AJAX
            
        }); //FUNCTION
        
           
            $(".dropdown-item").click(function(){
               // $("#dropdownMenuButton").html(this.val());
                document.querySelector("#dropdownMenuButton").innerHTML = this.value;
            });
            
            
            //Den som sletter denne igjen får svi    //buttonclick for deleting cars in admin panel
            $(".deleteBtn").click(function() {
                 //DO NOTHING
            });
            
            //Buttonclick for resetting filter
            $("#resetFilter").click(function() {
                window.location.href = "index.php";
            });
            
            
        
            //Button for filtering
            
            //$("#filterCarsBtn").click(function() { //had to change from this for debugging purposes
            //to this
            
             $("#filterCarsBtn").on("click", function() {    

                var fromPrice = $("#fromPrice").val();
                var toPrice = $("#toPrice").val();
                var fromMilage = $("#fromMilage").val();
                var toMilage = $("#toMilage").val();
                var carMaker = $("#carMakersDrop").val();
                var carModel = $("#carModelsDrop").val();
                
                //Sending the parameters via url, since ajax wont let me. Only works in preview because ajax is asynchronous and content already loaded
                window.location.href = "index.php?from=" + fromPrice + "&to=" + toPrice + 
                "&fromMilage=" + fromMilage + "&toMilage=" + toMilage + "&carMaker=" + carMaker + "&carModel=" + carModel;
            });
            
            $("#btnAddRecord").click(function() {
                window.location.href = "addCar.php";
            })
            
            $("#btnAggregate").click(function() {
                window.location.href = "aggregate.php";
            })
  });
  
  
  
  
  
  
  
  
  
  
  
   //No longer in use, didn't work, will delete later
                /* $.ajax({
                    type: 'GET',
                    url: 'index.php?from='+fromPrice+'&to='+toPrice+'', //index.php 
                    data: { from: fromPrice, to: toPrice },
                    success: function(response) {
                        console.log("Sent with success, se nettverkstab" + fromPrice);
                        console.log(response);
                    },
                     error: function(jqXHR, textStatus, errorThrown){
                       alert(textStatus + errorThrown); // diagnostics
                    }               
                });*/
            