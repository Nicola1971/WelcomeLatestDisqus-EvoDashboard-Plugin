<?php
/**
 * WelcomeLatestDisqus RC 3.0
 * author Nicola Lambathakis http://www.tattoocms.it/
 *
 * Latest Disqus Comments widget for EvoDashboard
 * Event: OnManagerWelcomeHome,OnManagerMainFrameHeaderHTMLBlock
&WidgetTitle=Widget Title:;string;Latest Disqus Comments &DisqusDomain=Disqus domain name (ie: tattoocms):;string;tattoocms &DisqusApiKey=Disqus Public Key:;string;S95vswe6x8aXZRojcr5ZY9x0e4FNW48a1ZSfKMvUbEgc45kbzIxAN0llIb1mHwBq &num_items=Number of comments to show in the widget:;string;5 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;4 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;2
****

/** credits: https://github.com/bachors/jQuery-disqus-widget/blob/master/index.html */


//widget name
$WidgetID = isset($WidgetID) ? $WidgetID : 'latest_disqus';
// size and position
$datarow = isset($datarow) ? $datarow : '1';
$datacol = isset($datacol) ? $datacol : '2';
$datasizex = isset($datasizex) ? $datasizex : '2';
$datasizey = isset($datasizey) ? $datasizey : '2';
//output
$WidgetOutput = isset($WidgetOutput) ? $WidgetOutput : '';
//events
$EvoEvent = isset($EvoEvent) ? $EvoEvent : 'OnManagerWelcomeHome';
$output = "";
$e = &$modx->Event;


if($e->name == 'OnManagerMainFrameHeaderHTMLBlock') {
$jsinclude = '
<script src="media/script/jquery/jquery.min.js"></script>
    <script>
/*---------- Setting ----------------*/
bcr_disqus(\''.$DisqusDomain.'\','.$num_items.',\''.$DisqusApiKey.'\');
/*-----------------------------------*/


function bcr_disqus(username,count,apikey) {
    $.ajax({
        url: \'https://disqus.com/api/3.0/forums/listPosts.json?forum=\' + username + "&limit=" + count + "&related=thread&api_key=" + apikey,
        crossDomain: true,
        dataType: \'json\'
    }).done(function (data) {
        var html = \'\';
        html += \'<ul id="komentar">\';
        $.each(data.response, function(i, item) {       
            html += \'<li>\';
            html += \'<div class="avatar-container">\';
            html += \'<a href="\' + data.response[i].author.profileUrl + \'" target="_blank">\';
            html += \'<img src="\' + data.response[i].author.avatar.small.permalink + \'" class="avatar" alt="avatar" />\';
            html += \'</a>\';
            html += \'</div>\';
            html += \'<div class="post-container">\';
            html += \'<a href=\' + data.response[i].author.profileUrl + \'" class="profile" target="_blank">\';
            html += \'<span class="profile">\' + data.response[i].author.name;
            html += \'</a>\';              
            html += \'<span class="buled" aria-hidden="true">•</span>\';
            html += \'<span class="date">\' + data.response[i].createdAt + \'</span>\';
            html += \'<p>\' + data.response[i].raw_message + \'</p>\';
            html += \'<span class="posted">posted on <a href="\' + data.response[i].thread.link + \'" target="_blank">\' + data.response[i].thread.title + \'</a></span>\';
            html += \'</div>\';
            html += \'</li>\';        
        });
        html += \'</ul>\';
        $(\'#mydisqus\').html(html);
    });
}
</script>';
}

/*Widget Box */
if($e->name == ''.$EvoEvent.'') {
$WidgetOutput = '

<style>
ul#komentar {
  list-style-type: none;
  color: #3f4549;
  padding: 0px
}
ul#komentar li {
	margin-bottom: 10px;
	padding-bottom: 10px;
	position: relative;
  border-bottom: 1px solid #eee
}
ul#komentar li a {
	text-decoration: none;
	color: #4183C4
}
.avatar-container {
	width: 64px;
	box-sizing: border-box
}
.avatar {
	width: 60px;
	height: 60px;
	border-radius: 5px;
	float: left;
	margin: 5px
}
.post-container {
	padding-top: 3px;
	margin-left: 70px; 
	box-sizing: border-box
}
.profile {
	font-weight: bold
}
.date, .posted, .buled {
  color: #a5b2b9
}
.buled {
  padding: 0 2px
}
</style>
<li id="'.$WidgetID.'" data-row="'.$datarow.'" data-col="'.$datacol.'" data-sizex="'.$datasizex.'" data-sizey="'.$datasizey.'">
                    <div class="panel panel-default widget-wrapper">
                      <div class="panel-headingx widget-title sectionHeader clearfix">
                          <span class="pull-left"><i class="fa fa-commenting-o"></i> '.$WidgetTitle.'</span>
                            <div class="widget-controls pull-right">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs panel-hide hide-full fa fa-minus" data-id="'.$WidgetID.'"></a>
                                </div>     
                            </div>

                      </div>
                      <div class="panel-body widget-stage sectionBody">
           
		   <!--disqus -->
		 <div id="mydisqus"></div>
		   <!---/disqus --->
		   
		   
		   
                      </div>
                    </div>           
                </li>

';
}
//end widget
$output = $jsinclude.$WidgetOutput;
$e->output($output);
return;

?>