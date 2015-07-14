$(document).ready(function(){
    $('a.img').click(function(){
        var imgurl = $("img#old").attr("src");
        var newimg = "<img style= \" width: 750px; height: 400px;\" ";
        console.log(imgurl);
        newimg += "src = \"" + imgurl + "\" />";
        $("div#imgcontainer").append(newimg);
     });
    
    $("a.active").click(function(){
        alert("Xin Chào");
        return false;
    });
    
    $("#productinfotab").click(function(){
        $("#" + $("#productechinfotab").attr('pid')).fadeOut(500, function(){
            $("#" + $("#votetab").attr('pid')).fadeOut(500, function(){
                $("#" + $("#productinfotab").attr('pid')).fadeIn();
            });
        });
    });
    
    $("#productechinfotab").click(function(){
        $("#" + $("#productinfotab").attr('pid')).fadeOut(500, function(){
            $("#" + $("#votetab").attr('pid')).fadeOut(500, function(){
                $("#" + $("#productechinfotab").attr('pid')).fadeIn();
            });
        });
    });
    
    
    $("#votetab").click(function (){
        $("#"+$("#productinfotab").attr('pid')).fadeOut(500, function(){
            $("#"+$("#productechinfotab").attr('pid')).fadeOut(500, function(){
                $("#"+ $("#votetab").attr('pid')).fadeIn();
            });
        });
    });
    
});



