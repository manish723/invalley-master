var carousel = $('#packageCarousel').hide();

jQuery(document).ready(function($) {
   $("#packageCarousel").slick({

       prevArrow: '<a class="shadow prev" href="#partner"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i> </a>',
       nextArrow: '<a class="shadow next"  href="#partner"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i> </a>',
       slidesToShow: 4,
       slidesToScroll: 1,
       responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
   });

    var deferreds = [];
    var imgs = $('#packageCarousel').find('img');
    // loop over each img
    imgs.each(function(){
        var self = $(this);
        var datasrc = self.attr('data-src');
        if (datasrc) {
            var d = $.Deferred();
            self.one('load', d.resolve)
                .attr("src", datasrc)
                .attr('data-src', '');
            deferreds.push(d.promise());
        }
    });

    $.when.apply($, deferreds).done(function(){
        carousel.fadeIn(1000);
    });

    $('#contactSendMessage').on('click', function() {
        var msgBox = $('#msgContact');
        var btn = $(this);

        msgBox.removeClass().text('');
        btn.attr('disabled', true).text('Sending...');

        axios({
            method: 'post',
            url: '/contact-us',
            data: {
                name: $('#contactName').val(),
                email: $('#contactEmail').val(),
                contactMessage: $('#contactMessage').val()
            }
        }).then(function(ret) {
            btn.attr('disabled', false).text('Send Message');
            msgBox.addClass('alert alert-success').text(ret.data.msg);

        }).catch(function(ret) {
            var msg = format_msg_object(ret.response.data.errors);
            btn.attr('disabled', false).text('Send Message');
            msgBox.addClass('alert alert-danger').html(msg);

        });
    });
});

function format_msg_object(objMsg) {
    var msg = '';

    $.each(objMsg, function(key, value) {
        msg = msg + value + '<br />';
    });

    return msg;
}


jQuery(document).ready(function ()){

}
