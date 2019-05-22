@php
	$slides = app('Slide')->getSlide(4);
@endphp

<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
		    <div class="banner" >
				<ul>
					@foreach ($slides as $key => $slide)
						<!-- THE FIRST SLIDE -->
						<li data-transition="boxfade" data-slotamount="20">
	                        <img src="{{ url(''). $slide->url_slide  }}" alt="image"/>
	                        <div class="caption lft"  data-x="1250" data-y="150" data-speed="500" data-start="1200" data-customin="rotationZ:-720;scaleX:0.4;scaleY:0.4" data-easing="easeOutBack"> 
	                        	<!-- <img src="{{ url('Frontend') }}/assets/dest/images/thumbs/slider1/layer1.png" alt="image"/></div>
	                        <div class="caption lfr"  data-x="1170" data-y="425" data-speed="800" data-start="2000" data-easing="easeOutBack">  -->
	                        	<p style="background: rgba(249, 249, 249, 0.46); padding: 12px;">{{ $slide->title }}</p>
	                        </div>
	                    </li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>