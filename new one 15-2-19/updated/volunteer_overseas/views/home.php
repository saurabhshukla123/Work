<?php
    $assets_url = ASSETS_URL;
    $indexPageData = json_decode($indexPageData);
?>
<!----content start------>
<main id="homepage">
    <div class="banner-wrap">  
        <div class="banner-img page-banner" style="background: url(<?php echo $assets_url; ?>images/banners/banner-img.jpg);"></div>
        <div class="banner-text">
            <div class="container">
                <h2>Discover Yourself, Discover the World</h2>
                <span>Apply to your perfect volunteer, intern, or teach abroad program.</span>
                <div class="banner-search clearfix">
                        <form>
							<div class="col">
								<label>Type</label>
                                <select class="custom-dropdown" name="search_category">
                                <?php if(!empty($indexPageData->categories)){?>
                                <?php foreach($indexPageData->categories as $value){ ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                <?php }} ?>
                                </select>
							</div>
							<div class="col">
								<label>Location</label>
								<div class="form-group">
									<input id="tags" type="text" placeholder="Anywhere" class="form-control onFocus ">
								</div>
							</div>
							<div class="col project-type">
								<label>Activity</label>
								<select class="custom-dropdown">
									<option>Anything</option>
									<option>Option1</option>
									<option>Option2</option>
									<option>Option3</option>
								</select>
							</div>
							<div class="col search-btn-outer">
								<button type="submit" class="search-btn">Search</button>
							</div>
						</form>                 
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-line">
    <div class="container-fluid"> 
    </div>
</main>
</div>
<!----content end------>
