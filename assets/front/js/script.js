"use strict"
/* back-to-top */
if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function() {
        backToTop();
    });
    $('#back-to-top').on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('body').addClass('newClass');
    } else {
        $('body').removeClass('newClass');
    }
});

/* Chat_Boat 
Start of Tawk.to Script */

var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/61fa37059bd1f31184da83c0/1fqsmds0t';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();

/* End of Tawk.to Script */

/*  fade_in_button_start  */

const toggleClass = (id, toggle) => {
    if (toggle == 'show'){
        $(`#${id}`).fadeIn();
        $(`input[name=exp_date]`).removeClass("ignore");
        $(`input[name=ext_policy]`).removeClass("ignore");
    }else{
        $(`#${id}`).fadeOut();
        $(`input[name=exp_date]`).addClass("ignore");
        $(`input[name=ext_policy]`).addClass("ignore");
    }
}

const newCar = (anchor, show) => {
    if ($(anchor).html().indexOf('I HAVE NEW') === -1)
    {
        $(`#reg_no`).fadeIn();
        $(anchor).html(`I HAVE NEW ${show}`);
        $(`input[name=reg_no]`).removeClass("ignore");
    }
    else
    {
        $(anchor).html("I REMEMBER MY VEHICLE NO");
        $(`input[name=reg_no]`).addClass("ignore");
        $(`#reg_no`).fadeOut();
    }
    $("#back-to-top").trigger('click');
};

if ($(".validate-form").length > 0){
    $(".validate-form").validate({
        ignore: '.ignore',
        rules: {
            reg_no: {
                required: true,
                minlength: 5,
                maxlength: 15
            },
            veh_make: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            veh_model: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
            },
            pincode: {
                required: true,
                minlength: 6,
                maxlength: 6,
                digits: true
            },
            sum_insured: {
                required: true,
                minlength: 5,
                maxlength: 10,
                digits: true
            },
            email: {
                required: true,
                minlength: 10,
                maxlength: 100,
                email: true
            },
            name: {
                required: true,
                minlength: 5,
                maxlength: 100
            },
            message: {
                required: true,
                maxlength: 255
            },
            subject: {
                required: true,
                maxlength: 100
            },
            fname: {
                required: true,
                maxlength: 15
            },
            address: {
                required: true,
                maxlength: 100
            },
            lname: {
                required: true,
                maxlength: 15
            },
            p_message: {
                required: true,
                maxlength: 255
            },
            exp_date: {
                required: true,
                date: true
            },
            dob: {
                required: true,
                date: true
            },
            location: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            occupation: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            income: {
                required: true,
                minlength: 5,
                digits: true,
                maxlength: 15
            },
            education: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            uplod_rc: {
                required: true,
                accept: "image/jpg, image/jpeg, image/png, application/pdf"
            },
            ext_policy: {
                required: true,
                accept: "image/jpg, image/jpeg, image/png, application/pdf"
            }
        },
        messages: {
            uplod_rc: {
                accept: "Only jpeg, jpg, png & pdf allowed."
            },
            ext_policy: {
                accept: "Only jpeg, jpg, png & pdf allowed."
            }
        },
        submitHandler: function (form) {
            submitForm(form);
        },
    });

    /* $.validator.addMethod("reg_no", function (value) {
        return (
            /^[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}$/.test(value)
        );
    }, "Given input is invalid."); */
}

const qtyPlus = (input) => {
    let value = parseInt($(`input[name=${input}]`).val());
    $(`input[name=${input}]`).val(value+1);
    return;
};

const qtyMinus = (input) => {
    let value = $(`input[name=${input}]`).val();
    if(value > 1)
        $(`input[name=${input}]`).val(value-1);
    return;
};

const submitForm = (form) => {
    $.ajax({
        url: $(form).attr("action"),
        type: "POST",
        data: new FormData(form),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        beforeSend: function () {
            $(form).find(":submit").hide();
        },
        success: function (result) {
            toast(result.message);
            $(form).find(":submit").show();
            if (result.error === false) {
              $("#back-to-top").trigger("click");
              form.reset();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $(form).find(":submit").show();
            toast("Something is not going good.");
        },
    });
};

const toast = (msg) => {
    $(".toast").stop().html(msg).fadeIn(400).delay(3000).fadeOut(500);
};

/*  fade_in_button_end  */

/* GALLERY  */
$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('body').addClass('newClass');
    } else {
        $('body').removeClass('newClass');
    }
});


// Gallery image hover
$(".img-wrapper").hover(
    function() {
        $(this).find(".img-overlay").animate({ opacity: 1 }, 600);
    },
    function() {
        $(this).find(".img-overlay").animate({ opacity: 0 }, 600);
    }
);
// Lightbox
var $overlay = $('<div id="overlay"></div>');
var $image = $("<img>");
var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');
// Add overlay
$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
$("#gallery").append($overlay);
// Hide overlay on default
$overlay.hide();
// When an image is clicked
$(".img-overlay").click(function(event) {
    // Prevents default behavior
    event.preventDefault();
    // Adds href attribute to variable
    var imageLocation = $(this).prev().attr("href");
    // Add the image src to $image
    $image.attr("src", imageLocation);
    // Fade in the overlay
    $overlay.fadeIn("slow");
});
// When the overlay is clicked
$overlay.click(function() {
    // Fade out the overlay
    $(this).fadeOut("slow");
});
// When next button is clicked
$nextButton.click(function(event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").next().find("img"));
    // All of the images in the gallery
    var $images = $("#image-gallery img");
    // If there is a next image
    if ($nextImg.length > 0) {
        // Fade in the next image
        $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    } else {
        // Otherwise fade in the first image
        $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
    }
    // Prevents overlay from being hidden
    event.stopPropagation();
});
// When previous button is clicked
$prevButton.click(function(event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").prev().find("img"));
    // Fade in the next image
    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    // Prevents overlay from being hidden
    event.stopPropagation();
});
// When the exit button is clicked
$exitButton.click(function() {
    // Fade out the overlay
    $("#overlay").fadeOut("slow");
});

/* GALLERY  */

/* GMC  */
var jQueryPlugin = (window.jQueryPlugin = function(ident, func) {
    return function(arg) {
        if (this.length > 1) {
            this.each(function() {
                var $this = $(this);
                if (!$this.data(ident)) {
                    $this.data(ident, func($this, arg));
                }
            });
            return this;
        } else if (this.length === 1) {
            if (!this.data(ident)) {
                this.data(ident, func(this, arg));
            }
            return this.data(ident);
        }
    };
});

function Guantity($root) {
    const element = $root;
    const quantity = $root.first("data-quantity");
    const quantity_target = $root.find("[data-quantity-target]");
    const quantity_minus = $root.find("[data-quantity-minus]");
    const quantity_plus = $root.find("[data-quantity-plus]");
    var quantity_ = quantity_target.val();
    $(quantity_minus).click(function() {
        quantity_target.val(--quantity_);
    });
    $(quantity_plus).click(function() {
        quantity_target.val(++quantity_);
    });
}
$.fn.Guantity = jQueryPlugin("Guantity", Guantity);
$("[data-quantity]").Guantity();


/* MEDICLAIM  */
/* Quentity_Button  */

// This button will increment the value
$('.qtyplus').click(function(e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    // If is not undefined
    if (!isNaN(currentVal)) {
        // Increment
        $('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
        // Otherwise put a 0 there
        $('input[name=' + fieldName + ']').val(0);
    }
});
// This button will decrement the value till 0
$(".qtyminus").click(function(e) {
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    fieldName = $(this).attr('field');
    // Get its current value
    var currentVal = parseInt($('input[name=' + fieldName + ']').val());
    // If it isn't undefined or its greater than 0
    if (!isNaN(currentVal) && currentVal > 0) {
        // Decrement one
        $('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        // Otherwise put a 0 there
        $('input[name=' + fieldName + ']').val(0);
    }
});