/*jslint browser: true*/
/*global $, jQuery,lightbox, alert*/

$(function () {
    'use strict';
    
    //Smooth Scroll To Div 
    $('.links a, .footer .logo img').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('value')).offset().top - 80
        }, 1000);
    });

    // Button Scroll Top
	var scrollBotton = $("#scroll-top");
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        console.log(scrollTop);
        if (scrollTop >= 600) {
            scrollBotton.addClass('fade-scrolltop');
        } else {
            scrollBotton.removeClass('fade-scrolltop');
        }
    });
    scrollBotton.click(function () {
        $("html,body").animate({scrollTop : 0}, 500);
    });

    // Text Writer
    var myText = 'My name is Mahmoud Hammad and I\'m Full Stack Web Developer',
    i = 0;
    window.onload = function () {
    'use strict';
        var typeWriter = setInterval(function () {
            document.getElementById('text-header').textContent += myText[i];
            i = i + 1;
            if (i > myText.length - 1) {
                clearInterval(typeWriter)
            }
        }, 100);
    };

    // Scroll To Animation AOE
    AOS.init();

    // Scroll To Animation WOW
    new WOW().init();

    // Gallery Light Box
	lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
	});

    // Animated Progress Skills
    $('.progress-bar').each(function () {
        $(this).animate({
            width: $(this).attr('data-width') + "%"
        });
    });

    // Show More Describtion
    $(document).on('click', '.more-text', function(e){
        e.preventDefault();
        $('.p1').fadeOut(0);
        $('.more-text').css('display','none');
        $('.p2').fadeIn(0);
        $('.back').css('display','flex');
    });

    // Show More Describtion
    $(document).on('click', '.back', function(e){
        e.preventDefault();
        $('.p2').fadeOut(0);
        $('.back').css('display','none');
        $('.p1').fadeIn(0);
        $('.more-text').css('display','flex');
    });

    // Form Contact
    var userError   = true,
        emailError  = true,
        phoneError  = true,
        msgError    = true;

    $('.username, .email, .phone, .message').blur(function () {

        if ($(this).val().length < 4) {

            $(this).css('border', '1px solid #ff7171').parent().find('.custom-alert').fadeIn(200)
            .end().find('.asterisx').fadeIn(100).end().find('.fa-check').fadeOut(100);

            userError   = true,
            emailError  = true,
            phoneError  = true,
            msgError    = true;

        } else {

            $(this).css('border', '1px solid #47c347').parent().find('.custom-alert').fadeOut(200)
            .end().find('.asterisx').fadeOut(100).end().find('.fa-check').fadeIn(100);

            userError   = false,
            emailError  = false,
            phoneError  = false,
            msgError    = false;

        }

    });

    // Submit Form Validation

    $('.form-contact').submit(function (e) {
        
        if (userError === true || emailError === true || phoneError === true || msgError === true) {

            e.preventDefault();
            $('.username, .email, .phone, .message').blur();
            $.ajax({
                url:"../handler.php",
                type: "POST",
                error:function(){
                    swal({
                      title: "Oops",
                      text: "Complete Your Info !",
                      icon: "error",
                      dangerMode: true,
                    });
                },
            });
        }else{
            e.preventDefault();
            $.ajax({
                url:"../handler.php",
                type: "POST",
                complete:function(){
                   swal({
                      title: "Good",
                      text: "Message Sent Successfully !",
                      icon: "success",
                      dangerMode: true,
                    }); 
                },
            });
        }
    });

    $(window).ready(function(){
        $('#loading-page').fadeOut();
        $('body').removeClass('overflow');
    });
});