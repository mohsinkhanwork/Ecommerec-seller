$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var rating_star = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (rating_star > 1) {
        msg = "Thanks! You rated this " + rating_star + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + rating_star + " stars.";
    }
    responseMessage(msg);
        
    function responseMessage(msg) {
      $('.success-box').fadeIn(200);  
      $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }
    
    // console.log(rating_star);

     $('#product_reviews_stars').on('submit', function(e) {
         e.preventDefault();

       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();
        var product_name = $('#product_name').val();

      
      // console.log(name);
      // console.log(email);
      // console.log(comment);
      // console.log(rating_star);


        $.ajax({

                url: '/product_reviews_store',
                type: 'POST',
                data: {

                    "name": name,
                    "email": email,
                    "comment": comment,
                    "rating_star": rating_star,
                    "product_name": product_name,
                    
                },

                success: function(data) {
                    
                 // alert('success');


                 swal({

                      title: "Thank You..!",
                      text: "You rated this product " + rating_star + " stars",
                      icon: "success",
                      button: "Ok",
                    }).then((willDelete) => {

                        if (willDelete) {

                            location.reload();
                        }

                    });


                },

                error: function(xhr, status, error) {

                     alert('error');
                },
        });
    });
    
    
  });
  
  
});

// array.forEach( e {
//   // statements
// });


