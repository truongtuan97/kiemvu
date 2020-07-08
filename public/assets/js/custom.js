jQuery(function($){
    "use strict";//Khoi tao tab
    if( $('.owl-carousel').length ){
        $('.owl-carousel').each(function(){
            var owl = $('.owl-carousel');
            $(this).owlCarousel({
                margin: $(this).data('margin'),
                loop: false,
                autoplayTimeout: $(this).data('autotime'),
                smartSpeed:$(this).data('speed'), 
                autoplay : $(this).data('autoplay'),
                items    : $(this).data('carousel-items'),
                nav      : $(this).data('nav'),
                dots     : $(this).data('dots'),
                responsive: {
                  0: {
                    items: $(this).data('mobile'),
                    margin: 15
                  },
                  768: {
                    items: $(this).data('tablet')
                  },
                  992: {
                    items: $(this).data('items')                    
                  }
                }
            });    
        });
    }
    $('#news-tab a').click(function (e) {
        e.preventDefault();
        var targetId = $(this).attr('data-href');
        $('#news-tab .active').removeClass('show active');
        $(this).parent('li').addClass('show active');
        $('#news-content .tab-pane').removeClass('active');
        $(targetId).addClass('show active');
    });
    $('#char-tab a').click(function (e) {
        e.preventDefault();
        var targetId = $(this).attr('data-href');
        $('#char-tab .active').removeClass('show active');
        $(this).parent('li').addClass('show active');
        $('#character-content .tab-pane').removeClass('active');
        $(targetId).addClass('show active');
    });
    $('#server-tab a').click(function (e) {
        e.preventDefault();
        var targetId = $(this).attr('data-href');
        $('#server-tab .active').removeClass('show active');
        $(this).parent('li').addClass('show active');
        $('#server-content .tab-pane').removeClass('active');
        $(targetId).addClass('show active');
    });
    $('.btn-play').click(function () {       
        $.fancybox.open({
            src  : '#popup-login',
            type : 'inline',
            opts : {
                afterShow : function( instance, current ) {
                    // console.info( 'done!' );
                }
            }
        });
    });
    $('#menu-popup-tab a').click(function (e) {
        e.preventDefault();
        var targetId = $(this).attr('data-href');
        $('#menu-popup-tab .active').removeClass('show active');
        $(this).parent('li').addClass('show active');
        $('#popup-account-content .tab-pane').removeClass('active');
        $(targetId).addClass('show active');
    });

    $('#registerForm').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({                        
            type: 'POST',
            url: '/register',
            data: {name: $("#name").val(), phone: $("#phone").val(), email: $("#email").val(), 
                password:$("#password").val(), 
                password_confirmation:$("#password-confirm").val()},
            dataType: 'json',
            success: function(data){
                if($.isEmptyObject(data.error)){                    
                    window.location.href = '/';
                }else{
                    console.log(data.error);
                    const $errors = data.error;
                    for (var i=0; i < $errors.length; i++){
                        console.log($errors.length);
                        if ($errors[i].indexOf('name') >= 0) {                            
                            showError('name', $errors, i );
                        } else {
                            if ($errors[i].indexOf('password') >= 0) {
                                showError('password', $errors, i );
                            }
                        }                        
                    }
                }
            },
            error: function(data){
                console.log("Error: ", data);
            }
        });
    });
    function showError(name, $errors, i) {
        var id = "#error-" + name;
        console.log('error: ', id);
        $(id).text($errors[i]).text($errors[i]);

        var parent = $(id).parent();
        $(parent).removeClass('invalid-feedback');       
    }
    $('#loginForm').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({ 
            type: 'POST',
            url: '/login',
            data: {name: $("#login-name").val(), password:$("#login-password").val()},
            dataType: 'json',
            success: function(data){
                if($.isEmptyObject(data.error)){
                    console.log(data);
                    window.location.href = '/';
                }else{
                    console.log(data.error);
                    const $errors = data.error;                    
                }
            },
            error: function(data){
                console.log("Error: ", data);
            }
        });
    });
    $('#popupLoginForm').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({ 
            type: 'POST',
            url: '/login',
            data: {name: $("#p-login-name").val(), password:$("#p-login-password").val()},
            dataType: 'json',
            success: function(data){
                if($.isEmptyObject(data.error)){
                    console.log(data);
                    window.location.href = '/';
                }else{
                    console.log(data.error);
                    const $errors = data.error;
                }
            },
            error: function(data){
                console.log("Error: ", data);
            }
        });
    });    
});
function gotoPlayGameWithSelectedServer() {
    var value = $('#playedServerList').val();
    window.location = "play-game/" + value;
}