$(document).ready(function(){
    $('a.img').click(function(){
        var imgurl = $("img#old").attr('src');
        var newimg = "<img";
        newimg += " src=\"" + imgurl + "\" />";
        
        $("div#imgcontain").append(newimg);
    });
    
    $("a.active").click(function(){
       alert("Xin chào, rất vui được làm quen!");
       return false;
    });
    
    
    $("#productinfotab").click(function(){
        $("#"+ $("#producttechinfotab").attr('pid')).fadeOut(500, function(){
            $("#"+ $("#productinfotab").attr('pid')).fadeIn();
        });        
    });
    
    $("#producttechinfotab").click(function(){
        $("#"+ $("#productinfotab").attr('pid')).fadeOut(500, function(){
            $("#"+ $("#producttechinfotab").attr('pid')).fadeIn();            
        });
    });
});