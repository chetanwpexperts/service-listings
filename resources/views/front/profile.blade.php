@extends("layouts.webmaster")

@section("content")
<style>
html {
	scroll-behavior: smooth;
}
</style>
<section class=" us-pro-main">
		<div class="container">
			<div class="row">
				<div class="us-pro">
					<div class="us-pro-sec-1">
						<div class="us-pro-sec-1-lhs">
							<?php
                            $imgSrc = asset('public/images/defaultimg.png');
							if(!empty($userdp))
							{
								if($userdp->image != "" || $userdp->image != null)
								{
									$imgSrc = asset('public/public/user/dp/' . $userdp->image);
								}
							}
							$authuser = (!empty($user)) ? $user->member_id : 0;
                            ?>
                            <img src="<?=$imgSrc?>" class="pro" alt="">
							<h1><?=$member->name?></h1>
							<p><b>City:</b> @if(!empty($userinfo)) {{getCityName($userinfo->city)}} @endif<b>Join:</b> {{$member->created_at->isoFormat('D, MMMM YYYY')}}</p>
							<?php 
							$follow = "No";
							$buttonText = "FOLLOW";
							if(!empty($isFollow))
							{
								$follow = "Yes";
								$buttonText = "UN-FOLLOW";
							}
							if($user->member_id != $member->member_id)
							{
							?>
							<button class="<?php echo ($follow == "No") ? 'userfollow': 'userunfollow';?> follow-content" data-member="{{$member->member_id}}" data-authuser="{{$authuser}}"><?=$buttonText?></button>
							<?php 
							}
							?>
							<ul class="lis-cou">
								<li><b>{{getMemberLisitngCount($member->member_id)}}</b> Listings</li>
								<li><b>0</b> Blogs</li>
								<li><b>0</b> Events</li>
								<li><b>{{countFollowing($member->member_id)}}</b> Following</li>
							</ul>
							<ul class="pro-soci">
								<li>
									<a target="_blank" href="https://www.facebook.com/directoryfinder.s.7">
										<img src="{{asset('public/images/social/3.png')}}" alt="">
									</a>
								</li>
								<li>
									<a target="_blank" href="https://twitter.com/DirectoryFinder">
										<img src="{{asset('public/images/social/2.png')}}" alt="">
									</a>
								</li>
								<li>
									<a target="_blank" href="https://www.youtube.com/channel/UCEuC2HN5jb02knjP9o3Q8QA">
										<img src="{{asset('public/images/social/5.png')}}" alt="">
									</a>
								</li>
								<li>
									<a target="_blank" href="www.rn53themes.net">
										<img src="{{asset('public/images/social/1.png')}}" alt="">
									</a>
								</li>
							</ul>
						</div>
						<div class="us-pro-sec-1-rhs">
							<img src="{{asset('public/images/promo.jpg')}}" class="pro-bg">
						</div>
					</div>
					<div class="us-pro-sec-2">
						<div class="us-pro-nav">
							<ul>
								<li><span class="act">All</span>
								</li>
								<li><span>Listings</span>
								</li>
								<li><span>Blog posts</span>
								</li>
								<li><span>Events</span>
								</li>
								<li><span>Follovers</span>
								</li>
							</ul>
						</div>
						<div class="us-propg-main">
							<div class="us-ppg-com us-ppg-listings">
								<h2>All listings</h2>
								<ul>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/1.jpg">
												<h2>Sony Musics 2 </h2>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p> <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
                                                <img src="images/services/2.jpeg">
												<h2>Sony Music </h2>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/3.jpg">
												<h2>IPM Business Software </h2>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/4.jpg">
												<h2>Royal Real Estates </h2>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/5.jpeg">
												<h2>Appers Premium Independent Houses </h2>
												<label class="rat"> <i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons ratstar">star</i>
												</label>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/6.jpeg">
												<h2>Capital five star hotels </h2>
												<label class="rat"> <i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons ratstar">star</i>
												</label>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
									<li>
										<div class="pro-listing-box">
											<div>
												<img src="images/services/7.jpeg">
												<h2>Hard Rocks Hotels </h2>
												<label class="rat"> <i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons">star</i>
													<i class="material-icons ratstar">star</i>
												</label>
												<p>No:2, 4th Avenue, Newyork, USA, Near to Airport</p>
                                                <a href="listing-details.html" class="fclick">&nbsp;</a>
											</div>
											<div> <span data-toggle="modal" data-target="#quote">Get quote</span>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="us-ppg-com us-ppg-blog">
								<h2>Blog posts</h2>
								<ul>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog1.jpeg">
											</div>
											<div> <span>07, Jan 2020</span>
												<h2>12 Days Fitness Chanllege</h2>
											</div> 
                                            <a href="blog-posts.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog2.jpg">
											</div>
											<div> <span>07, Jan 2020</span>
												<h2>Bike Racing Techniques</h2>
											</div>
                                            <a href="blog-posts.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog3.jpg">
											</div>
											<div> <span>07, Jan 2020</span>
												<h2>Best Island In The World</h2>
											</div>
                                            <a href="blog-posts.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog3.jpg">
											</div>
											<div> <span>07, Jan 2020</span>
												<h2>Online Marketing 2020</h2>
											</div>
                                            <a href="blog-posts.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog4.jpg">
											</div>
											<div> <span>07, Jan 2020</span>
												<h2>Home Interior Design Trends</h2>
											</div>
                                            <a href="blog-posts.html" class="fclick">&nbsp;</a>
										</div>
									</li>
								</ul>
							</div>
							<div class="us-ppg-com us-ppg-event">
								<h2>Events</h2>
								<ul>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/blogs/blog5.jpg">
											</div>
											<div> <span>18                                                        <b>Mar</b></span>
												<h2>Surfing Competition Hawaii</h2>
												<p>4754 Grove Avenue, Hawaii</p>
											</div> <a href="events.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/services/10.jpg">
											</div>
											<div> <span>18                                                        <b>Jan</b></span>
												<h2>Food eating challenge</h2>
												<p>1297 Stuart Street, Pennsylvania</p>
											</div> <a href="events.html" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/services/11.jpg">
											</div>
											<div> <span>18                                                        <b>Jan</b></span>
												<h2>College Volley Ball Tournaments 2021</h2>
												<p>Lynn B Morgan, Garden City, New York</p>
											</div> <a href="event/college-volley-ball-tournaments-2021" class="fclick">&nbsp;</a>
										</div>
									</li>
									<li>
										<div class="pro-eve-box">
											<div>
												<img src="images/services/11.jpg">
											</div>
											<div> <span>25                                                        <b>Jan</b></span>
												<h2>States Soccer World Cup 2022</h2>
												<p>2826 Lamberts Branch Road, Miami, Florida</p>
											</div> <a href="events.html" class="fclick">&nbsp;</a>
										</div>
									</li>
								</ul>
							</div>
							<div class="us-ppg-com us-ppg-follow">
								<h2>Followers</h2>
								<div class="ud-rhs-sec-2">
									<ul>
										<li>
											<div class="pro-sm-box">
												<img src="images/user/1.png" alt="">
												<h5>Rachel</h5>
												<p>City: <b> Arizona</b>
												</p>
												<a href="profile.html">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-sm-box">
												<img src="images/user/2.jpeg" alt="">
												<h5>Betty D Friedman</h5>
												<p>City: <b> N/A</b>
												</p>
												<a href="profile.html">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-sm-box">
                                                <img src="images/user/5.jpeg" alt="">
												<h5>Rn53 Themes</h5>
												<p>City: <b> Sydney</b>
												</p>
												<a href="profile.html">&nbsp;</a>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="pro-bot-shar">
							<h4>Share this profile</h4>
							<ul>
								<li>
									<div class="sh-pro-shar sh-pro-face">
										<a target="_blank" href="https://www.facebook.com/sharer/sharer.html?u=profile/claude-d-dial?src=facebook&quote=Claude D Dial">
											<img src="images/social/3.png" alt="">Facebook</a>
									</div>
								</li>
								<li>
									<div class="sh-pro-shar sh-pro-twi">
										<a target="_blank" href="http://twitter.com/share?text=&url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%3Fsrc%3Dtwitter">
											<img src="images/social/2.png" alt="">Twitter</a>
									</div>
								</li>
								<li>
									<div class="sh-pro-shar sh-pro-what">
										<a target="_blank" href="whatsapp://send?text=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%3Fsrc%3Dwhatsapp" data-action="share/whatsapp/share">
											<img src="images/social/6.png" alt="">WhatsApp</a>
									</div>
								</li>
								<li>
									<div class="sh-pro-shar sh-pro-link">
										<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%26%26src%3Dlinkedin">
											<img src="images/social/1.png" alt="">Linkedin</a>
									</div>
								</li>
								<li>
									<div style="background-color: #da271a" class="sh-pro-shar sh-pro-pin">
										<a target="_blank" href="https://www.pinterest.com/pin/create/bookmarklet/?media=images/user/33654pexels-photo-91227.jpeg&url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%26%26src%3Dpinterest&description=">
											<img src="images/social/1.png" alt="">Pinterest</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="us-pro-sec-3"></div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
    <script>
	jQuery( document ).ready( function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(".userfollow").on("click",  function() 
		{
			var followed = $(this).attr('data-member');
			var followed_by = $(this).attr('data-authuser');
			if(followed_by == 0)
			{
				$(".bodymessage").css({'display':'block'});
				$(".alert-heading").html("Error");
				$("#response").html("You are not logged In...");
				return false;
			}
			$.ajax({
				url: "{{route('followmember')}}",
				type: "POST",
				data: {
					followed: followed,
					followed_by: followed_by
				},
				cache: false,
				success: function(result)
				{
					$(".follow-content").removeClass('userfollow');
					$(".follow-content").addClass('userunfollow');
					$(".follow-content").text("UN-FOLLOW");
					setTimeout(function(){
						location.reload();
					}, 3000);
				}
			});

			return false;
		});

		$(".userunfollow").on("click",  function()
		{
			var followed = $(this).attr('data-member');
			var followed_by = $(this).attr('data-authuser');
			if(followed_by == 0)
			{
				$(".bodymessage").css({'display':'block'});
				$(".alert-heading").html("Error");
				$("#response").html("You are not logged In...");
				return false;
			}
			$.ajax({
				url: "{{route('unfollowmember')}}",
				type: "POST",
				data: {
					followed: followed,
					followed_by: followed_by
				},
				cache: false,
				success: function(result)
				{
					$(".follow-content").removeClass('userunfollow');
					$(".follow-content").addClass('userfollow');
					$(".follow-content").text("FOLLOW");
					setTimeout(function(){
						location.reload();
					}, 3000);
				}
			});

			return false;
		});

		$(".close").on("click", function(){
			$(".bodymessage").css({'display':'none'});
		});
	});
	</script>

@stop