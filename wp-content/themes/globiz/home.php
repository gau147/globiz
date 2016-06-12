<?php get_header(); ?>
<a href="" style="width:106px;height:92px;position:absolute;top:0px;right:0px;z-index:3999;text-indent:-9999px;background: url(<?php echo get_template_directory_uri();?>/images/css1.png) no-repeat;" target="_blank">Best CSS Web Gallery</a>
<a href="" style="width:100px;height:38px;position:absolute;top:100px;right:0px;z-index:3999;text-indent:-9999px;background: url(<?php echo get_template_directory_uri();?>/images/css2.png) no-repeat;" target="_blank">CSS Light Web Gallery</a>
<a href="" style="width:80px;height:56px;position:absolute;top:158px;right:0px;z-index:3999;text-indent:-9999px;background: url(<?php echo get_template_directory_uri();?>/images/css3.png) no-repeat;" target="_blank">CSS Light Web Gallery</a>
<a href="" style="width:140px;height:46px;position:absolute;top:220px;right:0px;z-index:3999;text-indent:-9999px;background: url(<?php echo get_template_directory_uri();?>/images/css4.png) no-repeat;" target="_blank">CSS Reel Web Gallery</a>

	<!-- Primary Page Layout
	================================================== -->
	
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>	

	<!-- Home
	================================================== -->	


		

		<a href="" id="arrow_left"></a>
		<a href="" id="arrow_right"></a>	
		<div id="maximage">
			<img src="<?php echo get_template_directory_uri();?>/images/1.jpg" alt=""/>
			<img src="<?php echo get_template_directory_uri();?>/images/2.jpg" alt=""/>
			<img src="<?php echo get_template_directory_uri();?>/images/3.jpg" alt=""/>
		</div>	

		
	<div id="home">	
	
<div class="home-text">
			<div class="container">
				<div class="sixteen columns">
					<div class="home-text-top">we are</div>
				</div>
			</div>
			<div class="container">
				<div class="sixteen columns">
					<div class="line"></div>
				</div>
			</div>
			<div class="container">
				<div class="sixteen columns">
					<div class="home-text-middle">Glob<span>iz</span></div>
				</div>
			</div>
			<div class="container">
				<div class="sixteen columns">
					<div class="line"></div>
				</div>
			</div>
			<div class="container">
				<div class="sixteen columns">
					<div class="home-text-bottom">Technology Inc.</div>
				</div>
			</div>
			<div class="container">
				<div class="sixteen columns">
					<div class="cl-effect-18">
						<?php dynamic_sidebar( 'sidebar-5' ); ?>
					</div>
				</div>
			</div>
		</div>

	<div id="arrow"><a href="#profile" class="scroll" >About Us</a></div>	
	
	</div>	


<div id="cbp-so-scroller" class="cbp-so-scroller">	
	

	<nav id="navigation">
		<a href="#home" class="scroll" ><img class="logo" alt='logo' src='<?php echo get_template_directory_uri();?>/images/logo3.png'></a>
                    <ul id="menu">
                        <li>
                            <a href="#home" class="scroll">Home</a>
                        </li>
                        <li class="current">
                            <a href="#profile" class="scroll">About Us</a>
                        </li>
                        <li>
                            <a href="#team" class="scroll">The Team</a>
                        </li>
                        <li>
                            <a href="#services" class="scroll">Services</a>
                        </li>
                        <li>
                            <a href="#portfolio" class="scroll">Works</a>
                        </li>
                        <li>
                            <a href="#contact" class="scroll">contact</a>
                        </li>
                    </ul>
	</nav>		
	<div id="profile">
		<div class="title">
			<div class="container">
			<section class="cbp-so-section">
				<div class="sixteen columns cbp-so-side cbp-so-side-left">
					<h1><strong><span>WHAT DO</span></strong></h1>
					<div class="angle"><h1><strong>WE DO?</strong></h1></div><div class="line-vert"></div>
				</div>
				<div class="sixteen columns cbp-so-side cbp-so-side-right">
					 <?php $home_page =  get_page_by_path('home'); ?>
					 <?php echo $home_page->post_content; ?>
				</div>
			</section>
			</div>
		</div>
		<div class="background-pat">
		<div class="container">
			<?php 
				$about_services=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='about_service' and post_status='publish' order by menu_order ASC "); 
			?>
			<?php if(!empty($about_services)):?>
				<section class="cbp-so-section">
					<?php foreach($about_services as $about_service): ?>
						<div class="eight columns cbp-so-side cbp-so-side-left">
							<div class="profile-proces" style="max-height:150px;">
								<div class="h5-text">
									<h5><?php echo $about_service->post_title; ?></h5>
								</div>
								<?php echo $about_service->post_content; ?>
							</div>
						</div>
					<?php endforeach; ?>

				</section>
			<?php endif; ?>
		</div>
		</div>
		<div class="background-pat1-last">
		<div class="container">
		<section class="cbp-so-section">
			<div class="sixteen columns cbp-so-side cbp-so-side-left">
				<h4>HOW ABOUT SOME Fun Facts</h4>
			</div>
			<div class="sixteen columns cbp-so-side cbp-so-side-right">
				<p>We Provide High Quality IT Solutionsfor your business.</p>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-left1">
				<div class="facts">
					<div class="facts-num"><h2>45</h2></div>
					<div class="facts-icon1"></div>
					<div class="facts-text"><h6>Web Awards</h6></div>
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-left">
				<div class="facts">
					<div class="facts-num"><h2>24</h2></div>
					<div class="facts-icon2"></div>
					<div class="facts-text"><h6>LOCATIONS</h6></div>
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-right">
				<div class="facts">
					<div class="facts-num"><h2>97</h2></div>
					<div class="facts-icon3"></div>
					<div class="facts-text"><h6>happy clients</h6></div>
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-right1">
				<div class="facts">
					<div class="facts-num"><h2>86</h2></div>
					<div class="facts-icon4"></div>
					<div class="facts-text"><h6>Projects</h6></div>
				</div>
			</div>
		</section>
		</div>
		</div>						
	</div>
	
	
	
	
	
	

	
	<div id="parallax-2" class="parallax" style="background-image: url(<?php echo get_template_directory_uri();?>/images/parallax-2.jpg);">
		<div class="parallax-wrap"> 	
			<div class="container">
				<div class="sixteen columns">  
					<h5><span>Client Testimonials</span></h5>         
				</div>
				<?php 
					$testimonials=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='testimonial' and post_status='publish' order by menu_order ASC "); 
				?>
				<?php if(!empty($testimonials)): ?>
				<div class="sixteen columns"> 
					<div class="slider1">
						<?php foreach($testimonials as $testimonial):?>
						<div class="slide">
							<div class="testimonial"> 
								<?php echo $testimonial->post_content; ?>
								<p><?php echo $testimonial->post_title; ?></p>
							</div> 
						</div>
						<?php endforeach; ?>
					</div>	
				</div>	
				<?php endif; ?>
			</div>
			<div class="clouds"></div>
		</div>
	</div>	
	
	
	
	
	
	
	
	<div id="team">
		<div class="title">
			<div class="container">
			<section class="cbp-so-section">
				<div class="sixteen columns cbp-so-side cbp-so-side-left">
					<h1><strong><span>Who's</span></strong></h1>
					<div class="angle"><h1><strong>Behind Globiz?</strong></h1></div><div class="line-vert"></div>
				</div>
				<div class="sixteen columns cbp-so-side cbp-so-side-right">
					<h6>We design <span>websites</span>, <span>applications</span>, <span>logo's</span> and other awesome digital media</h6>
				</div>
			</section>
			</div>
		</div>	
		<div class="background-pat">
		<?php 
			$teammembers=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='teammember' and post_status='publish' order by menu_order ASC "); 
		?>
		<?php if(!empty($teammembers)):?>
		
		<div class="container">
			<section class="cbp-so-section">
				<?php foreach($teammembers as $teammember): ?>
					<div class="eight columns cbp-so-side cbp-so-side-left">
					<?php

						$team_src = wp_get_attachment_image_src( get_post_thumbnail_id($teammember->ID), 'team-size' );
					?>
						<div class="team1" style="background: rgba(0, 0, 0, 0) url('<?php echo $team_src[0]; ?>') no-repeat scroll center top / cover"><div class="team-name"><h6><?php echo $teammember->post_title; ?></h6></div></div>
					</div>
				<?php endforeach; ?>
			</section>
		</div>
		<div class="container">
				<section class="cbp-so-section">
				<?php foreach($teammembers as $teammember): ?>
				<div class="eight columns team-list cbp-so-side cbp-so-side-left">
					<h5><?php echo get_field('team_position',$teammember->ID); ?></h5>
					<?php echo $teammember->post_content; ?>
				</div>
				<?php endforeach; ?>
			</section>
		</div>	
		<?php endif; ?>
		</div>
		<div class="background-pat1-last">	
		<div class="container">
			<section class="cbp-so-section">
			<div class="sixteen columns cbp-so-side cbp-so-side-left">
				<h4>Team skills</h4>
			</div>
			<div class="sixteen columns cbp-so-side cbp-so-side-right">
				<p>Consectetur est quis mauris accumsan eleifend sit amet non neq. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur est quis mauris accumsan eleifend sit amet non neq. Vivamus vitae purus eros, nec ullamcorper risus.</p>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-left1">
				<h5>PHP</h5>
				<div class="bar">
					<input class="knob"  data-width="172" data-skin="tron" data-fgColor="#ffffff" data-thickness=".05" data-readOnly=true value="79">
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-left">
				<h5>CSS3</h5>
				<div class="bar">
					<input class="knob" data-width="172" data-skin="tron" data-fgColor="#ffffff" data-thickness=".05" data-readOnly=true value="83">
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-right">
				<h5>HTML5</h5>
				<div class="bar">
					<input class="knob" data-width="172" data-skin="tron" data-fgColor="#ffffff" data-thickness=".05" data-readOnly=true value="92">
				</div>
			</div>
			<div class="four columns cbp-so-side cbp-so-side-right1">
				<h5>JQUERY</h5>
				<div class="bar">
					<input class="knob" data-width="172" data-skin="tron" data-fgColor="#ffffff" data-thickness=".05" data-readOnly=true value="87">
				</div>
			</div>
			</section>
		</div>
		</div>	
	</div>
	
	<div id="services">
		<div class="title">
			<div class="container">
			<section class="cbp-so-section">
				<div class="sixteen columns cbp-so-side cbp-so-side-left">
					<h1><strong><span>WHAT</span></strong></h1>
					<div class="angle"><h1><strong>WE DO?</strong></h1></div><div class="line-vert"></div>
				</div>
				<div class="sixteen columns cbp-so-side cbp-so-side-right">
					<h6>OUR SERVICES ARE DELIVERED BY OUR TEAM WITH <span>YEARS OF EXPERIENCE</span></h6>
				</div>
			</section>
			</div>
		</div>	
		<div class="background-pat">
		<?php 
			$serviceLists=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='service' and post_status='publish' order by menu_order ASC "); 
		?>
		<?php if(!empty($serviceLists)):?>
		<div class="container">
			<?php $flag = 1; $total_items = count($serviceLists);?>
			<section class="cbp-so-section">
			<?php for($start=0; $start<count($serviceLists); $start++){ ?>
			<?php $flag++; ?>
				<div class="one-third column cbp-so-side cbp-so-side-left">
					<div class="services-offer">
						<h5><?php echo $serviceLists[$start]->post_title;?></h5>
						<?php echo $serviceLists[$start]->post_content;?>
					</div>
				</div>		
				<?php if( is_int($flag / 3) && $total_items >= $flag ): ?>
					</section>
					<section class="cbp-so-section">
				<?php endif; ?>
				<?php $flag++; ?>
			<?php } ?>
		</div>
		<?php endif; ?>
		</div>
		<div class="background-pat1-last">
		<div class="container">
			<section class="cbp-so-section">
				<div class="services-link">
					<div class="sixteen columns cbp-so-side cbp-so-side-left">
					 <?php $choose_page =  get_page_by_path('why-to-choose-us'); ?>
						<h5><?php echo $choose_page->post_title; ?></h5>
						<?php echo $choose_page->post_content; ?>
					</div>
					<div class="sixteen columns cbp-so-side cbp-so-side-left">
						<?php 
							$choose_us=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='faq' and post_status='publish' order by menu_order ASC "); 
						?>
						<?php if(!empty($choose_us)): ?>
						<div class="panel-group" id="accordion1">
						
							<?php foreach($choose_us as $choose): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
											<h5 class="panel-title">
											  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $choose->ID;?>" href="javascript:void(0);"><?php echo $choose->post_title;?></a>
											</h5>
								 </div>
								<div id="accordion1_<?php echo $choose->ID;?>" class="panel-collapse collapse in">
									<div class="panel-body">
										<div id="accordion<?php echo $choose->ID;?>_6" class="panel-collapse collapse in">
											<div class="panel-body">
													<?php echo $choose->post_content;?>
											</div>
										</div>      
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					  <?php endif; ?>
				</div>
			 </div>
			</section>
		 </div>
		</div>		
		<div class="background-pat1-last" id="services-chat">
			<div class="container">
			<section class="cbp-so-section">
				<div class="services-link">
					<div class="sixteen columns cbp-so-side cbp-so-side-left">
						<h5>ARE YOU READY TO START A CONVERSATION?</h5>
					</div>
					<div class="sixteen columns cbp-so-side cbp-so-side-right">
						<nav class="cl-effect-9">
							<a href="#contact" class="scroll"><span>Get In Touch</span><span>&#xf107;</span></a>
						</nav>
					</div>
				</div>
			</section>
			</div>
		</div>		
	</div>





	<div id="parallax-3" class="parallax" style="background-image: url(<?php echo get_template_directory_uri();?>/images/parallax-3.jpg);">	
	<div class="fallingLeaves">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
		<div class="parallax-wrap"> 		
		<div class="container">
				<div class="sixteen columns">  
					<h5><span>our beloved clients</span></h5>         
				</div>
			<div class="sixteen columns">
				<?php 

					$client_logos=$wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='client' and post_status='publish' order by menu_order DESC "); 
				?>
				<?php if(!empty($client_logos)): ?>
				<div class="slider2">
					<?php foreach($client_logos as $client_logo): ?>
						<div class="slide">
						<?php

							$client_src = wp_get_attachment_image_src( get_post_thumbnail_id($client_logo->ID), 'client-logo' );
						?>
							<img src="<?php echo $client_src[0];?>" alt="<?php echo $client_logo->post_title; ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		</div>
	</div>	






	<div id="portfolio">
		<div class="title">
			<div class="container">
			<section class="cbp-so-section">
				<div class="sixteen columns cbp-so-side cbp-so-side-left">
					<h1><strong><span>WHAT</span></strong></h1>
					<div class="angle"><h1><strong>IT LOOKS LIKE?</strong></h1></div><div class="line-vert"></div>
				</div>
				<div class="sixteen columns cbp-so-side cbp-so-side-right">
					<h6>HIRE US <span>IF YOU LIKE</span> WHAT WE DO</h6>
				</div>
			</section>
			</div>
		</div>
		<div class="background-pat-last">
		<div class="container">
			<div class="fil">	
				<div class="sixteen columns">
					<div id="portfolio-filter">
						<?php 
							$work_catgory = get_categories(array('taxonomy' => 'project')); 
						?>
						<?php if(!empty($work_catgory)): ?>
							<ul id="filter" class="cl-effect-18">
								<li><a href="#" class="current" data-filter="*" data-hover="Show All">Show all</a></li>
								<?php foreach($work_catgory as $cat): ?>
									<li>
										<a href="#" data-filter=".<?php echo $cat->slug; ?>" data-hover="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>		
		<div class="container">
			<?php 

				$projectLists = $wpdb->get_results("select ID, post_title,post_content,post_type from wp_posts where post_type='work' and post_status='publish' order by menu_order ASC "); 
			?>
		<?php if(!empty($projectLists)): ?>
		<div class="portfolio-isotope">
			<?php foreach($projectLists as $list): ?>
			<?php 
				$selectedTerms = wp_get_post_terms($list->ID, 'project', array("fields" => "slugs"));
				
			?>
			<div class="box one-third column <?php if(!empty($selectedTerms)){ echo implode(" ",$selectedTerms); }?>">
				<div class="gallery-item">
					
					<a class='iframe group1' href="<?php echo get_permalink($list->ID); ?>" title="">
						<div class="gallery-item-mask">
							<?php
								$work_src = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'work-size' );
							?>
							<img src="<?php echo $work_src[0];?>" alt="" />
							<div class="mask1"></div>
							<div class="gallery-text-down">
								<h6><?php echo $list->post_title; ?></h6>
							</div>
						</div>	
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>	
	<?php endif; ?>
	</div>
	</div>	
	</div>

	<div id="contact">
		<div class="title">
			<div class="container">
			<section class="cbp-so-section">
				<div class="sixteen columns cbp-so-side cbp-so-side-left">
					<h1><strong><span>LET'S</span></strong></h1>
					<div class="angle"><h1><strong>HAVE A CHAT</strong></h1></div><div class="line-vert"></div>
				</div>
				<div class="sixteen columns cbp-so-side cbp-so-side-right">
					<h6><span>WE CAN HELP YOU</span> PROMOTE YOUR BUSINESS</h6>
				</div>
			</section>
			</div>
		</div>
		<div class="background-pat">
		<div class="container">
		<section class="cbp-so-section">
			<div class="sixteen columns cbp-so-side cbp-so-side-right">
				<form name="ajax-form" id="ajax-form" action="<?php echo get_template_directory_uri();?>/contact-save.php" method="post">
				<h4>Say Hello</h4>
					<label for="name">Name: * 
						<span class="error" id="err-name">Please enter name</span>
					</label>
					<input name="name" id="name" type="text" />
					<label for="email">E-Mail: * 
						<span class="error" id="err-email">Please enter e-mail</span>
						<span class="error" id="err-emailvld">E-mail is not a valid format</span>
					</label>
					<input name="email" id="email" type="text" />
					<label for="message">Message: *
						<span class="error" id="err-message">Please enter message</span>
					</label>
					<textarea name="message" id="message"></textarea>
					<button class="send_message" id="send">Submit</button>
					<div class="error" id="err-form">There was a problem validating the form please check!</div>
					<div class="error" id="err-timedout">The connection to the server timed out!</div>
					<div class="error" id="err-state"></div>
				</form>
				<div id="ajaxsuccess">Thanks for contacting us. We will contact you soon!!</div>	
			</div>
		</section>	
		</div>
		</div>
		<div class="background-pat1-last">	
		<div class="contact-info">
			<div class="container">
			<section class="cbp-so-section" >
				<!--<div class="one-third column cbp-so-side cbp-so-side-left1">
					<?php //dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
				<div class="one-third column cbp-so-side cbp-so-side-left">
					<?php //dynamic_sidebar( 'sidebar-4' ); ?>
				</div>-->
				<div class="one-third column cbp-so-side cbp-so-side-right address-section">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			</section>
			</div>
		</div>
		</div>
	</div>
	
	
	
	
	
	<div id="copy">
		<div class="container">
		<section class="cbp-so-section">
			<div class="sixteen columns cbp-so-side cbp-so-side-left">
				<p>Copyright © globiztechnology.com. All Rights Reserved 2016-17</p>
			</div>
			<div class="sixteen columns cbp-so-side cbp-so-side-right">
				<div class="cl-effect-18">
					<?php dynamic_sidebar( 'sidebar-5' ); ?>
				</div>
			</div>
		</section>	
		</div>	
	</div>		
	
	
</div>		
<?php get_footer(); ?>