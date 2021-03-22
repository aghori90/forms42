<div class="container d-flex clearfix" id="b-accessibility">
		<div class="b-ministryname">
			<div class="text-right d-inline-block font-weight-bold b-acc-goi pr-sm-2">
				<a href="https://www.india.gov.in/" target="_blank"><span>Government of India</span></a>
			</div>
			<div class="d-inline-block font-weight-bold b-acc-ministry pl-sm-2">
				<a href="https://powermin.nic.in/" target="_blank"><span>Ministry of Power</span></a>
			</div>
		</div>
		
		
		<div class="ml-auto d-flex b-acc-icons">
			<div class="align-self-center">

				<div class="d-inline-block h-100 px-3">
					<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/icons/ico-site-search.png" alt="site search icon" title="Site search" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">

					<div class="dropdown-menu p-0 border-0 b-search">
						<label for="site-search" style="display:none;">Site search</label>
				        <input type="text" class="form-control float-left b-site-search" id="site-search" placeholder="Search" style="width: 150px; border-radius: 0;">
					    <div class="input-group-btn float-left">
					      <button class="btn" type="submit" style="border-radius: 0; background: #505050; color: white; box-shadow: 0 0 0 0.2rem rgba(0,123,255,0);"> 
					      	<span style="display:none;">Search</span>
					        <span class="fas fa-search"></span>
					      </button>
					    </div>
				    </div>
				</div>

				<div class="d-inline-block h-100 px-3 dropdown">
					<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/icons/ico-social.png" alt="social sites links" title="Social links" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">

					<div class="dropdown-menu b-social-dropdown" style="min-width: 50px; width: 50px">
				        <a href="javascript:void(0)" class="dropdown-item"> <span style="display:none;">Facebook link</span><span class="fab fa-facebook-f"></span> </a>
				        <a href="javascript:void(0);" class="dropdown-item"> <span style="display:none;">Twitter link</span><span class="fab fa-twitter"></span> </a>
				        <a href="javascript:void(0)" class="dropdown-item"> <span style="display:none;">Youtube link</span><span class="fab fa-youtube"></span> </a>
				    </div>
				</div>
				

				<div class="d-inline-block h-100 px-3">
					<a href="#b-homedb" class="align-self-center b-skiptomain" title="Skip to main content">
						<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/icons/ico-skip.png" alt="skip to main content icon">
					</a>
				</div>

				<div class="d-inline-block h-100 px-3">
					<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/icons/ico-accessibility.png" alt="accessibility icon" title="Accessibility Dropdown" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">

					<div class="dropdown-menu b-accessibility-dropdown" style="min-width: 50px; width: 50px">
				        <a href="javascript:void(0);" class="dropdown-item" title="Increase font size"> <span class="font-weight-bold"> A<sup>+</sup> </span> </a>
				        <a href="javascript:void(0)" class="dropdown-item" title="Reset font size"> <span class="font-weight-bold"> A </span> </a>
				        <a href="javascript:void(0);" class="dropdown-item" title="Decrease font size"> <span class="font-weight-bold"> A<sup>-</sup> </span> </a>
				        <a href="javascript:void(0)" class="dropdown-item bg-dark" title="High contrast"> <span class="font-weight-bold text-white"> A </span> </a>
				    </div>
				</div>

				<div class="d-inline-block h-100 px-3">
					<a href="site-map.html" title="Sitemap">
						<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/icons/ico-sitemap.png" alt="sitemap icon">
					</a>
				</div>

				
			</div>
			
		</div>
		
	</div>
    <!-- Header -->
	<div class="container clearfix" id="b-header">
		<div class="float-left d-flex h-100">
			<img src="<?php echo $this->getRequest()->webroot;?>webroot/img/emblem-dark.png" class="align-self-center b-emblem-image" title="National Emblem of India" alt="emblem of india logo">
		</div>

		<div class="float-left d-flex h-100">
			<h2 class="align-self-center pl-3 b-appname"><span class="font-weight-bold">UJALA Yojna</span> <br><span class="b-appfullname">(Unnat Jyoti by Affordable LEDs for All)</span></h2>
		</div>  
	</div>