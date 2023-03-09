
$(document).ready(function(){
    function fetchData(){
        var name = $('#search').val();
        // console.log("name");
        // console.log(name);
        if (name == '') {
            // console.log("empty");
            // $('#search_result').css('display', 'none');
            $('#dropdown').css('display', 'none');
         }
         $.post("http://localhost/FoodForAll/public/Org_admin_events/search_events", 
                  {
                    name:name
                  },
                  function(data, status){
                      if (data != "not found") {
                        // $('#search_result').css('display', 'block');
                        $('#dropdown').css('display', 'block');
                        $('#dropdown').html(data);
                      }
                  });
                
    }

    $('#search').on('input', fetchData);
    $("body").on('click', () => {
        // $('#search_result').css('display', 'none');
        $('#dropdown').css('display', 'none');
    });
    $('#search').on('click', fetchData);

    });
