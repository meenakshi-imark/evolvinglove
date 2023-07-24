(function ($) {
    'use strict';

    $(window).scroll(function () { 
        var scrollHeader = $(window).scrollTop();
        if (scrollHeader >= 10) {
            $('#header').addClass('scrolled');
        } else {
            $('#header').removeClass('scrolled');
        }
    });

    $(document).ready(function () {
        var quizInner_Height = $('.quiz-screen .inner').outerHeight();
        $('.quiz-screen .inner').css('min-height', '' + quizInner_Height + 'px');
    });

    function sticks_Quiz_Question() {
        var window_top = $(window).scrollTop();
        var quiz_question = $('.quiz-question');

        quiz_question.each(function () {
            if (window_top >= 75) {
                $(this).addClass('fixed');
            } else {
                $(this).removeClass('fixed');
            }
        });
    }
    $(window).scroll(sticks_Quiz_Question);
    sticks_Quiz_Question();

    $(function () {
        $(".dragitem label").draggable({
            revert: "invalid",
            start: function () {
                $(this).data("index", $(this).parent().index());
            }
        });

        $(".draggedTop-value, .draggedLast-value").droppable({
            drop: function (evern, ui) {
                console.log('aaaaaaaaaaaa');
                if ($(this).has("label").length) {
                    if (ui.draggable.parent().hasClass("dragitem")) {
                        var index = ui.draggable.data("index");
                        ui.draggable.css({
                            left: "0",
                            top: "0"
                        }).appendTo($(".dragitem").eq(index));
                    } else {
                        ui.draggable.css({
                            left: "0",
                            top: "0"
                        }).appendTo($(this));
                        index = ui.draggable.data("index");
                        $(this).find("label").eq(0).appendTo($(".draggedTop-value, .draggedLast-value").eq(index));
                    }
                } else {
                    ui.draggable.css({
                        left: "1px",
                        top: "1px"
                    });
                    ui.draggable.appendTo($(this));
                    $(".draggedTop-value, .draggedLast-value").removeClass("ui-droppable-active");
                }
            }
        });

        $(".dragitem").droppable({
            accept: function (draggable) {
                console.log(draggable);
                return $(this).find("*").length == 0;
            },            
            drop: function (event, ui) {
                
                ui.draggable.css({
                    left: "0",
                    top: "0"
                }).appendTo($(this))
            }
        });
    });


    /*Drop previous item*/
    $(function () {
        $(".ui-droppable label").draggable({
            revert: "invalid",
            start: function () {
                $(this).data("index", $(this).parent().index());
            },
            
        });

        $(".ui-droppable").droppable({
            accept: function (draggable) {
                return $(this).find("*").length == 0;
            },
           
            drop: function (event, ui) {
                console.log(event);
                console.log(ui);
                var dragg =ui.helper.attr('class');
                console.log(ui.helper.attr('class'));
               
                ui.draggable.children("input").each(function(){
                   
                
                    
                });
                
                ui.draggable.css({
                    left: "0",
                    top: "0"
                }).appendTo($(this))
                $('.'+$(this).attr('id')).html("<label class='labelcls'></label>");
               
                
            }
        });
       
    });

})(jQuery);