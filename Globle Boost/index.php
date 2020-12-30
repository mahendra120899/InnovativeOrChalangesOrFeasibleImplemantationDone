<?php
?>
<style>
    .red-background{
    background: #eb3030 !important;
    color: #fff !important;
    border: 1px solid #eb3030 !important;
    }
    .blue-background{
    background: #2c8db7 !important;
    color: #fff !important;
    border: 1px solid #2c8db7 !important;
    }
    .purple-background{
    background: #c630eb !important;
    color: #fff !important;
    border: 1px solid #c630eb !important;
    }
    .yellow-background{
    background: #ebed6c !important;
    color: #000 !important;
    border: 1px solid #ebed6c !important;
    }

    .error-message{
    color: red !important;
        font-size: 16px !important;
        font-weight: bold !important;
        padding: 15px 95px;
    }

    .range_amount_mobile{
    display: none;
}

    #video-caption .uabb-infobox-title{
        font-size: 50px !important;
        margin-left: 55px !important;
    }

    @media screen and (max-width: 767px) {

    .error-message {
        padding: 15px 10px !important;
            text-align: center;
        }

        html:not([dir=rtl]) .noUi-horizontal .noUi-handle {
        right: -48px !important;
            left: auto !important;
        }

        .noUi-base, .noUi-connects {
        width: 94% !important;
        height: 100%;
        position: relative;
        z-index: 1;
        }

        .range_amount {
        width: 100% !important;
        float: none !important;
            /*text-align: left !important;*/
            margin-bottom: 60px !important;
        }

        .calculate-slider {
        padding: 16px 10px !important;
            width: 100% !important;
            margin: 0 auto;
            border-radius: 60px !important;
        }

        .range_purchase {
        width: 100% !important;
        float: none !important;
            margin: 12px auto 0 !important;
        }

        .range_purchase button {
        padding: 7px 0px !important;
            width: 50% !important;
            border-radius: 0px 60px 60px 0px !important;
            height: 55px;
            margin-top: 25px;
        }

        .range_amount{
        display: none;
    }

        .range_amount_mobile {
        float: left;
        text-align: center;
            font-size: 32px;
            font-weight: bold;
            font-family: "Roboto", sans-serif;
            padding-top: 14px;
            width: 50%;
            border-radius: 60px 0px 0px 60px;
            box-shadow: 0px 0px 1px 1px #00000026;
            background: #ffffff;
            padding: 0;
            margin-top: 26px;
            height: 53px;
            display: block;
        }
    }
</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.css'>
<style>
    .slidecontainer {
    width: 100%;
}

    .slider {
    -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
    opacity: 1;
}

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
    }

    .calculate-slider {
    padding: 25px 50px;
        background: #fff;
        border-radius: 40px 0px 0px 40px;
        float: left;
        width: 70%;
        box-shadow: rgba(0, 0, 0, 0.23) 0px 0px 26px 1px;
    }

    .noUi-handle {
    background: #525252;
    box-shadow: 0 11px 19px 0 rgba(12,71,124,0.48);
        border-radius: 50%;
        border: none;
        outline: none;
        cursor: pointer;
    }
    .noUi-handle:before {
    width: 20px;
        height: 20px;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .noUi-handle:after {
    display: none;
}

    .noUi-handle{
    margin-top: 4px;
    }

    .noUi-horizontal .noUi-handle {
    width: 52px;
        height: 52px;
        top: -21px;
    }
    .noUi-target {
    background: #525252;
    border: none;
    box-shadow: none;
        outline: none;
    }
    .noUi-connects {
    border-radius: 10px;
    }
    .noUi-connect {
    background: #525252;
}
    .noUi-horizontal .noUi-tooltip {
    font-weight: 700;
        font-size: 14px;
        color: #fff;
        line-height: 26px;
        text-align: center;
        background: #eb3030;
        box-shadow: 0 11px 28px 0 rgba(255,255,255,0.3);
        padding: 5px 11px;
        border: none;
        border-radius: 20px;
        text-transform: uppercase;
        font-family: "Roboto", sans-serif;
    }
    .noUi-tooltip::after {
    position: absolute;
    content: '';
    width: 10px;
        height: 10px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        bottom: -5px;
        background: var(--background);
    }

    .form-control-2 {
    padding: 10px 10px 10px 25px;
        border-radius: 60px 0px 0px 60px;
        width: 70%;
        border: 1px solid #e6e6e6;
        height: 66px;
        background: #fff;
        box-shadow: 0px 0px 11px 1px #0000000a;
        font-weight: bold;
        font-size: 20px;
        outline: none;
    }

    .form-control-2::placeholder {
    font-weight: bold;
        color: #000;
        font-size: 20px;
    }

    .search-user {
    height: 65px;
        border-radius: 0px 60px 60px 0px;
        background: #000;
        font-weight: bold;
        font-size: 20px;
        padding: 0px 25px;
        margin-left: -5px;
    }

    .range_amount {
    width: 14%;
    float: left;
    text-align: center;
        font-size: 32px;
        font-weight: bold;
        font-family: "Roboto", sans-serif;
        padding-top: 14px;
    }

    .range_purchase{
    width: 10%;
    float: left;
}

    .range_purchase button {
    background: #000;
    color: #fff;
    border: 0;
    padding: 20px 0px;
        width: 100%;
        border-radius: 0px 40px 40px 0px;
        font-size: 19px;
        font-family: "Roboto", sans-serif;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

let platform = "instagram";
let service = "likes";
let host = "https://www.instagram.com/";
let username = "";

let slider = document.getElementById('slider');

var quantity = 100;

let start = 100;

let range = {
    'min': 100,
    'max': 3000
};

let prices = {
    likes : 0.03,
    followers : 0.05,
    comments : 0.6,
    views : 0.015
};

$(document).ready(function(){
    var style = document.querySelector('.noUi-tooltip').style;
    style.setProperty('--background', '#eb3030');
//    $(".search-user").attr("href","javascript:void(0)");
    $("#platform").val(platform);
    $("#service").val(service);
    $("#instagram img").css("box-shadow","rgb(0 0 0) 0px 0px 26px 1px");
    $("#likes a").addClass("red-background");
    $("#followers a").removeClass("blue-background");
    $("#comments a").removeClass("purple-background");
    $("#views a").removeClass("yellow-background");
    $(".service-price").empty().text(quantity * prices.likes);
});

$(document).on("click", ".service-platform", function(e) {
    var selectedPlatform = $(this).attr("id");
    platform = selectedPlatform;

    $("#platform").val(platform);

    if(platform === "instagram"){
        $("#tiktok img").css("box-shadow","none");
        $("#instagram img").css("box-shadow","rgb(0 0 0) 0px 0px 26px 1px");
    }else{
        $("#instagram img").css("box-shadow","none");
        $("#tiktok img").css("box-shadow","rgb(0 0 0) 0px 0px 26px 1px");
    }
    console.log("platform",platform);
});

$(document).on("click", ".service-category", function(e) {
    var selectedService = $(this).attr("id");
    service = selectedService ;

    $("#service").val(service);

    console.log("service",service);
    if(service === "likes"){
        $(".service-price").empty().text((quantity * prices.likes).toFixed(2));
        $("#likes a").addClass("red-background");
        $("#followers a").removeClass("blue-background");
        $("#comments a").removeClass("purple-background");
        $("#views a").removeClass("yellow-background");

        start = 100;
        quantity = 100;
        range = {
            'min': 100,
            'max': 3000
        };

        slider.noUiSlider.updateOptions({
            start: start,
            range: range
        });

        $(".noUi-tooltip").addClass("red-background");
        $(".noUi-tooltip").removeClass("blue-background");
        $(".noUi-tooltip").removeClass("purple-background");
        $(".noUi-tooltip").removeClass("yellow-background");
//        $(".noUi-tooltip:after").css("background","#eb3030");

        $(".noUi-tooltip").empty().append(quantity + ' <i class="fas fa-thumbs-up" style="margin-left: 5px;"></i>');

        var style = document.querySelector('.noUi-tooltip').style;
        style.setProperty('--background', '#eb3030');

    }else if(service === "followers"){
        $(".service-price").empty().text((quantity * prices.followers).toFixed(2));
        $("#likes a").removeClass("red-background");
        $("#followers a").addClass("blue-background");
        $("#comments a").removeClass("purple-background");
        $("#views a").removeClass("yellow-background");

        start = 50;
        quantity = 50;
        range = {
            'min': 50,
            'max': 3000
        };

        slider.noUiSlider.updateOptions({
            start: start,
            range: range
        });

        $(".noUi-tooltip").removeClass("red-background");
        $(".noUi-tooltip").addClass("blue-background");
        $(".noUi-tooltip").removeClass("purple-background");
        $(".noUi-tooltip").removeClass("yellow-background");
//        $(".noUi-horizontal .noUi-tooltip:after").css("background","#2c8db7");

        $(".noUi-tooltip").empty().append(quantity + ' <i class="fas fa-user-circle" style="margin-left: 5px;"></i>');

        var style = document.querySelector('.noUi-tooltip').style;
        style.setProperty('--background', '#2c8db7');

    }else if(service === "comments"){
        $(".service-price").empty().text((quantity * prices.comments).toFixed(2));
        $("#likes a").removeClass("red-background");
        $("#followers a").removeClass("blue-background");
        $("#comments a").addClass("purple-background");
        $("#views a").removeClass("yellow-background");

        start = 20;
        quantity = 20;
        range = {
            'min': 20,
            'max': 1000
        };

        slider.noUiSlider.updateOptions({
            start: start,
            range: range
        });

        $(".noUi-tooltip").removeClass("red-background");
        $(".noUi-tooltip").removeClass("blue-background");
        $(".noUi-tooltip").addClass("purple-background");
        $(".noUi-tooltip").removeClass("yellow-background");
//        $(".noUi-tooltip:after").css("background","#c630eb");

        $(".noUi-tooltip").empty().append(quantity + ' <i class="fas fa-comment-alt" style="margin-left: 5px;"></i>');

        var style = document.querySelector('.noUi-tooltip').style;
        style.setProperty('--background', '#c630eb');

    }else if(service === "views"){
        $(".service-price").empty().text((quantity * prices.views).toFixed(2));
        $("#likes a").removeClass("red-background");
        $("#followers a").removeClass("blue-background");
        $("#comments a").removeClass("purple-background");
        $("#views a").addClass("yellow-background");

        start = 500;
        quantity = 500;
        range = {
            'min': 500,
            'max': 3000
        };

        slider.noUiSlider.updateOptions({
            start: start,
            range: range
        });

        $(".noUi-tooltip").removeClass("red-background");
        $(".noUi-tooltip").removeClass("blue-background");
        $(".noUi-tooltip").removeClass("purple-background");
        $(".noUi-tooltip").addClass("yellow-background");
//        $(".noUi-tooltip:after").css("background","#ebed6c");

        $(".noUi-tooltip").empty().append(quantity + ' <i class="fas fa-play" style="margin-left: 5px;"></i>');

        var style = document.querySelector('.noUi-tooltip').style;
        style.setProperty('--background', '#ebed6c');
    }

});

$(document).on("click", ".search-user", function(e) {
    e.preventDefault();

    username = $("#username input").val();
    var html = '';

    if(username == ""){
        console.error("Instagram Feed: Error, no username found.");
        html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> Enter a valid username</p>';
        $('#username').append(html);
        setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
        return false;
    }

    if(platform === "tiktok"){

        let tiktokUrl = "http://global-boost.workdemo.online/tiktok.php?username=" + username;
        let tiktokHost = "https://www.tiktok.com/@";

        $.get(tiktokUrl, function (data) {

            data = JSON.parse(data);

            if(data.length == 0){
                console.error("Tiktok Feed: Error, no user found.");
                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                $('#username').append(html);
                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                return false;
            }

            if(data.status && data.status == "error"){
                console.error("Tiktok Feed: " + data.message);
                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                $('#username').append(html);
                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                return false;
            }

            if(data.props.pageProps.serverCode && data.props.pageProps.serverCode != 200){
                console.error("Tiktok Feed: Error, no user found.");
                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                $('#username').append(html);
                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                return false;
            }

            if(data.props.pageProps.userInfo.user){

                $("#user-details").val(data);

                $("#instagram-username").val(data.props.pageProps.userInfo.user.uniqueId);
                $(".user-image").attr("src",data.props.pageProps.userInfo.user.avatarThumb);
                $(".user_name").empty().text("@" + data.props.pageProps.userInfo.user.uniqueId);
                $(".user_name").attr("href", tiktokHost + data.props.pageProps.userInfo.user.uniqueId);
                $("#user-followings").empty().text(numberChanger(data.props.pageProps.userInfo.stats.followingCount));
                $("#user-followers").empty().text(numberChanger(data.props.pageProps.userInfo.stats.followerCount));
                $("#user-posts").empty().text(numberChanger(data.props.pageProps.userInfo.stats.videoCount));

                $("#followings").val(numberChanger(data.props.pageProps.userInfo.stats.followingCount));
                $("#followers-new").val(numberChanger(data.props.pageProps.userInfo.stats.followerCount));
                $("#posts").val(numberChanger(data.props.pageProps.userInfo.stats.videoCount));
                $("#avatar").val(data.props.pageProps.userInfo.user.avatarThumb);

                $(".demo-image").hide();
                $(".profile").show();

            }else{
                console.error("Tiktok Feed: Error, no user found.");
                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                $('#username').append(html);
                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                return false;
            }

            //instagramId = data.id;
        }).fail(function (e) {
            console.error("Tiktok Feed: Unable to fetch the given user/tag. Tiktok responded with the status code: ", e.status);
            html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
            $('#username').append(html);
            setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
        });

    }else{
        let url = host + username + "/?__a=1";

        $.post("http://global-boost.workdemo.online/instagram.php",{ url: url }, function (data) {

            if(isJson(data)){

                data = JSON.parse(data);

                if(data.length == 0){
                    console.error("Instagram Feed: Error, no user found.");
                    html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                    $('#username').append(html);
                    setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                    return false;
                }

                if(data.hasOwnProperty("graphql") === false){
                    console.error("Instagram Feed: Error, no user found.");
                    html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                    $('#username').append(html);
                    setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                    return false;
                }

                //            if(data.ha("html")){
                //                console.error("Instagram Feed: Login response.");
                //                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> Something went wrong.</p>';
                //                $('#username').append(html);
                //                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                //                return false;
                //            }

                $("#user-details").val(data);

                $("#instagram-username").val(data.graphql.user.username);
                $(".user-image").attr("src",data.graphql.user.profile_pic_url_hd);
                $(".user_name").empty().text("@" + data.graphql.user.username);
                $(".user_name").attr("href", host + data.graphql.user.username);
                $("#user-followings").empty().text(numberChanger(data.graphql.user.edge_follow.count));
                $("#user-followers").empty().text(numberChanger(data.graphql.user.edge_followed_by.count));
                $("#user-posts").empty().text(numberChanger(data.graphql.user.edge_owner_to_timeline_media.count));

                $("#followings").val(numberChanger(data.graphql.user.edge_follow.count));
                $("#followers-new").val(numberChanger(data.graphql.user.edge_followed_by.count));
                $("#posts").val(numberChanger(data.graphql.user.edge_owner_to_timeline_media.count));
                $("#avatar").val(data.graphql.user.profile_pic_url_hd);

                $(".demo-image").hide();
                $(".profile").show();
            }else{
                console.error("Instagram Feed: Error, no user found.");
                html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
                $('#username').append(html);
                setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
                return false;
            }

            //instagramId = data.id;
        }).fail(function (e) {
            console.error("Instagram Feed: Unable to fetch the given user/tag. Instagram responded with the status code: ", e.status);
            html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> User not found - check spelling</p>';
            $('#username').append(html);
            setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
        });
    }

});

function isJson(item) {
    item = typeof item !== "string"
        ? JSON.stringify(item)
        : item;

    try {
        item = JSON.parse(item);
    } catch (e) {
        return false;
    }

    if (typeof item === "object" && item !== null) {
        return true;
    }

    return false;
}

function changeQuantity(value){
    quantity = value;
    console.log("quantity",quantity);
    $("#quantity").val(value);
}

function submitDetails(){

    if(platform == ""){
        console.error("Platform not selected.");
        return false;
    }

    if(service == ""){
        console.error("Service not selected.");
        return false;
    }

    if(quantity == 0){
        console.error("Quantity not selected.");
        return false;
    }

    if(username == ""){
        console.error("Instagram Feed: Error, no username found.");
        var html = '<p class="error-message" id="username-error-message"><i class="fas fa-times-circle"></i> Enter a valid username</p>';
        $('#username').append(html);
        setTimeout(function(){ $("#username-error-message").remove(); }, 5000);
        return false;
    }
    $('#ajax-enter-details').submit();

}

function numberChanger(labelValue) {

    // Nine Zeroes for Billions
    return Math.abs(Number(labelValue)) >= 1.0e+9

        ? (Math.abs(Number(labelValue)) / 1.0e+9).toFixed(2) + "B"
        // Six Zeroes for Millions
        : Math.abs(Number(labelValue)) >= 1.0e+6

            ? (Math.abs(Number(labelValue)) / 1.0e+6).toFixed(2) + "M"
            // Three Zeroes for Thousands
            : Math.abs(Number(labelValue)) >= 1.0e+3

                ? (Math.abs(Number(labelValue)) / 1.0e+3).toFixed(2) + "K"

                : Math.abs(Number(labelValue));

}

</script>