<!DOCTYPE html>
<html class="no-js" lang="pl">
    <head>
        <meta charset="utf-8">
        <meta content="ie=edge,chrome=1" http-equiv="x-ua-compatible">
        <title>Graj - FUTHAND</title>
        <meta content="Zagraj w HaxBall, przeglądarkową grę online multiplayer w czasie rzeczywistym." name="description">
        <meta content="haxball,futhand,gra,pilka nozna,futsal,handball,pilka reczna,multiplayer,game,football,air-hockey,soccer" name="keywords">
        <meta content="no" http-equiv="imagetoolbar">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="favicon.png" rel="shortcut icon">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css"><![endif]-->
        <link href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet" type="text/css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script type="text/javascript">top!=self&&(top.location=location</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/prototype/1.7.2/prototype.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/swfobject/2.2/swfobject.min.js" type="text/javascript"></script>
        <script src="js/classes.js" type="text/javascript"></script>
        <script type="text/javascript">
            function refreshPage()
            {
                var hw=document.getElementById("hwAcc");
                var base=window.location.toString().replace("#","");
                if(hw.selectedIndex==0)
                {
                    HaxBall.enableWmodeDirect();
                }
            else
            {
                HaxBall.disableWmodeDirect();
            }
        window.location=base;
        }
        var lheight=28;
        var notheight=70;
        function toggleOptions()
        {
        if(document.getElementById("gpu_notice").style.display=="none")
        {
            document.getElementById("gpu_notice").style.display="block";
            document.getElementById("the_game").style.top=(notheight+46)+"px";
        }
        else
        {
            document.getElementById("gpu_notice").style.display="none";
            document.getElementById("the_game").style.top="46px";
        }
        }
        function loadOptions()
        {
        if (HaxBall.wmodeDirect())
        {
        document.getElementById("hwAcc").selectedIndex=0;
        }
        else document.getElementById("hwAcc").selectedIndex=1;
        document.getElementById("gpu_notice").style.height=notheight+"px";
        document.getElementById("gpu_notice").style.lineHeight=lheight+"px";
        }
        function HaxEmbed() {
                var swfName = "4.swf", replayVersion = swfobject.getQueryParamValue("replay");
                var flashvars = {
                    token: "hax"
                };
                var params = {
                    bgcolor: "#939e7f",
                    allowScriptAccess: "always"
                };
                var attributes = {
                        id: "haxball"
                };
                if (HaxBall.wmodeDirect()) {
                    params.wmode = "direct";
                    flashvars.wmode_direct = "yes";
                }
                if ( replayVersion.match(/^\d+$/) ) {
                    swfName = "/swf/" + replayVersion + ".swf";
                    if (location.hash.match(/^#.+/)) {
                        flashvars.replayurl = location.hash.substr(1);
                    }
                } 
                else
                {
                  if (swfobject.getQueryParamValue("roomid")) {
                    flashvars.roomid = swfobject.getQueryParamValue("roomid");
                    if (swfobject.getQueryParamValue("pass")) flashvars.pass = swfobject.getQueryParamValue("pass");
                  }
                  flashvars.nickname = "<?php
                    error_reporting(0);
                    define('BASE', dirname(dirname(__FILE__)) );
                    define('DS', DIRECTORY_SEPARATOR );             
                    define("IN_MYBB", 1);
                    require_once BASE.DS."global.php";
                    if($mybb->user['username']) echo $mybb->user['username'];
                    ?>";
                }
                swfobject.embedSWF(swfName, "no_flash", "100%", "99%", "10.0.0", "expressInstall.swf", flashvars, params, attributes);
            }
        </script>
    </head>
    <body id="play" style="overflow:hidden">
        <!--[if lte IE 8]><p class="browserupgrade">Używasz <strong>nieaktualnej</strong> przeglądarki. Proszę, <a href="http://browsehappy.com/">uaktualnij przeglądarkę</a> aby poprawić funkcjonalność i wygląd stron.</p><![endif]-->
        <div id="header">
            <ul id="navigation">
                <li class="active"><a href="http://futhand.pl/hb/">Graj</a></li>
                <li><a href="http://futhand.pl/">FutHand</a></li>
                <li><a href="#" onclick="toggleOptions();">Opcje</a></li>
            </ul>
        </div>
        <div class="notice" id="gpu_notice" style="display:none">
            <table>
                <tr>
                    <td>Akceleracja sprzętowa:</td>
                    <td>
                        <select id="hwAcc">
                            <option selected="yes">Tak</option>
                            <option>Nie</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input onclick="refreshPage();" style="width:50%;height:100%" type="button" value="Zapisz">
                    </th>
                </tr>
            </table>
        </div>
		<!--<div id="gpu_disabled_notice" class="notice">Masz wyłączoną akcelerację sprzętową dla HaxBall. Jeśli zrobiłeś to przez przypadek <a href="http://futhand.pl/hb/?gpu=on">kliknij tutaj, aby włączyć ją ponownie</a> lub <a href="#" onclick="HaxBall.hideNotice(); return false;">zamknij to powiadomienie</a>.</div>-->
        <div class="settings" id="the_game" style="top:47px;background-color:#939e7f">
            <div id="no_flash" style="visibility:visible">
                <div id="sad_face">:(</div>
                <h2>Przepraszamy, musisz posiadać Adobe Flash Player, aby zagrać w Haxball.</h2>
                <p>Musisz zainstalować Adobe Flash Player 10 (lub nowszą wersję).</p>
                <p>Kliknij poniżej aby pobrać Adobe Flash Player.</p>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Zainstaluj Adobe Flash Player"></a></p>
                <p>Jeśli masz zainstalowaną wtyczkę Adobe Flash Player i nadal widzisz tą wiadomość upewnij się, że masz włączoną obsługę JavaScript.</p>
            </div>
        </div>
        <script src="js/plugins.js"></script> 
        <script type="text/javascript">loadOptions();HaxEmbed();</script> 
        <script type="text/javascript">
            (function() {
                var r;
                window.onbeforeunload = function(e) {
                    if($('haxball').isRecording())
                    {
                        $('haxball').saveRecording();
                        $('haxball').startRecording();
                    }
                    if (r = $('haxball').onUnload()) {
                        return (e || window.event).returnValue = 'Jesteś hosterem tego meczu, jesteś pewien, że chcesz go zamknąć?';
                    }
                    else if ($('haxball').isRecording())
                    {
                        return (e || window.event).returnValue = 'Nagrywasz ten mecz, jesteś pewien, że chcesz go zamknąć?';
                    }
                };
                window.onunload = function() {
                    r && new Ajax.Request(r, {postBody: ":0", asynchronous: false});
                };
            })();
            //HaxBall.initGpuNoticeTimeout();
        </script>
		<!--[if lte IE 9]>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/css3finalize/4.1.0/jquery.css3finalize.min.js"></script>
    </body>
</html>