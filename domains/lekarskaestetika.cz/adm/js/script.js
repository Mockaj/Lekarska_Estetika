// JavaScript Document
$(document).ready(function () {
 $("#form").submit(function () {
        $.ajax({
            type: "POST",
            url: "update?pridej-uzivatele-vypujceni",
            data: $("#form").serialize(),
            success: function (msg){
            console.log(msg);
                if (msg == "error") {
                    alert("Nìco se nepodaøilo");
                } else {
                    loadEvents();
                    $("#modal").modal("hide");
                }
            }
        });
        return false;
    });
    
    });