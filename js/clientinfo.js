
/*
 Start the page
 */
$(document).ready(function(){
   populateService();
});
/*
 End starting the page
 */


/*
 Populate services dropdown
*/
 function populateService(){
     $.ajax({
         type: 'post',
         url: '../crud/fetchService.php',
         data:{
             get_option:"val"
         }, success: function (result){

             var obj = JSON.parse(result);
             var len = obj.length;
             var service = "<option value ='' >Select a Service</option>";

             for(var i=0; i<len;i++){
                 service += "<option value = " + obj[i].id + " data-office = '"+ obj[i].officefull +"'>" + obj[i].service + "</option>";
             }
             $(service).appendTo( '#services' );
         }
     });
 }
/*
 End populate dropdown
*/


/*
Creating account in database
 */
$("#clientinfo").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitAddClientInfo();
});

function submitAddClientInfo(){

    var form = $('#clientinfo');
    var formData = $(form).serialize();

    $.ajax({
        type: 'POST',
        url: '../crud/createaccount.php',
        data: formData
    }).done(function(response) {
        alert(response);
        window.location.replace("info.php");
    }).fail(function(data) {
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }
    });
}
/*
End of creating account in database
 */



/*
 Updating account in database
 */
$("#updateinfo").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitUpdateClientInfo();
});

function submitUpdateClientInfo(){
    var form = $('#updateinfo');
    var formData = $(form).serialize();

    $.ajax({
        type: 'POST',
        url: '../crud/updateaccount.php',
        data: formData
    }).done(function(response) {
        alert(response);
        //window.location.replace("info.php");
    }).fail(function(data) {
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }
    });
}
/*
 End of updating account in database
 */

/*
 Saving selected services in the table
 */
$("#services").change(function () {
   var table = "<tr>"+
        "<td>"+$("#services").val() +"</td>"+
        "<td>"+$("#services option:selected").text()+"</td>"+
        "<td>"+$("#services option:selected").attr('data-office')+"</td>"+
        "</tr>";
    $(table).appendTo( '#choosen' );

    $("#services option[value='"+ $("#services").val()  +"']").remove();

});
/*
 End of saving selected services in the table
 */

/*
 Saving the table in the database
 */
$('#savesubmit').click(function(){
    alert($("#cid").val());
    var TableData = storeTableValues();
    TableData = JSON.stringify(TableData);


    $.ajax({
        type: "POST",
        url: "../crud/saveClientService.php",
        data: {ptabledata:TableData,name: $("#cid").val()},
        success: function (msg) {
            alert(msg);
        }
    });


});

function storeTableValues(){
    var TableData = new Array();
    $('#choosen tr').each(function(row, tr){
        TableData[row] = {
            "id": $(tr).find('td:eq(0)').text()  // Service Id.
        }
    });
    TableData.shift(); //removing the first row (header)
    return TableData;
}


/*
 End of saving the table in the database
 */

/*
    Creating a stub for the client. It will contain personal information,
    the services availed and so on
 */
$('#printreceipt').click(function(){
   printClientInfo();
});

function printClientInfo(){

    var form = $('#clientinfo');
    var formData = $(form).serialize();

    $.ajax({
        type: 'POST',
        url: '../crud/fetchaccount.php',
        data: formData
    }).done(function(response) {
        alert(response);
        window.location.replace("../client/stab.php");
    }).fail(function(data) {
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
        }
    });
}

/*
 End of creating a stub for the client. It will contain personal information,
 the services availed and so on
 */