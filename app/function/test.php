<?php
/*
Template Name: ReviewModule
*/
?>
<?php get_header(); function	summarizeDbObject($obj)
{
	$arr = array();
	$arr['category'] = $obj->category;
	$arr['ponctualite'] = $obj->ponctualite[0];
	$arr['accueil'] = $obj->accueil[0];
	$arr['resultat'] = $obj->resultat[0];
	$arr['soin'] = $obj->soin[0];
	$arr['technicienne'] = $obj->technicienne[0];
	$arr['global'] = $obj->global[0];
	$arr['avg'] = round(($arr['ponctualite'] + $arr['accueil'] + $arr['resultat'] + $arr['soin'] + $arr['technicienne'] + $arr['global']) / 6.0, 1);
	$arr['smiley'] = round($arr['avg'] / 6.0 * 7.0, 0);
	$arr['content'] =  str_replace("'","", $obj->post_content);
	$arr['date'] = $obj->post_date;

	// handle names
	$names = explode('_', $obj->post_title);
	$arr['firstname'] = '';
	$arr['lastname'] = '';
	if (isset($names[0]))
	{
		$arr['firstname'] = str_replace("'","",$names[0]);
		$arr['lastname'] = str_replace("'","",$names[1]);
	}
	return ($arr);
}

function	calculateAvgByCategory($arr)
{
	$ret['ponctualite'] = 0;
	$ret['accueil'] = 0;
	$ret['resultat'] = 0;
	$ret['soin'] = 0;
	$ret['technicienne'] = 0;
	$ret['global'] = 0;
	$ret['avg'] = 0;
	$i = count($arr);
	foreach ($arr as $com)
	{
		$ret['ponctualite'] += $com['ponctualite'];
		$ret['accueil'] += $com['accueil'];
		$ret['resultat'] += $com['resultat'];
		$ret['soin'] += $com['soin'];
		$ret['technicienne'] += $com['technicienne'];
		$ret['global'] += $com['global'];
		$ret['avg'] += $com['avg'];
	}
	$ret['ponctualite'] = round($ret['ponctualite'] / $i, 1);
	$ret['accueil'] = round($ret['accueil'] / $i, 1);
	$ret['resultat'] = round($ret['resultat'] / $i, 1);
	$ret['soin'] = round($ret['soin'] / $i, 1);
	$ret['technicienne'] = round($ret['technicienne'] / $i, 1);
	$ret['global'] = round($ret['global'] / $i, 1);
	$ret['avg'] = round($ret['avg'] / $i, 1);
	return ($ret);
}

$terms = get_terms('soin', array(
	'hide_empty' => false,
));

$termsArr = array();
$termsArr[0] = 'Tous';
$arr = array();
$arr[$termsArr[0]] = array();
foreach ($terms as $t)
{
	$termsArr[$t->term_id] = $t->name;
	$arr[$t->name] = array();
}

$args = array(
	'posts_per_page'   => -1,
	'orderby'          => 'date',
	'post_type'        => 'reviews',
	'post_status'      => 'publish',
);

$reviewsList = get_posts($args);

foreach ($reviewsList as $list)
{
	$list->all = get_post_meta($list->ID);
	$comment = summarizeDbObject($list);
	$arr[$termsArr[0]]['comments'][] = $comment;
	$arr[$termsArr[$comment['category']]]['comments'][] = $comment;
}

// calculate average sum ...
foreach ($arr as $key => $line)
{
	$arr[$key]['nbr_comments'] = 0;
	$arr[$key]['ponctualite'] = 0;
	$arr[$key]['accueil'] = 0;
	$arr[$key]['resultat'] = 0;
	$arr[$key]['soin'] = 0;
	$arr[$key]['technicienne'] = 0;
	$arr[$key]['global'] = 0;
	$arr[$key]['avg'] = 0;
	if (isset($line['comments']))
	{
		$arr[$key]['nbr_comments'] = count($line['comments']);
		$tmp = calculateAvgByCategory($line['comments']);
		$arr[$key]['ponctualite'] = $tmp['ponctualite'];
		$arr[$key]['accueil'] = $tmp['accueil'];
		$arr[$key]['resultat'] = $tmp['resultat'];
		$arr[$key]['soin'] = $tmp['soin'];
		$arr[$key]['technicienne'] = $tmp['technicienne'];
		$arr[$key]['global'] = $tmp['global'];
		$arr[$key]['avg'] = $tmp['avg'];
	}
}

$json = json_encode($arr);
?>

<div class="content " style="min-height: 527px; margin-bottom: 392px;">
	<div class="content_inner no_animation " style="">												<div class="q_slider">
			<div class="q_slider_inner">
				<div id="qode-thalasso" class="carousel slide    q_auto_start   header_not_transparent" data-slide_animation="6000" data-height="620" data-parallax="yes" style="height: 620px; "><div class="qode_slider_preloader" style="height: 620px; display: none;"><div class="ajax_loader_slider"><div class="ajax_loader_1"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div></div></div><div class="carousel-inner skrollable skrollable-between" data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);" style="transform: translateY(-183.333px); display: block;"><div class="item dark active" style="height: 620px;"><div class="image" style="background-image:url('http://www.beautyline-institut.fr/wp-content/uploads/2014/11/le_centre2.jpg');"></div><div class="slider_content_outer"><div class="slider_content skrollable skrollable-after" style="width: 100%; left: 0%; top: 20%; opacity: 0;" data-start="width:100%; opacity:1; left:0%; top:30%;" data-300="opacity: 0; left:0%; top:20%;"><div class="text"><h4 style=""><span></span></h4><h1 style=""><span><?= get_the_title(); ?></span></h1><div class="separator small"></div><p style="font-style: normal;"><span>Découvrez les retours de nos clients</span></p></div></div></div></div></div></div>				</div>
			<!--<div id="fa_down">
				<i class="fa fa-angle-down"></i>
			</div>-->
		</div>
		<div id="jsonContainer" class="container" data-comment='<?php echo($json); ?>'>

			<script>
                function InitMenu(){var e={Tous:obj.Tous,"Epilation définitive":obj["Epilation définitive"],Amincissement:obj.Amincissement,Rajeunissement:obj.Rajeunissement,"Soins visage":obj["Soins visage"]};for(category in e){console.log(category);var t='<a href="#'+category.toLowerCase()+'" onclick="changeCat(\''+category+'\');" id="ReviewMenu'+category.toLowerCase().replace(/\s+/g,"")+'" > <li class="">'+category+" </li> </a>";document.getElementById("ReviewCategoriesListPos").innerHTML+=t.toString()}document.getElementById("ReviewMenutous").classList.add("active")}function UpdateReviewSynthese(e){var t=e;if("Tous"===t)var n="Tous les avis";else var n=t;document.getElementById("ReviewSyntheseTitle").innerHTML=n;for(var s="",i=0;i<obj[e].avg;i++)s+='<span><i class="fa fa-star"></i></span>';document.querySelector(".star-ratings-top").innerHTML=s,document.querySelector(".ReviewSyntheseNote").innerHTML="<p>Note générale: <span>"+obj[e].avg+"/5</span> </p><p>Nombre d'avis: <span>"+obj[e].nbr_comments+"</span></p>"}function UpdateReviewSyntheseList(e){document.querySelector(".ReviewSyntheseListContainer").innerHTML="",document.querySelector(".ReviewSyntheseListContainer").innerHTML+='<li><span>Accueil</span> <span class="ReviewSyntheseListDiagram"style="width: '+obj[e].accueil/5*100+'px"></span> <span>'+obj[e].accueil+"/5</span></li>\n",document.querySelector(".ReviewSyntheseListContainer").innerHTML+='<li><span>Résultat</span> <span class="ReviewSyntheseListDiagram"style="width: '+obj[e].resultat/5*100+'px"></span> <span>'+obj[e].resultat+"/5</span></li>\n",document.querySelector(".ReviewSyntheseListContainer").innerHTML+='<li><span>Soin</span> <span class="ReviewSyntheseListDiagram"style="width:'+obj[e].soin/5*100+'px"></span> <span>'+obj[e].soin+"/5</span></li>\n",document.querySelector(".ReviewSyntheseListContainer").innerHTML+='<li><span>Technicienne</span> <span class="ReviewSyntheseListDiagram"style="width: '+obj[e].technicienne/5*100+'px"></span> <span>'+obj[e].technicienne+"/5</span></li>\n",document.querySelector(".ReviewSyntheseListContainer").innerHTML+='<li><span>Expérience</span> <span class="ReviewSyntheseListDiagram"style="width:'+obj[e].global/5*100+'px"></span> <span>'+obj[e].global+"/5</span></li>\n"}function sortByAvgAsc(e,t){return e.avg<t.avg?-1:e.avg>t.avg?1:0}function sortByAvgDesc(e,t){return e.avg<t.avg?1:e.avg>t.avg?-1:0}function sortByDate(e,t){return e.date<t.date?1:e.date>t.date?-1:0}function UpdateReviewList(e){if(document.querySelector(".ReviewList").innerHTML="",0!==obj[e].nbr_comments)for(var t=0;t<obj[e].comments.length;t++){var n=obj[e].comments[t].content,s='  <div class="ReviewSolo" id="ReviewSolo'+t+'">\n                                <time>'+obj[e].comments[t].date.slice(0,7)+'</time>\n                                <img src="http://www.beautyline-institut.fr/wp-content/plugins/ReviewModule/src/assets/img/'+parseInt(Math.round(obj[e].comments[t].smiley))+'.svg" alt="" class="ReviewSoloSmiley">\n                                <h5>'+obj[e].comments[t].firstname+" "+obj[e].comments[t].lastname.slice(0,1)+'.</h5>\n                            <cite> " '+n+"\" </cite> <div class='ReviewSoloNotes'><span>Accueil: </span>"+obj[e].comments[t].accueil+"/5  <span>Resultat: </span>"+obj[e].comments[t].resultat+"/5 <span>Soin: </span>"+obj[e].comments[t].soin+"/5 <span>Technicienne: </span>"+obj[e].comments[t].technicienne+"/5 <span>Expérience: </span>"+obj[e].comments[t].global+"/5 </div><a onclick='seeMore(this);' data-container=\""+t+"\" class='ReviewSoloGradient'>Voir plus</a></div>";document.querySelector(".ReviewList").innerHTML+=s}else document.querySelector(".ReviewList").innerHTML+='<div class="ReviewSolo">  <time>Pas d\'avis  <time></div>'}function seeMore(e){console.log(e.attributes["data-container"]);var t="ReviewSolo"+e.attributes["data-container"].value;document.getElementById(t).classList.contains("open")?(document.getElementById(t).style="max-height: 100px!important",document.getElementById(t).classList.remove("open"),document.querySelector("#"+t+" >.ReviewSoloNotes").style="opacity: 0",document.querySelector("#"+t+" >.ReviewSoloGradient").innerHTML="Voir plus"):(document.getElementById(t).style="max-height: inherit!important;",document.querySelector("#"+t+" >.ReviewSoloNotes").style="opacity: 1!important;",document.querySelector("#"+t+" >.ReviewSoloGradient").innerHTML="Voir moins",document.getElementById(t).classList.add("open"))}function UpdateSortReviewList(e){var t=e.value;if(0==t?obj[savedCat].comments.sort(sortByDate):1==t?obj[savedCat].comments.sort(sortByAvgDesc):obj[savedCat].comments.sort(sortByAvgAsc),0!==obj[savedCat].nbr_comments){document.querySelector(".ReviewList").innerHTML="";for(var n=0;n<obj[savedCat].comments.length;n++){var s=obj[savedCat].comments[n].content,i=' <div class="ReviewSolo" id="ReviewSolo'+n+'">\n                                <time>'+obj[savedCat].comments[n].date.slice(0,10)+'</time>\n                                <img src="http://www.beautyline-institut.fr/wp-content/plugins/ReviewModule/src/assets/img/'+parseInt(Math.round(obj[savedCat].comments[n].smiley))+'.svg" alt="" class="ReviewSoloSmiley">\n                                <h5>'+obj[savedCat].comments[n].firstname+" "+obj[savedCat].comments[n].lastname.slice(0,1)+'.</h5>\n                            <cite> " '+s+"\" </cite><div class='ReviewSoloNotes'><span>Accueil: </span>"+obj[savedCat].comments[n].accueil+"/5  <span>Resultat: </span>"+obj[savedCat].comments[n].resultat+"/5 <span>Soin: </span>"+obj[savedCat].comments[n].soin+"/5 <span>Technicienne: </span>"+obj[savedCat].comments[n].technicienne+"/5 <span>Expérience: </span>"+obj[savedCat].comments[n].global+"/5 </div><a onclick='seeMore(this);' data-container=\""+n+"\" class='ReviewSoloGradient'>Voir plus</a> </div>";document.querySelector(".ReviewList").innerHTML+=i}}else document.querySelector(".ReviewList").innerHTML+='<div class="ReviewSolo">  <time>Pas d\'avis  <time></div>'}function changeCat(e){UpdateReviewSynthese(e),UpdateReviewSyntheseList(e),UpdateReviewList(e);for(var t=0;t<document.querySelectorAll("a.active").length;t++)document.querySelectorAll("a.active")[t].classList.remove("active");document.getElementById("ReviewMenu"+e.toLowerCase().replace(/\s+/g,"")).classList.add("active"),savedCat=e}function Init(){InitMenu(),UpdateReviewSynthese("Tous"),UpdateReviewSyntheseList("Tous"),UpdateReviewList("Tous")}var dom=document.getElementById("jsonContainer"),coms=dom.getAttribute("data-comment"),obj=JSON.parse(coms),savedCat="Tous";
			</script>
			<div class="full_width_inner">
				<div class="container_inner clearfix">

					<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
						<div class="column1">
							<div class="column_inner">

								<div class="ReviewSynthese">
									<h2 id="ReviewSyntheseTitle">
										Tous nos soins
									</h2>
									<div class="ReviewSyntheseContent">

										<div class="star-ratings">
											<div class="star-ratings-top">
												<span><i class="fa fa-star"></i></span>
												<span><i class="fa fa-star"></i></span>
											</div>
											<div class="star-ratings-bottom">
												<span><i class="fa fa-star-o"></i></span>
												<span><i class="fa fa-star-o"></i></span>
												<span><i class="fa fa-star-o"></i></span>
												<span><i class="fa fa-star-o"></i></span>
												<span><i class="fa fa-star-o"></i></span>
											</div>
										</div>



										<p class="ReviewSyntheseNote"></p>

									</div>
									<div class="ReviewSyntheseList">
										<h4>Moyenne par critère :</h4>
										<ul class="ReviewSyntheseListContainer">
										</ul>
									</div>

								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="ReviewCategories">

									<ul id="ReviewCategoriesListPos" >
									</ul>

								</div>
								<div class="ReviewFilter">
									<p>Trier par: <span>les plus</span></p>
									<select onchange="UpdateSortReviewList(this);" name="" id="">
										<option value="0">Recents</option>
										<option value="1">Meilleures notes</option>
										<option value="2">Moins bonnes notes</option>
									</select>
								</div>
								<div class="ReviewList">
								</div>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="content_bottom">
		</div>

	</div>
</div>
<?php wp_reset_query(); ?>
<script>
    Init();

</script>
<?php get_footer(); ?>
