/*
 *  Document   : uiProgress.js
 *  Author     : pixelcave
 */
var UiProgress=function(){var t=function(t,o){return Math.floor(Math.random()*(o-t+1))+t};return{init:function(){var o=0;$(".toggle-bars").click(function(){$(".progress-bar",".bars-container").each(function(){o=t(10,100)+"%",$(this).css("width",o).html(o)}),$(".progress-bar",".bars-stacked-container").each(function(){o=t(10,25)+"%",$(this).css("width",o).html(o)})});var n=$("#top-loading-start"),r=$("#top-loading-stop");n.add(r).button("loading"),NProgress.start(),setTimeout(function(){NProgress.done(),n.button("reset")},2500),n.on("click",function(){NProgress.start(),$(this).button("loading"),r.button("reset")}),r.on("click",function(){NProgress.done(),$(this).button("loading"),n.button("reset")}),$(".btn-growl").on("click",function(){var t=$(this).data("growl");$.bootstrapGrowl("<h4>Hi there!</h4> <p>This is another notification!</p>",{type:t,delay:2500,allow_dismiss:!0}),$(this).prop("disabled",!0)})}}}();