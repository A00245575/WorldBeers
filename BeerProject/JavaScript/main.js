
// root URL for restful web services 
var rootURL ="http://localhost:4006/BeerProject/api/beers";
var rootURL2 ="http://localhost:4006/BeerProject/api/users";

//when thr DOM is ready
$(document).ready(function(){
    findAll();
    findAllUsers();
    findAllnoOfUsers();
});

var findAll=function(){
    console.log('findAll');
    $.ajax({
        type: "GET",
        url: rootURL,
        dataType: "json", // data type of response
        success: function(data){
        renderList(data);
        noOfBeer(data);
        avgBeerPrice(data);
        },
        error: function (request, status, error) {
    alert('ERROR');
    console.log(request.responseText);
    console.log(status.toString());
    console.log(error.toString());
  }
    });
};

function renderList(data){
    console.log('im here');
    list = data.beers;
    
    $.each(list, function(index, beer){
        $('#table_body').append('<tr><td>'+beer.name+'</td><td>'+beer.country+'</td><td>'+beer.type+'</td><td>'+beer.price+'</td></tr>');
    });
    $('#table_id').DataTable();
 }
 
 var findAllUsers=function(){
    console.log('findAll2');
    $.ajax({
        type: "GET",
        url: rootURL2,
        dataType: "json", // data type of response
        success: function(data){
            renderUserList(data);
            noOfUsers(data);
        },
        error: function (request, status, error) {
    alert('ERROR');
    console.log(request.responseText);
    console.log(status.toString());
    console.log(error.toString());
  }
    });
};

function renderUserList(data){
    console.log('im here again');
    list = data.users;
    
    $.each(list, function(index, user){
        $('#table2_body').append('<tr><td>'+user.user_name+'</td><td>'+user.user_password+'</td><td>'+user.name+'</td></tr>');
    });
    $('#table2_id').DataTable();
 }
 
 
 function noOfBeer(data){
    console.log('im noOfBeer');
    var counter = 0;
    list = data.beers;
    $.each(list, function(index, beer){
        counter++;
    });
    $('#noOfBeers').append(counter);
 }
 
function avgBeerPrice(data){
    console.log('im noOfBeer 2');
    var counter = 0;
    var total= 0.0;
    list = data.beers;
    $.each(list, function(index, beer){
        
        counter++;
        var a = parseFloat(beer.price);
        total += a;
    });
    console.log(counter);
    var avg = total/counter;
    console.log(avg);
    $('#avgCost').append(avg);
 }

 function noOfUsers(data){
    console.log('im noOfUser');
    var counter = 0;
    list = data.users;
    $.each(list, function(index, user){
        counter++;
    });
    $('#noOfUsers').append(counter);
 }




    



