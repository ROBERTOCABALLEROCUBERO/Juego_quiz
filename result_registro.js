/* let divprin = document.getElementById('caja');
let enlace = document.getElementById('enlace');
let result = document.createElement('h1');

$(document).ready(function() {

    var y = JSON.parse($("#json").val());
    $.ajax({
            URL: "./login.php",
            method: "POST",
            data: {
                numero: 1

            }

        }


    ).done(function(res) {
        var datos = JSON.parse(res);
        result.textContent =

    });

})

divprin.insertBefore(result, enlace); */