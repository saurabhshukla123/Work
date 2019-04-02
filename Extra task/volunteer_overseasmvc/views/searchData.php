<?php
// include "function.php";
//  include 'model/project.php';

$assets_url = ASSETS_URL;
$searchPageData = json_decode($searchPageData);


if (!empty($searchPageData->result_project_data)) {
    foreach ($searchPageData->result_project_data as $valueproject) {$i++;
        echo	 '<div class="col-lg-4 col-md-4 pt-4">
						 <div class="image">
							 <div id="carouselExampleControls'. $i.'" class="carousel slide" data-ride="carousel">
								 <div class="carousel-inner">
									 <div class="carousel-item active">
										 <img class="d-block w-100" src="'. IMAGES.'
                                     '.$valueproject->image.'" height="200px" alt="First slide">

										 <h5 class="search-owl-first"><a href="#" class="pink">'. $valueproject->orgname.'</a></h5>
									 </div>
								 </div>
								 <a class="carousel-control-prev" href="#carouselExampleControls'.$i .'" role="button" data-slide="prev">
									 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
									 <span class="sr-only">Previous</span>
								 </a>
								 <a class="carousel-control-next" href="#carouselExampleControls'. $i.'" role="button" data-slide="next">
									 <span class="carousel-control-next-icon" aria-hidden="true"></span>
									 <span class="sr-only">Next</span>
								 </a>
							 </div>
							 <div class="text-search pt-1">
								 <h5><a href="volunteer.php?id='. $valueproject->id.'" style="font-size:16px; color:black;">'. $valueproject->title.'</a>
								 </h5>
								 <span>
									 <img src="'. IMAGES .'volunteer-logo01.png" style=" height: 22px;width: 22px; border-radius: 9px">
									 <a href="#" class="blue" style="font-size:14px;">Love Volunteer</a>
								 </span>
								 <a href="#" class="blue" style="font-size:14px; color:black;display:block;">$.'. $valueproject->per_week_cost .'/week 1-'. $valueproject->total_weeks.' Weeks duration</a>
							 </div>
						 </div>
                     </div>';
                    }}?>